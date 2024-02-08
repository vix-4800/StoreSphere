build:
	cp .env.example .env
	sed -i 's/DB_DATABASE=.*/DB_DATABASE=storesphere/g' .env
	sed -i 's/DB_USERNAME=.*/DB_USERNAME=storesphere_user/g' .env
	sed -i 's/DB_PASSWORD=.*/DB_PASSWORD="12345qwerty"/g' .env

	docker-compose run --rm composer install --no-progress --no-interaction

	docker-compose run --rm artisan key:generate
	docker-compose run --rm artisan migrate
	docker-compose run --rm artisan db:seed

	docker-compose run --rm node install
    docker-compose run --rm node run dev

run:
	docker-compose up webserver -d

stop:
	docker-compose down
