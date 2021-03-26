composer:
	composer validate
	composer update --no-interaction --prefer-dist

cs:
	vendor/bin/phpcs src/ --standard=vendor/pd/coding-standard/src/PeckaCodingStandard/ruleset.xml
	vendor/bin/phpcs src/ --standard=vendor/pd/coding-standard/src/PeckaCodingStandardStrict/ruleset.xml

run-tests:
	vendor/bin/tester -s -C tests/
