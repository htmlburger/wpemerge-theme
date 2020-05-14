/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');
const keyBy = require('lodash/keyBy');
const mapValues = require('lodash/mapValues');

module.exports = mapValues(
  keyBy(utils.getUserConfig().bundles, bundle => bundle),
  bundle => utils.srcScriptsPath(`${bundle}/index.js`)
);
