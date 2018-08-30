/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');

module.exports = {
  'bundle': utils.srcScriptsPath('theme/index.js'),
  'admin-bundle': utils.srcScriptsPath('admin/index.js'),
  'login-bundle': utils.srcScriptsPath('login/index.js'),
  'editor-bundle': utils.srcScriptsPath('editor/index.js'),
};
