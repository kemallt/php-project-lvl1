install:
	composer install
brain-games:
	php bin/brain-games.php
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	php bin/brain-even.php
brain-calc:
	php bin/brain-calc.php
brain-gcd:
	php bin/brain-gcd.php