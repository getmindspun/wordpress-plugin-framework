all: lint coverage
.PHONY: all

bundle: all
	zip -r build/logging.zip *.php includes/ vendor_prefixed/
.PHONY: bundle

lint:
	php vendor/bin/phpcbf || [ $$? -eq 1 ]
	php vendor/bin/phpcs
.PHONY: lint

test:
	phpunit --no-coverage --stderr --testdox
.PHONY: test

coverage:
	phpunit --coverage-text
.PHONY: coverage

clean:
	rm -rf vendor vendor_prefixed
.PHONY: clean

composer-update:
	composer update
	./vendor/bin/phpcs --config-set installed_paths vendor/phpcompatibility/php-compatibility,vendor/phpcompatibility/phpcompatibility-wp,vendor/wp-coding-standards/wpcs
.PHONY: require

setup: clean composer-update
.PHONY: setup