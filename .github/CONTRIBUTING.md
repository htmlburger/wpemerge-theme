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
1. Open up your `wp-content/themes/` directory in your terminal of choice.
1. Clone your fork e.g. `git clone git@github.com:your-username/wpemerge-theme.git wpemerge`.
1. Run `cd wpemerge/ && composer install && composer run post-create-project-cmd`.
1. Answer no to any questions asked during installation.
1. Ignore any `TTY mode is not supported on Windows platform.` errors.
1. Make changes to `config.json` if necessary.
1. Activate the WP Emerge theme from your WordPress admin panel.

## Pull Requests

- Pull request branches MUST follow this format: `{issue-number}-{short-description}`.
  Example: `12345-fix-mobile-styles`
- Pull requests MUST target the `master` branch
- Pull requests MUST follow the current code style
