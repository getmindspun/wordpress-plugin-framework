all: lint coverage
.PHONY: all

lint:
	php vendor/bin/phpcbf || [ $$? -eq 1 ]
	php vendor/bin/phpcs
.PHONY: lint

test:
	./vendor/bin/phpunit --no-coverage --stderr --testdox
.PHONY: test

coverage:
	./vendor/bin/phpunit --coverage-text
.PHONY: coverage
