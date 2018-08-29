/**
 * The external dependencies.
 */
const url = require('url');

/**
 * The internal dependencies.
 */
const utils = require('./utils');
const userConfig = utils.getUserConfig();

/**
 * Prepare the final configuration.
 */
const config = {
  host: typeof userConfig.development.url !== 'undefined' ? url.parse(userConfig.development.url).hostname : 'localhost',
  proxy: typeof userConfig.development.url !== 'undefined' ? userConfig.development.url : 'localhost',
  port: 3000,
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

module.exports = config;
