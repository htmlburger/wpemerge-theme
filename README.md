# <a href="http://wpemerge.com"><img src="https://docs.wpemerge.com/_images/wpemerge-theme-logo-bar.png" height="61" alt="WP Emerge Starter Theme Logo" aria-label='WPEmerge.com' /></a>

[![Packagist](https://img.shields.io/packagist/vpre/htmlburger/wpemerge-theme.svg?style=flat-square&colorB=0366d6)](https://packagist.org/packages/htmlburger/wpemerge-theme) [![Travis branch](https://img.shields.io/travis/htmlburger/wpemerge-theme/master.svg?style=flat-square)](https://travis-ci.org/htmlburger/wpemerge-theme/builds) [![Gitter](https://img.shields.io/gitter/room/nwjs/nw.js.svg?style=flat-square&colorB=7d07d1)](https://gitter.im/wpemerge/Lobby)


A modern WordPress starter theme which uses the [WP Emerge](https://github.com/htmlburger/wpemerge) framework.

_This is the WP Emerge Starter Theme project - for the WP Emerge framework please check out https://github.com/htmlburger/wpemerge._

## Summary

- [Documentation](#documentation)
- [Development Team](#development-team)
- [Comparison Table](#comparison-table)
- [Features](#features)
- [Non-goals](#non-goals)
- [Requirements](#requirements)
- [Directory structure](#directory-structure)
- [Contributing](#contributing)

## Documentation

[http://docs.wpemerge.com/#/starter/theme/overview](http://docs.wpemerge.com/#/starter/theme/overview)

[http://docs.wpemerge.com/#/starter/theme/quickstart](http://docs.wpemerge.com/#/starter/theme/quickstart)

## Development Team

Brought to you by [Atanas Angelov](https://atanas.dev/) and the lovely folks at [htmlBurger](http://htmlburger.com).

## Comparison Table

|                                | WP Emerge Theme  | Sage           | Timber   |
|--------------------------------|------------------|----------------|----------|
| View Engine                    | PHP, Blade, Twig, any | PHP, Blade     | Twig     |
| Routing                        | ✔                | ✖              | ✔        |
| WP Admin Routing | ✔ | ✖ | ✖ |
| WP AJAX Routing | ✔ | ✖ | ✖ |
| MVC                            | ✖✔✔              | ✖✔✖¹           | ✖✔✖      |
| Middleware                     | ✔                | ✖              | ✖        |
| View Composers                 | ✔                | ✔/✖²           | ✖        |
| Service Container              | ✔                | ✔              | ✖        |
| Stylesheets                    | SASS + PostCSS   | SASS + PostCSS | N/A³     |
| JavaScript                     | ES6              | ES6            | N/A³     |
| Front end, Admin, Editor and Login Bundles | ✔✔✔✔            | ✔✖✖✖              | N/A³     |
| Automatic Sprite Generation    | ✔                | ✖              | N/A³     |
| Automatic Cache Busting        | ✔                | ✖              | ✖        |
| WPCS Linting                   | ✔                | ✖              | ✖        |
| [Advanced Error Reporting](https://docs.wpemerge.com/#/framework/routing/error-handling) | ✔ | ✖ | ✖ |
| WP Unit Tests for your classes | ✔                | ✖              | ✖        |

_¹ Sage's Controller is more of a View Composer than a Controller._

_² Sage's Controller provides similar functionality but is limited to 1 composer (controller) per view and vice versa._

_³ Timber does not provide a front-end build process so you can implement whatever you prefer._

_Email any factual inaccuracies to [hi@atanas.dev](mailto:hi@atanas.dev) so they can be corrected._

## Features
- All features from [WP Emerge](https://docs.wpemerge.com/#/framework/overview):
  - Named routes with custom URLs and query filters
  - Controllers
  - Middleware
  - PSR-7 Responses
  - View Composers
  - Service Container
  - Service Providers
  - PHP view layouts (a.k.a. automatic wrapping)
  - Support for PHP, [Blade 5.4](https://laravel.com/docs/5.4/blade) and/or [Twig 2](https://twig.symfony.com/doc/2.x/api.html) for views
- Gutenberg support.
- [SASS](https://sass-lang.com/) + [PostCSS](https://github.com/postcss/postcss) for stylesheets. Separate bundles are created for **front-end**, **administration**, **Gutenberg** and **login** pages and custom bundles can be added easily.
- ES6 for JavaScript. Separate bundles are created for **front-end**, **administration**, **Gutenberg** and **login** pages and custom bundles can be added easily.
- Pure [Webpack](https://webpack.js.org/) to transpile and bundle assets, create sprites, optimize images etc.
- [Hot Module Replacement](https://webpack.js.org/concepts/hot-module-replacement/) for synchronized browser development.
- Autoloading for all classes in your `MyApp\` namespace.
- Automatic, fool-proof cache busting for all assets, including ones referenced in styles.
- WPCS, JavaScript and SASS linting and fixing using a single yarn command.
- Single-command optional CSS package installation:
    - Normalize.css
    - Boostrap 4
    - Bulma
    - Foundation
    - Tachyons
    - Tailwind CSS
    - Spectre.css
    - FontAwesome
- WP Unit Test scaffolding for your own classes.

## Non-goals

- Taking over the WordPress main query.

  WP Emerge does __not__ take over the main query - it actively works with it.
- Taking over WordPress routing.

  WP Emerge does __not__ take over WordPress' routing - it actively works with it. The only exception to this are hardcoded URLs explicitly added by a user.
- Reinventing WordPress APIs using object-oriented interfaces.

  WP Emerge does not provide alternative APIs for registering post types, taxonomies or the like for little added benefit. Instead, it provides logical and handy places for developers to use core APIs.
- Using a third party engine by default.

  WP Emerge uses PHP by default in the same way WordPress does but with added features. Using a third party engine is entirely optional and requires installing an extension.
- Include most of Laravel or another framework.

  WP Emerge is lean and tuned for WordPress. While inspired by Laravel, it does not come with any `illuminate/*` packages. There are only 2 third party production dependencies:
  - `pimple/pimple` - The single-file PHP service container.
  - `guzzlehttp/psr7` - A PSR-7 Request and ServerRequest implementation.

## Requirements

- [PHP](http://php.net/) >= 5.5
- [WordPress](https://wordpress.org/) >= 4.7
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/) >= 12
- [Yarn](https://yarnpkg.com/en/) or NPM

## Directory structure

```
wp-content/themes/your-theme
├── app/
│   ├── helpers/              # Helper files, add your own here as well.
│   ├── routes/               # Register your WP Emerge routes.
│   │   ├── admin.php
│   │   ├── ajax.php
│   │   └── web.php
│   ├── src/                  # PSR-4 autoloaded classes.
│   │   ├── Controllers/      # Controller classes for WP Emerge routes.
│   │   ├── Routing/          # Register your custom routing conditions etc.
│   │   ├── View/             # Register your view composers, globals etc.
│   │   ├── WordPress/        # Register post types, taxonomies, menus etc.
│   │   └── ...
│   ├── config.php            # WP Emerge configuration.
│   ├── helpers.php           # Require your helper files here.
│   ├── hooks.php             # Register your actions and filters here.
│   └── version.php           # WP Emerge version handling.
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
│   │   └── frontend/         # Front-end scripts.
│   ├── styles/
│   │   ├── admin/            # Administration styles.
│   │   ├── editor/           # Gutenberg editor styles.
│   │   ├── login/            # Login styles.
│   │   ├── frontend/         # Front-end styles.
│   │   └── shared/           # Shared styles.
│   └── vendor/               # Any third-party, non-npm assets.
├── vendor/                   # Composer packages.
├── views/
│   ├── layouts/
│   └── partials/
├── views-alternatives/       # Views for other engines like Blade.
├── functions.php             # Bootstrap theme.
├── screenshot.png            # Theme screenshot.
├── style.css                 # Theme stylesheet.
├── wpemerge                  # WP Emerge CLI shortcut.
└── ...
```

### Notable directories

#### `app/helpers/`

Add PHP helper files here. Helper files should include __function definitions only__. See below for information on where to put actions, filters, classes etc.

#### `app/src/`

Add PHP class files here. All clases in the `MyApp\` namespace are autoloaded in accordance with [PSR-4](http://www.php-fig.org/psr/psr-4/).

#### `resources/images/`

Add images for styling here. Optimized copies will be placed in `dist/images/` when running the build process.

#### `resources/styles/frontend/`

Add .css and .scss files to add them to the front-end bundle. Don't forget to `@import` them in `index.scss`.

#### `resources/styles/[admin,editor,login]/`

These directories are for the admin, editor and login bundles, respectively. They work identically to the main `resources/styles/frontend/` directory.

#### `resources/scripts/frontend/`

Add JavaScript files here to add them to the frontend bundle. The entry point is `index.js`.

#### `resources/scripts/[admin,editor,login]/`

These directories are for the admin, editor and login bundles, respectively. They work identically to the main `resources/scripts/frontend/` directory.

#### `views/`

While views that follow the WordPress template hierarchy should go in the theme root directory (e.g. `index.php`, `searchform.php`, `archive-post.php` etc.), others should go in the following directories:
1. `views/layouts/` - Layouts that other views extend.
2. `views/partials/` - Small snippets that are meant to be reused throughout other views.
3. `views/` - Named [custom post templates](https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use) or views that don't fit anywhere else.

Avoid adding any PHP logic in any of these views, unless it pertains to layouting. Business logic should go into:
- Helper files (`app/helpers/*.php`)
- Service classes
- [WP Emerge Controllers](https://docs.wpemerge.com/#/framework/routing/controllers)

## Contributing

WP Emerge Starter Theme is completely open source and we encourage everybody to participate by:

- Reviewing `.github/CONTRIBUTING.md`.
- ⭐ the project on GitHub \([https://github.com/htmlburger/wpemerge-theme](https://github.com/htmlburger/wpemerge-theme)\)
- Posting bug reports \([https://github.com/htmlburger/wpemerge-theme/issues](https://github.com/htmlburger/wpemerge-theme/issues)\)
- (Emailing security issues to [hi@atanas.dev](mailto:hi@atanas.dev) instead)
- Posting feature suggestions \([https://github.com/htmlburger/wpemerge-theme/issues](https://github.com/htmlburger/wpemerge-theme/issues)\)
- Posting and/or answering questions \([https://github.com/htmlburger/wpemerge-theme/issues](https://github.com/htmlburger/wpemerge-theme/issues)\)
- Submitting pull requests \([https://github.com/htmlburger/wpemerge-theme/pulls](https://github.com/htmlburger/wpemerge-theme/pulls)\)
- Sharing your excitement about WP Emerge with your community
