/**
 * The external dependencies.
 */
const fs    = require('fs');
const path  = require('path');

/**
 * The internal dependencies.
 */
const config   = require('../../../config.json');
const utils    = require('../lib/utils');
const composer = require('./composer');
const archive  = require('./archive');

const cError      = '\x1b[31m';
const cWarning    = '\x1b[33m';
const cReset      = '\x1b[0m';
const themeName   = path.basename(utils.themeRootPath());
const destination = path.join(path.dirname(utils.themeRootPath()), `${themeName}.zip`);
const shutdown    = (exitCode = 0) => {
  console.log('Restoring development dependencies ...');
  if (!composer.installDevelopmentDependencies()) {
    console.error(`${cError}Error: Failed to restore development dependencies with composer.${cReset}`);
    console.log(`${cWarning}Please run "composer install" manually.${cReset}`);
    exitCode = 1;
  }
  process.exit(exitCode);
};

if (fs.existsSync(destination)) {
  console.error(`${cError}Destination file already exists: ${destination}${cReset}`);
  process.exit(1);
}

console.log('Installing production dependencies ...');
if (!composer.installProductionDependencies()) {
  console.error(`${cError}Error: Failed to install production dependencies with composer.${cReset}`);
  shutdown(1);
}

archive
  .zip(
    config.release.include.map(item => utils.themeRootPath(item)),
    destination,
    utils.themeRootPath()
  )
  .then(() => shutdown())
  .catch((error) => {
    console.error(`${cError}${error.message}${cReset}`);
    shutdown(1);
  });
