/**
 * The external dependencies.
 */
const fs = require('fs');
const path = require('path');
/* @preset-begin(Tailwind CSS)
const chokidar = require('chokidar');
@preset-end(Tailwind CSS) */

class DevelopmentModePlugin {
  constructor({ hot = false }) {
    this.hot = hot;
  }

  apply(compiler) {
    // Report development mode options.
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

    const views = [
      './views/**/*.php',
      './*.php',
    ];

    /* @preset-begin(Tailwind CSS)
    // Manually invalidate Tailwind's styles when view files change so Tailwind's JIT kicks in.
    chokidar
      .watch(views)
      .on('all', () => {
        const watchers = compiler.watchFileSystem.wfs.watcher.fileWatchers.filter((w) => w.path.indexOf('tailwindcss.scss') !== -1);

        for (let i = 0; i < watchers.length; i++) {
          watchers[i].directoryWatcher.setFileTime(
            watchers[i].path,
            new Date().getTime(),
            false,
            'change'
          );
        }
      });
    @preset-end(Tailwind CSS) */
  }
}

module.exports = DevelopmentModePlugin;
