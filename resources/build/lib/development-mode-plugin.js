/**
 * The external dependencies.
 */
const fs = require('fs');
const path = require('path');

class DevelopmentModePlugin {
  constructor({ hot = false }) {
    this.hot = hot;
  }

  apply(compiler) {
    compiler.hooks.done.tap(
      'WP Emerge Development Mode Plugin',
      (stats) => {
        const development = {
          hot: this.hot,
        };

        const filename = path.resolve(stats.compilation.outputOptions.path, 'development.json');
        fs.writeFileSync(filename, JSON.stringify(development));
      }
    );
  }
}

module.exports = DevelopmentModePlugin;
