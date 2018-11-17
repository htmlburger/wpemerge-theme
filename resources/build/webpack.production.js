/**
 * The external dependencies.
 */
const { ProvidePlugin, WatchIgnorePlugin } = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

/**
 * The internal dependencies.
 */
const utils = require('./lib/utils');
const configLoader = require('./config-loader');
const spriteSmith = require('./spritesmith');
const postcss = require('./postcss');

/**
 * Setup the env.
 */
const { env: envName } = utils.detectEnv();

/**
 * Setup babel loader.
 */
const babelLoader = {
  loader: 'babel-loader',
  options: {
    cacheDirectory: false,
    comments: false,
    presets: [
      [
        'env',
        {
          targets: {
            browsers: ['last 3 versions'],
          },
        },
      ],
      // airbnb not included as stage-2 already covers it
      'stage-2',
    ],
  },
};

/**
 * Setup extract text plugin.
 */
const extractSass = new ExtractTextPlugin({
  filename: '../styles/[name].css',
});

/**
 * Setup webpack plugins.
 */
const plugins = [
  new CleanWebpackPlugin(utils.distPath(), {
    root: utils.themeRootPath(),
  }),
  new WatchIgnorePlugin([
    utils.distImagesPath('sprite.png'),
    utils.distImagesPath('sprite@2x.png'),
  ]),
  new ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
  }),
  extractSass,
  spriteSmith,
  new UglifyJSPlugin(),
  new ImageminPlugin({
    optipng: {
      optimizationLevel: 7,
    },
    gifsicle: {
      optimizationLevel: 3,
    },
    svgo: {
      plugins: [
        { cleanupAttrs: true },
        { removeDoctype: true },
        { removeXMLProcInst: true },
        { removeComments: true },
        { removeMetadata: true },
        { removeUselessDefs: true },
        { removeEditorsNSData: true },
        { removeEmptyAttrs: true },
        { removeHiddenElems: false },
        { removeEmptyText: true },
        { removeEmptyContainers: true },
        { cleanupEnableBackground: true },
        { removeViewBox: true },
        { cleanupIDs: false },
        { convertStyleToAttrs: true },
      ]
    },
    plugins: [
      require('imagemin-mozjpeg')({
        quality: 100,
      }),
    ],
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
    path: utils.distPath('scripts'),
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
      {
        enforce: 'pre',
        test: /\.(js|jsx|css|scss)$/,
        use: 'import-glob',
      },
      {
        test: utils.themeRootPath('config.json'),
        use: configLoader,
      },
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: babelLoader,
      },
      {
        test: /\.(css|scss)$/,
        use: extractSass.extract({
          use: [
            {
              loader: 'css-loader',
              options: {
                minimize: true,
              },
            },
            {
              loader: 'postcss-loader',
              options: postcss,
            },
            'sass-loader',
          ],
        }),
      },
      {
        test: /images[\\/].*\.(ico|jpg|jpeg|png|svg|gif)$/,
        use: 'file-loader?name=../images/[name].[ext]',
      },
      {
        test: /fonts[\\/].*\.(eot|svg|ttf|woff|woff2)$/,
        use: 'file-loader?name=../fonts/[name].[ext]',
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
  mode: envName,
  cache: false,
  bail: false,
  watch: false,
  devtool: false,
};
