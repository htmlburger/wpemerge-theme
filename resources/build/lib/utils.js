/**
 * The external dependencies.
 */
const fs = require('fs');
const path = require('path');
const crypto = require('crypto');

/**
 * User config cache.
 */
let userConfig = null;

/**
 * API.
 */
module.exports.themeRootPath = (basePath = '', destPath = '') =>
  path.resolve(path.dirname(__dirname), '../../', basePath, destPath);

module.exports.srcPath = (basePath = '', destPath = '') =>
  path.resolve(path.dirname(__dirname), '../', basePath, destPath);

module.exports.distPath = (basePath = '', destPath = '') =>
  path.resolve(path.dirname(__dirname), '../../dist', basePath, destPath);

module.exports.srcScriptsPath = destPath =>
  exports.srcPath('scripts', destPath);

module.exports.srcStylesPath = destPath =>
  exports.srcPath('styles', destPath);

module.exports.srcImagesPath = destPath =>
  exports.srcPath('images', destPath);

module.exports.srcFontsPath = destPath =>
  exports.srcPath('fonts', destPath);

module.exports.srcVendorPath = destPath =>
  exports.srcPath('vendor', destPath);

module.exports.distScriptsPath = destPath =>
  exports.distPath('scripts', destPath);

module.exports.distStylesPath = destPath =>
  exports.distPath('styles', destPath);

module.exports.distImagesPath = destPath =>
  exports.distPath('images', destPath);

module.exports.distFontsPath = destPath =>
  exports.distPath('fonts', destPath);

module.exports.tests = {
  scripts: /\.(js|jsx)$/,
  styles: /\.(css|scss|sass)$/,
  images: /images[\\/].*\.(ico|jpg|jpeg|png|svg|gif)$/,
  fonts: /fonts[\\/].*\.(eot|svg|ttf|woff|woff2)$/,
};

module.exports.detectEnv = () => {
  const env = process.env.NODE_ENV || 'development';
  const isDev = env === 'development';
  const isProduction = env === 'production';

  return {
    env,
    isDev,
    isProduction,
  };
};

module.exports.getUserConfig = () => {
  const userConfigPath = path.join(process.cwd(), 'config.json');

  if (userConfig !== null) {
    return userConfig;
  }

  if (!fs.existsSync(userConfigPath)) {
    console.log('\x1B[31mCould not find your config.json file. Please make a copy of config.json.dist and adjust as needed.\x1B[0m');
    process.exit(1);
  }

  try {
    userConfig = JSON.parse(fs.readFileSync(userConfigPath));
  } catch (e) {
    console.log('\x1B[31mCould not parse your config.json file. Please make sure it is a valid JSON file.\x1B[0m');
    process.exit(1);
  }

  return userConfig;
};

module.exports.filehash = (file) => {
  const hash = crypto.createHash('sha1');
  hash.update(fs.readFileSync(file));
  return hash.digest('hex');
};
