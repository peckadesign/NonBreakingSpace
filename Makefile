.PHONY: cs
.PHONY: run-tests
.PHONY: clean


clean:
	git clean -xdf .


run-tests:
	git clean -xdf tests/
	composer install --prefer-dist
	- vendor/bin/tester -p php -o tap tests/ > output.tap
	git clean -xdf tests/


cs:
	git clean -xdf output.cs output-strict.cs
	composer install --no-interaction
	- vendor/bin/phpcs src/ --standard=vendor/pd/coding-standard/src/PeckaCodingStandard/ruleset.xml --report-file=output.cs
	- vendor/bin/phpcs src/ --standard=vendor/pd/coding-standard/src/PeckaCodingStandardStrict/ruleset.xml --report-file=output-strict.cs
	- test -f output-strict.cs && cat output-strict.cs >> output.cs && rm output-strict.cs
