# Theme

The `Theme` class (it's actually a facade) provides a couple tools to help out with common tasks.

## Theme::partial( $partial, $child = '', $context = [] )

Include a partial view file in a very similar fashion to how `get_template_part()` works, but with a couple of differences:

1. Automatically look for the partial in the `theme/partials/` directory as well.
1. Variables can be passed by utilizing the `$context` parameter.
1. Internally uses WP Emerge's `app_partial()` to enable support for View Composers.

## Theme::uri()

Return the public URI of the theme root directory.
This is useful since `get_template_directory_uri()` will return the URI to the nested `theme/` directory, instead of the root since this is where the theme's `style.css` file is.
