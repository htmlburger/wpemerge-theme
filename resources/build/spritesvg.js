/**
 * The external dependencies.
 */
const SvgSpriteLoaderPlugin = require('svg-sprite-loader/plugin');

module.exports = new SvgSpriteLoaderPlugin({
  plainSprite: true,
  spriteAttrs: {
    'aria-hidden': 'true',
    style: 'position: absolute; width: 0; height: 0; overflow: hidden;',
  },
});
