/**
 * The external dependencies.
 */
const shell = require('shelljs');

/**
 * Install production-only dependencies in the current directory.
 *
 * @returns {boolean}
 */
const installProductionDependencies = () => shell.exec('composer install --no-dev --optimize-autoloader').code === 0;

/**
 * Install development dependencies in the current directory.
 *
 * @returns {boolean}
 */
const installDevelopmentDependencies = () => shell.exec('composer install').code === 0;

module.exports = {
  installProductionDependencies,
  installDevelopmentDependencies,
};
