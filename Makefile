test:
	docker-compose run --rm test

install:
	docker-compose run --rm test composer install

update:
	docker-compose run --rm test composer update
