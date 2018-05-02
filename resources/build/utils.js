/**
 * The module dependencies.
 */
const path = require('path');

module.exports.themeRootPath = (basePath = '', destPath = '') =>
    path.resolve(__dirname, '../../', basePath, destPath);

module.exports.srcPath = (basePath = '', destPath = '') =>
    path.resolve(__dirname, '../', basePath, destPath);

module.exports.buildPath = (basePath = '', destPath = '') =>
    path.resolve(__dirname, '../../dist', basePath, destPath);

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

module.exports.buildScriptsPath = destPath =>
    exports.buildPath('scripts', destPath);

module.exports.buildStylesPath = destPath =>
    exports.buildPath('styles', destPath);

module.exports.buildImagesPath = destPath =>
    exports.buildPath('images', destPath);

module.exports.buildFontsPath = destPath =>
    exports.buildPath('fonts', destPath);

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
