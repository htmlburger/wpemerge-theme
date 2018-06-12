# Yarn Scripts

## `yarn dev`

Run the build process in development mode and enable [Browsersync](#browsersync).

## `yarn build`

Run the build process in production mode with all optimizations enabled.

## `yarn lint`

Run the scripts and styles linters (`eslint` and `stylelint` respectively), reporting any lint rule violations.

## `yarn lint-fix`

Run the scripts and styles linters (`eslint` and `stylelint` respectively), fixing any fixable lint rule violations.

## Browsersync

By default, Browsersync will setup a simple web server and serve your files through a custom port in order to establish a communication channel between the build process and your browser like this:
`http://localhost:3000/`

This is not ideal when working on WordPress projects that are setup in a subdirectory, for example.
To let Browsersync know your site's url simply pass it as a parameter when running the dev task:
`yarn dev --dev-url=http://localhost/my/nested/subdirectory/wordpress/`