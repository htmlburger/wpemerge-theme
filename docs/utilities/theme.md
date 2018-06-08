# Theme

This class (it's actually a facade) provides a couple tools to help out with common tasks.

## Theme::partial( $partial, $child = '', $context = [] )

Include a partial view file in a very similar fashion to how `get_template_part()` works, but with a couple of differences:

1. Automatically look for the partial in the `theme/partials/` directory as well.
1. Variables can be passed by utilizing the `$context` parameter.
1. Internally uses WP Emerge's `app_partial()` to enable support for View Composers.

## Theme::uri()

Return the public URI of the theme root directory.
This method is an alias of `Theme\Assets::getThemeUri()`.