/**
 * The internal dependencies.
 */
/* @preset-begin(Tailwind CSS)
const utils = require('./lib/utils');
@preset-end(Tailwind CSS) */

/**
 * Setup PostCSS plugins.
 */
const plugins = [
  require('autoprefixer'),
  /* @preset-begin(Tailwind CSS)
  require('tailwindcss')(utils.srcPath('build/tailwindcss.js')),
  @preset-end(Tailwind CSS) */
];

/**
 * Prepare the configuration.
 */
const config = {
  plugins,
};

module.exports = config;
