/**
 * The external dependencies.
 */
const archiver = require('archiver');
const fs       = require('fs');
const path     = require('path');
const shell    = require('shelljs');

/**
 * Zip up multiple files and/or directories.
 *
 * @param {Array<String>} sources Absolute paths to files and/or directories.
 * @param {String} destination
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
    const item         = sources[ i ];
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
      archive.file(item, { name: relativeItem });
      continue;
    }

    reject(new Error(`Item is neither a file nor a directory: ${relativeItem}`));
    return;
  }

  archive.finalize();
});

module.exports = {
  zip,
};
