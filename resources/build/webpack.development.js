/**
 * The external dependencies.
 */
const url = require('url');
const { ProvidePlugin, WatchIgnorePlugin } = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');
const chokidar = require('chokidar');
const get = require('lodash/get');

/**
 * The internal dependencies.
 */
const utils = require('./lib/utils');
const configLoader = require('./config-loader');
const spriteSmith = require('./spritesmith');
const spriteSvg = require('./spritesvg');
const postcss = require('./postcss');

/**
 * Setup the environment.
 */
const env = utils.detectEnv();
const userConfig = utils.getUserConfig();
const devPort = get(userConfig, 'development.port', 3000);
const devHotUrl = url.parse(get(userConfig, 'development.hotUrl', 'http://localhost/').replace(/\/$/, ''));

/**
 * Setup babel loader.
 */
const babelLoader = {
  loader: 'babel-loader',
  options: {
    cacheDirectory: true,
    comments: false,
    presets: [
      'env',
      // airbnb not included as stage-2 already covers it
      'stage-2',
    ],
  },
};

/**
 * Setup webpack plugins.
 */
const plugins = [
  new CleanWebpackPlugin(utils.distPath(), {
    root: utils.rootPath(),
  }),
  new WatchIgnorePlugin([
    utils.distImagesPath('sprite.png'),
    utils.distImagesPath('sprite@2x.png'),
  ]),
  new ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
  }),
  new MiniCssExtractPlugin({
    filename: `styles/[name]${env.filenameSuffix}.css`,
  }),
  spriteSmith,
  spriteSvg,
  new ManifestPlugin({
    writeToFileEmit: true,
  }),
];

/**
 * Export the configuration.
 */
module.exports = {
  /**
   * The input.
   */
  entry: require('./webpack/entry'),

  /**
   * The output.
   */
  output: {
    ...require('./webpack/output'),
    ...(env.isHot
      // Required to work around https://github.com/webpack/webpack-dev-server/issues/1385
      ? { publicPath: `${devHotUrl.protocol}//${devHotUrl.host}:${devPort}/` }
      : {}
    ),
  },

  /**
   * Resolve utilities.
   */
  resolve: require('./webpack/resolve'),

  /**
   * Resolve the dependencies that are available in the global scope.
   */
  externals: require('./webpack/externals'),

  /**
   * Setup the transformations.
   */
  module: {
    rules: [
      /**
       * Add support for blogs in import statements.
       */
      {
        enforce: 'pre',
        test: /\.(js|jsx|css|scss|sass)$/,
        use: 'import-glob',
      },

      /**
       * Handle config.json.
       */
      {
        type: 'javascript/auto',
        test: utils.rootPath('config.json'),
        use: configLoader,
      },

      /**
       * Handle scripts.
       */
      {
        test: utils.tests.scripts,
        exclude: /node_modules/,
        use: babelLoader,
      },

      /**
       * Handle styles.
       */
      {
        test: utils.tests.styles,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: '../',
              hmr: env.isHot,
            },
          },
          'css-loader',
          {
            loader: 'postcss-loader',
            options: postcss,
          },
          'sass-loader',
        ],
      },

      /**
       * Handle images.
       */
      {
        test: utils.tests.images,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: file => `[name].${utils.filehash(file).substr(0, 10)}.[ext]`,
              outputPath: 'images',
            },
          },
        ],
      },

      /**
       * Handle SVG sprites.
       */
      {
        test: utils.tests.spriteSvgs,
        use: [
          {
            loader: 'svg-sprite-loader',
            options: {
              extract: false,
            },
          },
        ],
      },

      /**
       * Handle fonts.
       */
      {
        test: utils.tests.fonts,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: file => `[name].${utils.filehash(file).substr(0, 10)}.[ext]`,
              outputPath: 'fonts',
            },
          },
        ],
      },
    ],
  },

  /**
   * Setup the transformations.
   */
  plugins,

  /**
   * Setup the development tools.
   */
  mode: 'development',
  cache: true,
  bail: false,
  watch: true,
  devtool: 'source-map',
  devServer: {
    hot: true,
    host: devHotUrl.host,
    port: devPort,
    disableHostCheck: true,
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    overlay: true,

    // Reload on view file changes.
    before: (app, server) => {
      chokidar
        .watch([
          './views/**/*.php',
          './*.php',
        ])
        .on('all', () => {
          server.sockWrite(server.sockets, 'content-changed');
        });
    },
  },
};
