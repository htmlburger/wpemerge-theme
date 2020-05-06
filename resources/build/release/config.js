/**
 * The external dependencies.
 */
const fs = require('fs');

/**
 * Get whitelisted properties from the specified config.json file.
 *
 * @param {string} file
 * @returns {Object}
 */
const getWhitelisted = (file) => {
  const config = JSON.parse(fs.readFileSync(file));
  const whitelist = config.release.configWhitelist || [];
  const filtered = {};

  for (let i = 0; i < whitelist.length; i++) {
    const key = whitelist[i];
    if (config[key] !== undefined) {
      filtered[key] = config[key];
    }
  }

  return filtered;
};

module.exports = {
  getWhitelisted,
};
