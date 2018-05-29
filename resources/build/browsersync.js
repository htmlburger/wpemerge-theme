/**
 * The external dependencies.
 */
const url = require('url');
const argv = require('yargs').argv;

/**
 * The internal dependencies.
 */
const utils = require('./utils');

/**
 * Prepare the configuration.
 */
const config = {
  host: 'localhost',
  port: 3000,
  proxy: 'localhost',
  open: 'external',
  files: [
    utils.themeRootPath('./theme/**/*.php'),
  ],
  snippetOptions: {
    rule: {
      match: /<\/body>/i,
      fn: (snippet, match) => `${snippet}${match}`,
    },
  },
  reloadThrottle: 100,
};

/**
 * Load the proxy configuration from cli arguments
 */
if (argv.devUrl !== undefined) {
  config.host = url.parse(argv.devUrl).hostname;
  config.proxy = argv.devUrl;
}

module.exports = config;
