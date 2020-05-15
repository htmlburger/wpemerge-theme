/**
 * The external dependencies.
 */
const chalk = require('chalk');

/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');
const steps = require('./steps');

if (chalk.level === 0) {
  // Make sure we get color even if run-s switches the output stream.
  chalk.level = 1;
}

const ignore = [
  utils.rootPath('dist/**/*'),
  utils.rootPath('node_modules/**/*'),
  utils.rootPath('resources/build/rebrand/**/*'),
  utils.rootPath('tests/**/*'),
  utils.rootPath('vendor/**/*'),
];

const match = [
  utils.rootPath('style.css'),
  utils.rootPath('**/*.php'),
  utils.rootPath('**/*.md'),
  utils.rootPath('**/*.txt'),
  utils.rootPath('**/*.json'),
  utils.rootPath('**/*.xml'),
  utils.rootPath('languages/*.pot'),
];

const { log, error: logError } = console;

steps.requireCleanWorkingDirectory()
  .then(() => steps.askForReplacementTokens(log))
  .then((tokens) => log('Rebranding - this may take a while ...') || steps.replaceTokens(tokens, match, ignore))
  .then(() => log('Done.'))
  .catch((e) => logError(chalk.red(e.message)));
