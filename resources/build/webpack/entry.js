/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');

module.exports = {
  'frontend': utils.srcScriptsPath('frontend/index.js'),
  'admin': utils.srcScriptsPath('admin/index.js'),
  'login': utils.srcScriptsPath('login/index.js'),
  'editor': utils.srcScriptsPath('editor/index.js'),
};
