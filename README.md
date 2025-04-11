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
3. Создать копию файла **.env.example** и назвать ее **.env**
4. При необходимости изменить порты и другие данные в конфигурационных файлах:
 - .env
 - docker-compose.yml
 - docker/nginx/conf.d/nginx.conf
5. Выполнить сборку и развертывание
```shell
docker compose up --build -d
```
6. По окончании сборки и развертывания зайти в контейнер с Laravel
```shell
docker compose exec -it app bash
```
Выполнить миграции
```shell
php artisan migrate
```
Заполнить таблицу с категориями
```shell
php artisan db:seed --class=CategorySeeder
```
7. После этого можно заходить на http://localhost:3000, проект готов к использованию.

## Переменные по умолчанию
### nginx
ports: "3000:80"
### postgres
ports: "5433:5432"
DB: mydatabase
USER: laravel
PWD: secret
### adminer
ports: "8080:8080"
