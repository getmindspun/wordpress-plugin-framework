all: lint coverage
.PHONY: all

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
