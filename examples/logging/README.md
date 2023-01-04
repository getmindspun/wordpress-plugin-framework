# Logging

Logging is an example plugin to demonstrate the framework usage.
It logs external API calls via the `http_api_debug` hook and writes the results to the
`wordpress\wp-content\plugin\logging\logs` directory via [Monolog](https://github.com/Seldaek/monolog).

This plugin has 100% test coverage of all file in the `includes` directory - i.e. the application code.
Only unit tests are provided, so setting up the entire WP PHPUnit test harness is not required.
For a `real` plugin, we'd have a `functional` directory underneath `tests' that would load WordPress and `logging.php`
via the bootstrap file.

## Development
There are Makefile commands for every action needed.

### Setup

Run the setup target once:
```shell
make setup
```

### Build
Create the plugin bundle:
```shell
make bundle
```