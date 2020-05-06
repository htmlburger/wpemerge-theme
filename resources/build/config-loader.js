/**
 * The external dependencies.
 */
const path = require('path');

module.exports = {
  loader: path.join(__dirname, 'lib', 'config-loader.js'),
  options: {
    sassOutput: 'resources/styles/[name].config.scss',
  },
};
