/**
 * The external dependencies.
 */
const path = require('path');
const chalk = require('chalk');
const { pascalCase, constantCase, snakeCase } = require('change-case');
const { titleCase } = require('title-case');
const shell = require('shelljs');
const inquirer = require('inquirer');
const replace = require('replace-in-file');
const forEach = require('lodash/forEach');

/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');

if (chalk.level === 0) {
  // Make sure we get color even if run-s switches the output stream.
  chalk.level = 1;
}

const { log, error: logError } = console;
const ignoreGlobs = [
  utils.rootPath('dist/**/*'),
  utils.rootPath('node_modules/**/*'),
  utils.rootPath('tests/**/*'),
  utils.rootPath('vendor/**/*'),
];
const fileGlobs = [
  utils.rootPath('style.css'),
  utils.rootPath('**/*.php'),
  utils.rootPath('**/*.md'),
  utils.rootPath('**/*.txt'),
  utils.rootPath('**/*.json'),
  utils.rootPath('**/*.xml'),
  utils.rootPath('languages/*.pot'),
];

const status = shell.exec('git status --porcelain', { silent: true });

if (status.code === 0 && status.stdout.trim().length > 0) {
  const prologue = chalk.red('This git repository has untracked files or uncommitted changes:');
  const epilogue = chalk.red('Remove untracked files, stash or commit any changes, and try again.');

  logError(`${prologue}\n\n${status.stdout}\n${epilogue}`);
  process.exit(1);
}

inquirer
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
      'WP Emerge Starter Theme': titleCase(answers.name),
      'WP Emerge Starter Plugin': titleCase(answers.name),
      'MyApp': pascalCase(answers.namespace),
      'MY_APP': constantCase(answers.namespace),
      'my_app': snakeCase(answers.namespace),
    };

    log('The following changes will be applied:');
    log(`  WP Emerge Starter Theme/Plugin => ${tokens['WP Emerge Starter Theme']}`);
    log(`  MyApp                          => ${tokens['MyApp']}`);
    log(`  MY_APP                         => ${tokens['MY_APP']}`);
    log(`  my_app                         => ${tokens['my_app']}`);
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
        if (confirm.confirm) {
          return tokens;
        }

        log('Rebrand cancelled.');
        process.exit();
      });
  })
  .then((tokens) => {
    process.stdout.write('Working ...');

    if (shell.test('-e', utils.rootPath('languages/my_app.pot'))) {
      shell.mv(
        utils.rootPath('languages/my_app.pot'),
        utils.rootPath(`languages/${tokens['my_app']}.pot`)
      );
    }

    forEach(tokens, (to, from) => {
      replace.sync({
        ignore: ignoreGlobs,
        files: fileGlobs,
        from: new RegExp(from, 'g'),
        to,
      });
    });

    log(' done');

    shell.exec('composer dump-autoload');
  })
  .catch(e => logError(chalk.red(e.message)));
