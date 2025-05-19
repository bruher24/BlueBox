build:
	docker compose build
	docker compose up -d app
	docker compose exec app composer update
	docker compose down

run:
	docker compose up -d

fill:
	docker compose exec php artisan db:seed

stop:
	docker compose down
