/**
 * The external dependencies.
 */
const path = require('path');
const chalk = require('chalk');
const { pascalCase, constantCase, snakeCase } = require('change-case');
const shell = require('shelljs');
const inquirer = require('inquirer');
const replace = require('replace-in-file');
const forEach = require('lodash/forEach');

/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');

/**
 * Require that the current working directory does not have unstaged changes or untracked files.
 *
 * @returns {Promise}
 */
const requireCleanWorkingDirectory = () => new Promise((resolve, reject) => {
  const status = shell.exec('git status --porcelain', { silent: true });

  if (status.code !== 0 || status.stdout.trim().length === 0) {
    resolve();
    return;
  }

  const prologue = chalk.red('This git repository has untracked files or uncommitted changes:');
  const epilogue = chalk.red('Remove untracked files, stash or commit any changes, and try again.');

  reject(new Error(`${prologue}\n\n${status.stdout}\n${epilogue}`));
});

/**
 * Interactively ask the user for replacement tokens.
 *
 * @returns {Promise}
 */
const askForReplacementTokens = (log) => inquirer
  .prompt([
    {
      type: 'input',
      name: 'name',
      message: 'User-friendly project name (e.g. "My Awesome Project")',
      filter: value => value.trim(),
      validate: value => value.length !== 0,
    },
    {
      type: 'input',
      name: 'namespace',
      message: 'Namespace (e.g. "MyAwesomeProject")',
      filter: value => pascalCase(value.trim()),
      validate: value => value.length !== 0,
    },
  ])
  .then((answers) => {
    const tokens = {
      'WP Emerge Starter Theme': answers.name,
      'WP Emerge Starter Plugin': answers.name,
      'MyApp': pascalCase(answers.namespace),
      'MY_APP': constantCase(answers.namespace),
      'my_app': snakeCase(answers.namespace),
    };

    log('');
    log('The following changes will be applied:');
    log('--------------------------------------');
    log(`WP Emerge Starter Theme/Plugin => ${chalk.cyan(tokens['WP Emerge Starter Theme'])}`);
    log(`MyApp                          => ${chalk.cyan(tokens['MyApp'])}`);
    log(`MY_APP                         => ${chalk.cyan(tokens['MY_APP'])}`);
    log(`my_app                         => ${chalk.cyan(tokens['my_app'])}`);
    log('--------------------------------------');
    log('');
    log(chalk.yellow('WARNING: This is a one-time replacement only. Once applied it cannot be undone or updated automatically.'));

    return inquirer
      .prompt([
        {
          type: 'confirm',
          default: false,
          name: 'confirm',
          message: 'Are you sure you wish to proceed?',
        },
      ])
      .then((confirm) => {
        if (!confirm.confirm) {
          throw new Error('Action cancelled.');
        }

        return tokens;
      });
  });

/**
 * Replace tokens in the given file globs.
 *
 * @param {Object} tokens
 * @param {String[]} matchGlobs
 * @param {String[]} ignoreGlobs
 * @returns {Promise}
 */
const replaceTokens = (tokens, matchGlobs, ignoreGlobs) => {
  const rename = [
    'app/src/MyApp.php',
    'languages/my_app.pot',
  ];

  // Rename specific files that match tokens.
  forEach(rename, (file) => {
    const from = utils.rootPath(file);

    if (!shell.test('-e', from)) {
      return;
    }

    const directory = path.dirname(from);
    const extension = path.extname(from);
    const name = path.basename(from, extension);
    const to = path.join(directory, `${tokens[name]}${extension}`);

    if (tokens[name] !== undefined && from !== to) {
      if (!shell.test('-e', to)) {
        shell.mv(from, to);
      } else {
        console.error(chalk.red(`${file} could not be renamed: ${to} already exists.`));
      }
    }
  });

  // Replace the tokens in the provided globs.
  forEach(tokens, (to, from) => {
    replace.sync({
      ignore: ignoreGlobs,
      files: matchGlobs,
      from: new RegExp(from, 'g'),
      to,
    });
  });

  // Dump the composer autoloader so it picks up the new namespace.
  shell.exec('composer dump-autoload');
};

module.exports = {
  requireCleanWorkingDirectory,
  askForReplacementTokens,
  replaceTokens,
};
