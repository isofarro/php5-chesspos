
install: vendor/autoload.php var/log etc/www/board

vendor/autoload.php:
	composer install

etc/www/board:
	mkdir -p etc/www/board
	chmod 777 etc/www/board

var/log:
	mkdir -p var/log

