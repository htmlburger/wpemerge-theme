/**
 * The external dependencies.
 */
const archiver = require('archiver');
const fs       = require('fs');
const path     = require('path');
const shell    = require('shelljs');
const glob     = require('glob');

/**
 * Get the config with only the whitelisted keys.
 *
 * @param   {String} file
 * @returns {Object}
 */
const getWhitelistedConfig = (file) => {
  const config    = JSON.parse(fs.readFileSync(file));
  const whitelist = config.release.configWhitelist || [];
  const filtered  = {};

  for (let i = 0; i < whitelist.length; i++) {
    const key = whitelist[i];
    if (config[key] !== undefined) {
      filtered[key] = config[key];
    }
  }

  return filtered;
};

/**
 * Zip up multiple files and/or directories.
 *
 * @param {Array<String>} sources Absolute paths to files and/or directories.
 * @param {String} destination
 * @param {String} relativeTo
 * @returns {Promise<*>}
 */
const zip = (sources, destination, relativeTo) => new Promise((resolve, reject) => {
  const output  = fs.createWriteStream(destination);
  const archive = archiver('zip', {
    zlib: {
      level: 9,
    },
  });

  output.on('close', resolve);

  archive.on('error', (error) => reject(new Error(`Error: Failed to create archive: ${error.message}`)));

  archive.pipe(output);

  for (let i = 0; i < sources.length; i++) {
    const pattern = sources[i];
    const matches = glob.sync(pattern);

    for (let j = 0; j < matches.length; j++) {
      const item         = matches[j];
      const relativeItem = path.relative(relativeTo, item);

      if (!shell.test('-e', item)) {
        reject(new Error(`File or directory does not exist: ${relativeItem}`));
        return;
      }

      if (shell.test('-d', item)) {
        archive.directory(item, relativeItem);
        continue;
      }

      if (shell.test('-f', item)) {
        if (relativeItem === 'config.json') {
          archive.append(Buffer.from(JSON.stringify(getWhitelistedConfig(item))), { name: relativeItem });
          continue;
        }

        archive.file(item, { name: relativeItem });
        continue;
      }

      reject(new Error(`Item is neither a file nor a directory: ${relativeItem}`));
      return;
    }
  }

  archive.finalize();
});

module.exports = {
  zip,
};
