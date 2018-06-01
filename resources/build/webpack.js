/**
 * The external dependencies.
 */
const { ProvidePlugin, WatchIgnorePlugin } = require('webpack');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const SpritesmithPlugin = require('webpack-spritesmith');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

/**
 * The internal dependencies.
 */
const utils = require('./utils');
const postcssConfig = require('./postcss');
const browsersyncConfig = require('./browsersync');

/**
 * Setup the env.
 */
const { env: envName, isProduction, isDev } = utils.detectEnv();

/**
 * Setup babel loader.
 */
const babelLoader = {
  loader: 'babel-loader',
  options: {
    cacheDirectory: isDev,
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
 * Setup spritesmith plugin.
 */
const spriteSmith = new SpritesmithPlugin({
  src: {
    cwd: utils.srcImagesPath('sprite'),
    glob: '*.{jpg,jpeg,png}',
  },
  target: {
    image: utils.buildImagesPath('sprite.png'),
    css: utils.srcStylesPath('_sprite.scss'),
  },
  apiOptions: {
    cssImageRef: '~@build/images/sprite.png',
  },
  // retina: '@2x', // Uncomment this line to enable retina spritesheets.
});

/**
 * Setup the plugins for different environments.
 */
const plugins = [
  new WatchIgnorePlugin([
    utils.buildImagesPath('sprite.png'),
    utils.buildImagesPath('sprite@2x.png'),
  ]),
  new ProvidePlugin({
    $: 'jquery',
    jQuery: 'jquery',
  }),
  extractSass,
  spriteSmith,
];

if (isDev) {
  plugins.push(
    new BrowserSyncPlugin(browsersyncConfig, {
      injectCss: true,
    })
  );
}

if (isProduction) {
  plugins.push(
    new UglifyJSPlugin()
  );

  plugins.push(
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
    })
  );
}

/**
 * Export the configuration.
 */
module.exports = {
  /**
   * The input.
   */
  entry: {
    'bundle': utils.srcScriptsPath('index.js'),
    'admin-bundle': utils.srcScriptsPath('admin/index.js'),
    'login-bundle': utils.srcScriptsPath('login/index.js'),
  },

  /**
   * The output.
   */
  output: {
    path: utils.buildPath('scripts'),
  },

  /**
   * Resolve utilities.
   */
  resolve: {
    modules: [utils.srcScriptsPath(), 'node_modules'],
    extensions: ['.js', '.jsx', '.json', '.css', '.scss'],
    alias: {
      '@scripts': utils.srcScriptsPath(),
      '@styles': utils.srcStylesPath(),
      '@images': utils.srcImagesPath(),
      '@fonts': utils.srcFontsPath(),
      '@vendor': utils.srcVendorPath(),
      '@build': utils.buildPath(),
      '~': utils.themeRootPath('node_modules'),
      'isotope': 'isotope-layout',
      'jquery-ui': 'jquery-ui-dist/jquery-ui.js',
      'masonry': 'masonry-layout',
    },
  },

  /**
   * Resolve the dependencies that are available in the global scope.
   */
  externals: {
    jquery: 'jQuery',
  },

  /**
   * Setup the transformations.
   */
  module: {
    rules: [
      {
        enforce: 'pre',
        test: /\.(js|jsx|css|scss)$/,
        loader: 'import-glob',
      },
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: [babelLoader],
      },
      {
        test: /\.(css|scss)$/,
        loader: extractSass.extract({
          use: [
            {
              loader: 'css-loader',
              options: {
                minimize: isProduction,
              },
            },
            'sass-loader',
            {
              loader: 'postcss-loader',
              options: postcssConfig,
            },
            {
              loader: 'stylefmt-loader',
              options: {
                codeFilename: utils.srcPath('.stylelintrc.json'),
              },
            },
          ],
        }),
      },
      {
        test: /images[\\/].*\.(ico|jpg|jpeg|png|svg|gif)$/,
        loader: 'file-loader?name=../images/[name].[ext]',
      },
      {
        test: /fonts[\\/].*\.(eot|svg|ttf|woff|woff2)$/,
        loader: 'file-loader?name=../fonts/[name].[ext]',
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
  cache: isDev,
  bail: false,
  watch: isDev,
  devtool: isDev ? 'source-map' : false,
};
