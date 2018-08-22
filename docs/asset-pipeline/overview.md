# Overview

_Note: This article assumes you are using the default OS terminal on MacOS and Linux or GitBash on Windows._

The WP Emerge Theme comes with a powerful asset build process which covers a multitude of use cases so you don't have to.

## Requirements

- [NodeJS](https://nodejs.org/en/): >=6.9.1
- [NPM](https://www.npmjs.com/) >= 5.3.0 or [Yarn](https://yarnpkg.com/en/) >= 1.0.0

## Setting up the environment

1. To install all required packages run `yarn install`
1. Run your desired build process:
    - To run the build process in production mode run `yarn build`
    - To run the build process in development mode run `yarn dev`. This will also watch files for changes and run Browsersync.
    - For more information, check out the [Yarn Scripts](../yarn-scripts/overview.md) article.

## Importing assets

The webpack configuration supports a number of resolve aliases and module directories for easier asset referencing:

| Alias in JavaScript | Alias in SASS | Resolve |
| --- | --- |--- |
| `~/` | `~` | `node_modules` |
| `@scripts/` | `~@scripts/` | `resources/scripts` |
| `@styles/` | `~@styles/` | `resources/styles` |
| `@images/` | `~@images/` | `resources/images` |
| `@fonts/` | `~@fonts/` | `resources/fonts` |
| `@vendor/` | `~@vendor/` | `resources/vendor` |
| `@dist/` | `~@dist/` | `dist` |

_Note: All aliases resolve to absolute paths so you can use them in any file, regardless of its location._

### Examples

| File | Import |
| --- | --- |
| `node_modules/foo/foo.js` | `import foo from '~/foo/foo';` |
| `node_modules/foo/index.js` | `import foo from '~/foo';` |
| `resources/vendor/foo/foo.js` | `import foo from '@vendor/foo/foo';` |
| `resources/scripts/foo/foo.js` | `import foo from '@scripts/foo/foo';` |
| `resources/scripts/foo.js` | `import foo from '@scripts/foo';` |

In the last two examples you can even omit the `@scripts/` portion as your `resources/scripts/` directory is considered a module root:

| File | Import |
| --- | --- |
| `resources/scripts/foo/foo.js` | `import foo from 'foo/foo';` |
| `resources/scripts/foo.js` | `import foo from 'foo';` |

Similar patterns apply to SASS as well:

| File | Import |
| --- | --- |
| `node_modules/foo/foo.scss` | `@import '~foo/foo';` |
| `node_modules/foo/index.scss` | `@import '~foo';` |
| `resources/vendor/foo/foo.scss` | `@import '~@vendor/foo/foo';` |
| `resources/styles/foo/foo.scss` | `@import '~@styles/foo/foo';` |
| `resources/styles/foo.scss` | `@import '~@styles/foo';` |

Unlike `scripts/`, the `styles/` directory is __NOT__ considered a module root to avoid name clashes.
