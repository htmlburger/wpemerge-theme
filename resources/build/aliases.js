/**
 * The internal dependencies.
 */
const utils = require('./utils');

module.exports = {
  '@config': utils.themeRootPath('config.json'),
  '@scripts': utils.srcScriptsPath(),
  '@styles': utils.srcStylesPath(),
  '@images': utils.srcImagesPath(),
  '@fonts': utils.srcFontsPath(),
  '@vendor': utils.srcVendorPath(),
  '@dist': utils.distPath(),
  '~': utils.themeRootPath('node_modules'),
  'isotope': 'isotope-layout',
  'masonry': 'masonry-layout',
  'jquery-ui': 'jquery-ui-dist/jquery-ui.js',
};
