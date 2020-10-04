/**
 * The external dependencies.
 */
const process = require('process');
const path = require('path');
const EventEmitter = require('events');
const tmp = require('tmp');
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
const source = utils.rootPath();
const emitter = new EventEmitter();

emitter.on('file.copy', file => process.stdout.write(`Copying ${path.relative(source, file)} ...`));
emitter.on('file.copied', () => log(' done'));

(new Promise(resolve => resolve()))
  .then(() => {
    const zip = `${source}.zip`;

    steps.validate(zip);

    const destination = tmp.dirSync().name;

    steps.copyFiles(config.release.include, source, destination, emitter);

    log('Installing production composer dependencies ...');
    steps.installComposerDependencies(source, destination);

    return steps.zip(destination, zip);
  })
  .catch(e => logError(chalk.red(e.message)));
