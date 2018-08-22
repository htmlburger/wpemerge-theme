/**
 * The external dependencies.
 */
const autoprefixer = require('autoprefixer');

/**
 * The internal dependencies.
 */
/* @preset-begin(Tailwind CSS)
const utils = require('./utils');
@preset-end(Tailwind CSS) */

/**
 * Setup PostCSS plugins.
 */
const plugins = [
  autoprefixer,
  /* @preset-begin(Tailwind CSS)
  require('tailwindcss')(utils.srcPath('build/tailwind.js')),
  @preset-end(Tailwind CSS) */
];

/**
 * Prepare the configuration.
 */
const config = {
  plugins,
};

module.exports = config;
