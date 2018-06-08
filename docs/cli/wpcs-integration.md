# WPCS Integration

The theme comes with a composer script to install WPCS so you can more easily comform to WordPress' code style.

_Note: WP Emerge and WP Emerge Theme intentionally do not completely conform to that standard due to personal preference._

{% method -%}
#### Installing WPCS

To install WPCS execute `composer install-wpcs` in the theme root directory - this will create a new `wpcs/` directory with all necessary files.



{% sample lang="php" -%}
```cli
composer install-wpcs
```
{% endmethod %}

{% method -%}
#### Running WPCS

To run the WPCS checker, execute `./wpcs/vendor/bin/phpcs DIRECTORY_TO_CHECK` in the theme root directory.

{% sample lang="php" -%}
```cli
./wpcs/vendor/bin/phpcs app/
```
{% endmethod %}
