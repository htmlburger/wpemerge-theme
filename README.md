# <a href="http://wpemerge.com"><img src="https://raw.githubusercontent.com/htmlburger/wpemerge-theme/master/docs/assets/logo-bar.png" height="60" alt="WP Emerge Theme Logo" aria-label='WPEmerge.com' /></a>

[![Packagist](https://img.shields.io/packagist/vpre/htmlburger/wpemerge-theme.svg?style=flat-square&colorB=0366d6)](https://packagist.org/packages/htmlburger/wpemerge-theme) [![Gitter](https://img.shields.io/gitter/room/nwjs/nw.js.svg?style=flat-square&colorB=7d07d1)](https://gitter.im/wpemerge/Lobby)


A modern WordPress starter theme which uses the [WP Emerge](https://github.com/htmlburger/wpemerge) framework.

_This is the WP Emerge Theme project - for the WP Emerge framework please check out https://github.com/htmlburger/wpemerge._

## Summary

- [Documentation](#documentation)
- [Development Team](#development-team)
- [Comparison Table](#comparison-table)
- [Features](#features)
- [Requirements](#requirements)
- [Directory structure](#directory-structure)
- [Contributing](#contributing)

## Documentation

https://docs.theme.wpemerge.com/

https://docs.theme.wpemerge.com/quickstart.html

## Development Team

Brought to you by [Atanas Angelov](https://github.com/atanas-angelov-dev) and the lovely folks at [htmlBurger](http://htmlburger.com).

## Comparison Table

|                                | WP Emerge Theme  | Sage           | Timber   |
|--------------------------------|------------------|----------------|----------|
| View Engine                    | PHP, Blade, Twig, any | Blade          | Twig     |
| Routing                        | ✔                | ✖              | ✖        |
| MVC                            | ✖✔✔              | ✖✔✖¹           | ✖✔✖      |
| Middleware                     | ✔                | ✖              | ✖        |
| View Composers                 | ✔                | ✔/✖²           | ✖        |
| Service Container              | ✔                | ✔              | ✖        |
| Stylesheets                    | SASS + PostCSS   | SASS + PostCSS | N/A³     |
| JavaScript                     | ES6              | ES6            | N/A³     |
| Front end, Admin, Editor and Login Bundles | ✔                | ✖              | N/A³     |
| Automatic Sprite Generation    | ✔                | ✖              | N/A³     |
| Cache Breaker                  | ✔                | ✖              | ✖        |
| WPCS Linting                   | ✔                | ✖              | ✖        |
| [Advanced Error Reporting](https://docs.wpemerge.com/routing/exceptions.html) | ✔ | ✖ | ✖ |
| WP Unit Tests for your classes | ✔                | ✖              | ✖        |

_¹ Sage's Controller is more of a View Composer than a Controller._

_² Sage's Controller provides similar functionality but is limited to 1 composer (controller) per view and vice versa._

_³ Timber does not provide a front-end build process so you can implement whatever you prefer._

_Email any factual inaccuracies to [atanas.angelov.dev@gmail.com](mailto:atanas.angelov.dev@gmail.com) so they can be corrected._ 

## Features
- All features from [WP Emerge](https://docs.wpemerge.com/):
  - Routes with optional rewrite rule integration
  - Controllers
  - Middleware
  - PSR-7 Responses
  - View Composers
  - Service Container
  - Service Providers
  - Support for Php, [Blade 5.4](https://laravel.com/docs/5.4/blade) and/or [Twig 2](https://twig.symfony.com/doc/2.x/api.html) for views
- Gutenberg support.
- [SASS](https://sass-lang.com/) + [PostCSS](https://github.com/postcss/postcss) for stylesheets. Separate bundles are created for **front-end**, **administration**, **Gutenberg** and **login** pages.
- ES6 for JavaScript. Separate bundles are created for **front-end**, **administration**, **Gutenberg** and **login** pages.
- [Webpack](https://webpack.js.org/) to transpile and bundle assets, create sprites, optimize images etc.
- [Browsersync](https://www.browsersync.io/) for synchronized browser development.
- Autoloading for all classes in your `App\` namespace.
- Automatic, fool-proof style and script cache breaker.
- WPCS, JavaScript and SASS linting using single yarn commands.
- Single-command optional CSS package installation:
    - Boostrap 4
    - Bulma
    - Foundation
    - Tachyons
    - FontAwesome
- WP Unit Test scaffolding for your own classes.

## Requirements

- [PHP](http://php.net/) >= 5.5
- [WordPress](https://wordpress.org/) >= 4.7
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/) >= 6.9.1
- [Yarn](https://yarnpkg.com/en/) or NPM

## Directory structure

```
wp-content/themes/your-theme
├── app/
│   ├── helpers/              # Helper files, add your own here as well.
│   ├── setup/                # Register WordPress menus, post types etc.
│   │   ├── menus.php
│   │   ├── post-types.php
│   │   ├── sidebars.php
│   │   ├── taxonomies.php
│   │   ├── theme-support.php
│   │   └── widgets.php
│   ├── src/                  # PSR-4 autoloaded classes.
│   │   ├── Controllers/      # Controller classes for WP Emerge routes.
│   │   ├── Widgets/          # Widget classes.
│   │   └── ...
│   ├── config.php            # WP Emerge configuration.
│   ├── helpers.php           # Require your helper files here.
│   ├── hooks.php             # Register your actions and filters here.
│   └── framework.php         # Register your WP Emerge routes, globals etc.
├── dist/                     # Bundles, optimized images etc.
├── languages/                # Language files.
├── resources/
│   ├── build/                # Build process configuration.
│   ├── fonts/
│   ├── images/
│   ├── scripts/
│   │   ├── admin/            # Administration scripts.
│   │   ├── editor/           # Gutenberg editor scripts.
│   │   ├── login/            # Login scripts.
│   │   └── theme/            # Front-end scripts.
│   ├── styles/
│   │   ├── admin/            # Administration styles.
│   │   ├── editor/           # Gutenberg editor styles.
│   │   ├── login/            # Login styles.
│   │   ├── shared/           # Shared styles.
│   │   └── theme/            # Front-end styles.
│   └── vendor/               # Any third-party, non-npm assets.
├── theme/                    # Required theme files and views
│   ├── partials/             # View partials.
│   ├── templates/            # Page templates.
│   ├── functions.php         # Bootstrap theme.
│   ├── screenshot.png        # Theme screenshot.
│   ├── style.css             # Theme stylesheet (avoid adding css here).
│   └── [index.php ...]
├── vendor/                   # Composer packages.
├── README.md                 # Your theme README.
└── ...
```

### Notable directories

#### `app/helpers/`

Add PHP helper files here. Helper files should include __function definitions only__. See below for information on where to put actions, filters, classes etc.

#### `app/setup/`

Modify files here according to your needs. These files should contain __registrations and declarations of WordPress entities only__ such as post types, taxonomies etc.

#### `app/src/`

Add PHP class files here. All clases in the `App\` namespace are autoloaded in accordance with the [PSR-4](http://www.php-fig.org/psr/psr-4/) standard.

#### `resources/images/`

Add images for styling here. Optimized copies will be placed in `dist/images/` when running the build process.

#### `resources/styles/theme/`

Add .css and .scss files to add them to the front-end bundle. Don't forget to `@import` them in `index.scss`.

#### `resources/styles/[admin,editor,login]/`

These directories are for the admin, editor and login bundles, respectively. They work identically to the main `resources/styles/theme/` directory.

#### `resources/scripts/theme/`

Add JavaScript files here to add them to the front-end bundle. The entry point is `index.js`.

#### `resources/scripts/[admin,editor,login]/`

These directories are for the admin, editor and login bundles, respectively. They work identically to the main `resources/scripts/theme/` directory.

#### `theme/`

Add views in this, the `theme/partials/` or the `theme/templates/` directories accordingly. Avoid adding any PHP logic here, unless it pertains to layouting (PHP logic should go into helper files or [WP Emerge controllers](https://docs.wpemerge.com/controllers/overview.html))

## Contributing

WP Emerge Theme is completely open source and we encourage everybody to participate by:

- ⭐ the project on GitHub (https://github.com/htmlburger/wpemerge-theme)
- Posting bug reports (https://github.com/htmlburger/wpemerge-theme/issues)
- (Emailing security issues to [atanas.angelov.dev@gmail.com](mailto:atanas.angelov.dev@gmail.com) instead)
- Posting feature suggestions (https://github.com/htmlburger/wpemerge-theme/issues)
- Posting and/or answering questions (https://github.com/htmlburger/wpemerge-theme/issues)
- Submitting pull requests (https://github.com/htmlburger/wpemerge-theme/pulls)
- Sharing your excitement about WP Emerge with your community
