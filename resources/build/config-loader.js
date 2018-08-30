/**
 * The external dependencies.
 */
const path = require('path');

/**
 * The internal dependencies.
 */
const utils = require('./lib/utils');

module.exports = {
  loader: path.join(__dirname, 'lib', 'config-loader.js'),
  options: {
    sassOutput: utils.srcStylesPath('shared/_config.scss'),
  },
};
