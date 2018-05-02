# Sprite Mixins

Adding images inside the `resources/images/sprite/` directory will prepare them for sprite usage. To use a sprite image in your styles you can employ one of the automatically generated SASS mixins in `resources/styles/_sprite.scss`.
In addition, a variable will be defined for every sprite image which you will use as a reference in mixins (e.g. `birds.jpg` becomes `$birds`).

__Note: `resources/styles/_sprite.scss` is an automatically generated file - never change it manually.__

## Examples
1. Add a sprite image as a background:
    ```scss
    .foo {
        @include sprite-image($birds);
    }
    ```

1. Add a sprite image as a background and set the element's width and height to the exact dimensions of the image:
    ```scss
    .foo {
        @include sprite($birds);
    }
    ```

1. Set an element's height to be equal to a sprite image's height:
    ```scss
    .foo {
        @include sprite-height($birds);
    }
    ```

Refer to the generated comments inside `resources/styles/_sprite.scss` for more information and examples.

## Retina Support

To enable retina support for sprites follow these steps:

1. Edit `resources/build/webpack.js` and uncomment the following line:
    ```js
    // retina: '@2x',
    ```
1. Restart the dev process if you have it running.
1. For every image you have in `resources/images/sprite/`, create a retina copy with `@2x` added as a suffix to the filename (e.g. `foo.jpg` should have a `foo@2x.jpg` retina version).
1. Replace mixin usage with the appropriate retina counterpart and add a `-group` suffix to your sprite variable (e.g. `@include sprite($birds);` becomes `@include retina-sprite($birds-group);`)

That's it! Completing the above steps ensures the build process will add relevant media queries to replace the sprite image references with the retina version for suitable devices.

If you wish to read more on how sprites work and how to use them check out the following:
- https://github.com/Ensighten/spritesmith
- https://github.com/twolfson/spritesheet-templates
- https://github.com/mixtur/webpack-spritesmith