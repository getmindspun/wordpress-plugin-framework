VENDOR_PREFIX ?= examples\\logging\\vendor
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

php-scoper:
	./vendor/bin/php-scoper add-prefix --prefix=$(VENDOR_PREFIX) --output-dir=./vendor_prefixed/mindspun/framework --config=config/php-scoper/framework.inc.php --force --quiet
	./vendor/bin/php-scoper add-prefix --prefix=$(VENDOR_PREFIX) --output-dir=./vendor_prefixed/Monolog --config=config/php-scoper/monolog.inc.php --force --quiet
	./vendor/bin/php-scoper add-prefix --prefix=$(VENDOR_PREFIX) --output-dir=./vendor_prefixed/Psr/Log --config=config/php-scoper/psr.inc.php --force --quiet
.PHONY: php-scoper

clean:
	rm -rf vendor vendor_prefixed
.PHONY: clean

composer-update:
	composer update
	./vendor/bin/phpcs --config-set installed_paths vendor/phpcompatibility/php-compatibility,vendor/phpcompatibility/phpcompatibility-wp,vendor/wp-coding-standards/wpcs
.PHONY: require

setup: clean composer-update php-scoper
.PHONY: setup