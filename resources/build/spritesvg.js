/**
 * The external dependencies.
 */
const SvgSpriteLoaderPlugin = require('svg-sprite-loader/plugin');

module.exports = new SvgSpriteLoaderPlugin({
  plainSprite: true,
  spriteAttrs: {
    'aria-hidden': 'true',
    style: 'display: none; visibility: hidden;',
  },
});
