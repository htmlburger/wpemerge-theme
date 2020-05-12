/**
 * The external dependencies.
 */
const process = require('process');
const path = require('path');
const EventEmitter = require('events');
const chalk = require('chalk');

/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');
const config = require('../../../config.json');
const steps = require('./steps');

if (chalk.level === 0) {
  // Make sure we get color even if run-s switches the output stream.
  chalk.level = 1;
}

const { log, error: logError } = console;
const name = process.argv[2] || 'wpemerge-release';
const source = utils.rootPath();
const destination = path.join(path.dirname(source), name);
const emitter = new EventEmitter();

emitter.on('file.copy', file => process.stdout.write(`Copying ${path.relative(source, file)} ...`));
emitter.on('file.copied', () => log(' done'));

(new Promise(resolve => resolve()))
  .then(() => {
    steps.validate(destination);

    steps.createDirectory(destination);

    steps.copyFiles(config.release.include, source, destination, emitter);

    log('Installing production composer dependencies ...');
    steps.installComposerDependencies(source, destination);

    return steps.zip(destination, `${destination}.zip`);
  })
  .catch(e => logError(chalk.red(e.message)));
