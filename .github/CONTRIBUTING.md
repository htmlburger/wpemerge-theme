# How to contribute

WP Emerge Theme is completely open source and we encourage everybody to participate by:

- ⭐ the project on GitHub \([https://github.com/htmlburger/wpemerge-theme](https://github.com/htmlburger/wpemerge-theme)\)
- Posting bug reports \([https://github.com/htmlburger/wpemerge-theme/issues](https://github.com/htmlburger/wpemerge-theme/issues)\)
- (Emailing security issues to [hi@atanas.dev](mailto:hi@atanas.dev) instead)
- Posting feature suggestions \([https://github.com/htmlburger/wpemerge-theme/issues](https://github.com/htmlburger/wpemerge-theme/issues)\)
- Posting and/or answering questions \([https://github.com/htmlburger/wpemerge-theme/issues](https://github.com/htmlburger/wpemerge-theme/issues)\)
- Submitting pull requests \([https://github.com/htmlburger/wpemerge-theme/pulls](https://github.com/htmlburger/wpemerge-theme/pulls)\)
- Sharing your excitement about WP Emerge with your community

## Development setup

1. Fork this repository.
2. Open up your `wp-content/themes/` directory in your terminal of choice.
3. Clone your fork e.g. `git clone git@github.com:your-username/wpemerge-theme.git wpemerge`.
4. Run `cd wpemerge/`.
5. Edit the `composer.json` file and add a new `repositories` key:
    ```json
    "repositories": [
      {
        "type": "git",
        "url": "https://github.com/htmlburger/wpemerge.git"
      },
      {
        "type": "git",
        "url": "https://github.com/htmlburger/wpemerge-app-core.git"
      },
      {
        "type": "git",
        "url": "https://github.com/htmlburger/wpemerge-cli.git"
      }
    ],
    ```
    If you have forked any of the above repositories, feel free to replace the repository url where necessary.
6. Continue editing the `composer.json` file and replace the versions of `htmlburger/wpemerge*` packages like so:
    ```json
    "htmlburger/wpemerge": "~0.15.1",
    "htmlburger/wpemerge-app-core": "~0.15.1",
    "htmlburger/wpemerge-cli": "~0.15.1",
    ```
    should be edited to
    ```json
    "htmlburger/wpemerge": "dev-master as 0.15.1",
    "htmlburger/wpemerge-app-core": "dev-master as 0.15.1",
    "htmlburger/wpemerge-cli": "dev-master as 0.15.1",
    ```
    Do this for both `require` and `require-dev` packages.
6. Run `composer install && composer run post-create-project-cmd`.
7. Answer no to any questions asked during installation.
8. Ignore any `TTY mode is not supported on Windows platform.` errors.
9. Make changes to `config.json` if necessary.
10. Activate the WP Emerge theme from your WordPress admin panel.

## Pull Requests

- Pull request branches MUST follow this format: `{issue-number}-{short-description}`.
  Example: `12345-fix-mobile-styles`
- Pull requests MUST target the `master` branch
- Pull requests MUST follow the current code style
