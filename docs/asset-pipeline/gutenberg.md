# Gutenberg

Gutenberg support is included - here's how to customize it:

{% method -%}
#### Color palette

{% sample lang="php" -%}
`app/setup/theme-support.php`
```php
add_theme_support( 'editor-color-palette', [
	[
		'name'  => __( 'Red', 'app' ),
		'slug'  => 'material-red',
		'color' => '#f44336',
	],
	[
		'name'  => __( 'Pink', 'app' ),
		'slug'  => 'material-pink',
		'color' => '#e91e63',
	],
	[
		'name'  => __( 'Purple', 'app' ),
		'slug'  => 'material-purple',
		'color' => '#9c27b0',
	],
	// ...
] );
```
`resources/styles/shared/_variables.scss`
```scss
$material-red: #f44336;
$material-pink: #e91e63;
$material-purple: #9c27b0;
// ...
```
{% endmethod %}

{% method -%}
#### Font sizes

{% sample lang="php" -%}
`app/setup/theme-support.php`
```php
add_theme_support( 'editor-font-sizes', [
	[
		'name' => __( 'extra small', 'app' ),
		'shortName' => __( 'XS', 'app' ),
		'size' => 12,
		'slug' => 'extra-small'
	],
	[
		'name' => __( 'small', 'app' ),
		'shortName' => __( 'S', 'app' ),
		'size' => 16,
		'slug' => 'small'
	],
	[
		'name' => __( 'regular', 'app' ),
		'shortName' => __( 'M', 'app' ),
		'size' => 20,
		'slug' => 'regular'
	],
	// ...
] );
```
`resources/styles/shared/_variables.scss`
```scss
$font-size-extra-small: 12px;
$font-size-small: 16px;
$font-size-regular: 20px;
// ...
```
{% endmethod %}
