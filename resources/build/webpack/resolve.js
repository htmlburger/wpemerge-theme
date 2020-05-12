/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');

module.exports = {
  modules: [utils.srcScriptsPath(), 'node_modules'],
  extensions: ['.js', '.jsx', '.json', '.css', '.scss'],
  alias: {
    '@config': utils.rootPath('config.json'),
    '@scripts': utils.srcScriptsPath(),
    '@styles': utils.srcStylesPath(),
    '@images': utils.srcImagesPath(),
    '@fonts': utils.srcFontsPath(),
    '@vendor': utils.srcVendorPath(),
    '@dist': utils.distPath(),
    '~': utils.rootPath('node_modules'),
    'isotope': 'isotope-layout',
    'masonry': 'masonry-layout',
    'jquery-ui': 'jquery-ui-dist/jquery-ui.js',
  },
};
