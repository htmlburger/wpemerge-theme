/**
 * The external dependencies.
 */
const SpritesmithPlugin = require('webpack-spritesmith');

/**
 * The internal dependencies.
 */
const utils = require('./lib/utils');

module.exports = new SpritesmithPlugin({
  src: {
    cwd: utils.srcImagesPath('sprite'),
    glob: '*.{jpg,jpeg,png}',
  },
  target: {
    image: utils.distImagesPath('sprite.png'),
    css: utils.srcStylesPath('frontend/_sprite.scss'),
  },
  apiOptions: {
    cssImageRef: '~@dist/images/sprite.png',
  },
  // Uncomment the following line to enable retina spritesheets:
  // retina: '@2x',
});
