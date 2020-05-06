/**
 * The external dependencies.
 */
const shell = require('shelljs');

/**
 * Install production-only dependencies in the current directory.
 *
 * @returns {Object}
 */
const installProductionDependencies = (cwd = null) => shell.exec('composer install --no-dev --classmap-authoritative', { cwd });

module.exports = {
  installProductionDependencies,
};
