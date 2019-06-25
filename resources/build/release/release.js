/**
 * The external dependencies.
 */
const archiver = require('archiver');
const fs = require('fs');
const path = require('path');
const shell = require('shelljs');

/**
 * The internal dependencies.
 */
const utils = require('../lib/utils');
const config = require('../../../config.json');

const shutdown = (exitCode = 0) => {
  // Restore dev dependencies.
  console.log('Restoring development dependencies ...');
  if (shell.exec('composer install').code !== 0) {
    console.error('Error: Failed to restore development dependencies with composer.');
    console.log('Please run "composer install" manually.');
    exitCode = 1;
  }
  process.exit(exitCode);
};

const themeName = path.basename(utils.themeRootPath());
const destination = path.join(path.dirname(utils.themeRootPath()), `${themeName}.zip`);

if (fs.existsSync(destination)) {
  console.error(`Destination file already exists: ${destination}`);
  process.exit(1);
}

const output = fs.createWriteStream(destination);
const archive = archiver('zip', {
  zlib: {
    level: 9,
  },
});

archive.on('error', (error) => {
  console.error(`Error: Failed to create archive: ${error.message}`);
  shutdown(1);
});

// Avoid bundling dev dependencies.
console.log('Installing production dependencies ...');
if (shell.exec('composer install --no-dev').code !== 0) {
  console.error('Error: Failed to install production dependencies with composer.');
  shutdown(1);
}

archive.pipe(output);

for (let i = 0; i < config.release.include.length; i++) {
  const item = config.release.include[ i ];
  const itemPath = utils.themeRootPath(item);

  if (!shell.test('-e', itemPath)) {
    console.error(`File or directory does not exist: ${item}`);
    shutdown(1);
  }

  if (shell.test('-d', itemPath)) {
    archive.directory(itemPath, item);
    continue;
  }

  if (shell.test('-f', itemPath)) {
    archive.file(itemPath, { name: item });
    continue;
  }

  console.error(`Item is neither a file nor a directory: ${item}`);
  shutdown(1);
}

archive.on('finish', () => {
  shutdown();
});

archive.finalize();
