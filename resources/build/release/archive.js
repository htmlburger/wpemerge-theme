/**
 * The external dependencies.
 */
const fs = require('fs');
const path = require('path');
const shell = require('shelljs');
const archiver = require('archiver');

/**
 * Zip a directory.
 *
 * @param {string} source
 * @param {string} destination
 * @returns {Promise}
 */
const zip = (source, destination) => new Promise((resolve, reject) => {
  if (!shell.test('-e', source)) {
    reject(new Error(`Directory does not exist: ${source}`));
    return;
  }

  if (!shell.test('-d', source)) {
    reject(new Error(`Source is not a directory: ${source}`));
    return;
  }

  if (shell.test('-e', destination)) {
    reject(new Error(`Zip already exists: ${destination}`));
    return;
  }

  const output = fs.createWriteStream(destination);

  output.on('close', resolve);

  const archive = archiver('zip', {
    zlib: {
      level: 9,
    },
  });

  archive.on('error', error => reject(new Error(`Failed to create archive: ${error.message}`)));

  archive.pipe(output);

  archive.directory(source, path.basename(destination).replace(/\.zip$/, ''));

  archive.finalize();
});

module.exports = {
  zip,
};
