/**
 * The internal dependencies.
 */
const utils = require('./lib/utils');

const env = utils.detectEnv();

/**
 * Setup PostCSS plugins.
 */
const plugins = [
  /* @preset-begin(Tailwind CSS)
  require('tailwindcss')(utils.srcPath('build/tailwindcss.js')),
  @preset-end(Tailwind CSS) */
  require('postcss-discard-comments'),
  require('autoprefixer'),
  // Uncomment to enable combined media queries.
  // require('./lib/combine-media-queries'),
];

if (env.isProduction && !env.isDebug) {
  plugins.push(
    require('cssnano')({
      preset: 'default',
    })
  );
}

/**
 * Prepare the configuration.
 */
const config = {
  plugins,
};

module.exports = config;
