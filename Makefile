build:
	docker compose build
	docker compose up -d app
	docker compose exec app composer update
	docker compose down

run:
	docker compose up -d

fill:
	docker compose exec app php artisan migrate
	docker compose exec app php artisan db:seed

bash:
	docker compose exec -it app bash

stop:
	docker compose down
