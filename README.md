# WordPress Plugin Framework (wpfw)

The WordPress plugin framework utilizes the registry and facade design patterns to create profession-grade plugins that:
* Have a clean, easy to understand, OOP implementation.
* Have 100% unit test coverage.

See the `examples` directory for a batteries-included example.

## Installation
The code is simple enough - and licensed appropriately - to be copied into your product directly, however, the best 
approach is to use Composer and [Strauss](https://github.com/BrianHenryIE/strauss).

See the `examples` directory for complete plugin that uses this method.

### Autoloading
This package also contains a simple autoloader class that support both WordPress and PSR-4 style classes.
Use it to autoload your application code.

```
require_once( __DIR__ . '/vendor-prefixed/autoload.php' );
Autoloader::autoload( 'Examples\Logging', __DIR__ . '/includes' );
```
The first line pulls in the Strauss autoloader, which loads the framework - including
our autoloader class.  The second line loads our plugin code.

The autoload method registers a namespace and associates the directory containing the files.
```
autoload( string $namespace, string $dir, string $type = 'psr4' )
```
The `$type` parameter also accepts 'wordpress' or 'wp' in which case the WordPress file namings
scheme is used - i.e. with 'class-' filenames etc.

## Usage
The facade/provider combo acts as a mini-library inside your plugin.
The facade is the sole way the rest of the application acts with the functionality the provider provides.

In the plugin file, you'd call:
```shell
MyComponentProvider::provide();
```
then in the rest of the application, use the facade:
```shell
MyComponent::my_method();
```

## Globals Facade/Provider
The framework contains one 'built-in' facade/provider combo: 'Globals', since every 
plugin is going to need it.

In your plugin, replace any call to a global function - either PHP native, or WordPress defined - with this facade.
For example, `die()` becomes `Globals::die()`, `wp_redirect(...)` becomes `Globals::wp_redirect(...)`
etc.

Generally, you'd create a 'Globals' class in your own namespace that 
extends `Mindspun\Framework\Facades\Globals` and then has an empty body.
The purpose of this class is to add PHP doc `@method` comments with the globals you use
to assist your editor.  See the 'Globals' class in the 'examples' directory for an example.

## Motivation
There are at least six other GitHub projects with the name 'wordpress-plugin-framework', so why one more?

* It's just plain difficult to get 100% code coverage for a plugin of any complexity, and we consider that a minimum
requirement for release.  This approach fixes that.
* Just look at any of the older plugins on [wordpress.org/plugins/,](https://wordpress.org/plugins/)
and you'll see that it's really difficult to prevent a plugin from turning into spaghetti code as it grows. This approach prevents that (mostly, care must still be taken).

## Development

### Setup

```shell
composer update
./vendor/bin/phpcs --config-set installed_paths vendor/phpcompatibility/php-compatibility,vendor/phpcompatibility/phpcompatibility-wp,vendor/wp-coding-standards/wpcs
```