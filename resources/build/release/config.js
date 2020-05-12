/**
 * The external dependencies.
 */
const fs = require('fs');
const pick = require('lodash/pick');

/**
 * Get whitelisted properties from the specified config.json file.
 *
 * @param {string} file
 * @returns {Object}
 */
const getWhitelisted = (file) => {
  const config = JSON.parse(fs.readFileSync(file));
  const whitelist = config.release.configWhitelist || [];

  return pick(config, whitelist);
};

module.exports = {
  getWhitelisted,
};
