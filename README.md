# mpfit_task
## Описание
Веб-приложение с использованием фреймворка Laravel (https://laravel.com/docs/9.x), которое включает управление товарами и заказами.

## Установка
Клонировать репозиторий с ветки dev либо скачать архивом и распаковать в удобное место.

## Запуск
1. Запустить движок Docker (в терминале либо Docker Desktop) https://docs.docker.com/manuals/ \
Также необходим docker compose https://docs.docker.com/compose/
2. Запустить терминал, перейти в директорию с проектом
```shell
cd mpfit_task
```
3. При необходимости изменить порты в конфигах:
 - .env
 - docker-compose.yml
 - docker/nginx/conf.d/nginx.conf
4. Выполнить
```shell
docker compose up --build -d
```
5. По окончании сборки и развертывания зайти в контейнер с laravel
```shell
docker compose exec -it app bash
```
И выполнить миграции
```shell
php artisan migrate
```
6. После этого можно заходить на http://localhost, проект готов к использованию.
