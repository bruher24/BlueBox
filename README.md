# BlueBox
## Описание
Веб-приложение с использованием фреймворка Laravel (https://laravel.com/docs/9.x), которое включает управление товарами и заказами.

## Установка
Клонировать репозиторий с ветки dev либо скачать архивом и распаковать в удобное место.

## Запуск
1. Запустить движок Docker (в терминале либо Docker Desktop) https://docs.docker.com/manuals/ \
Также необходим docker compose https://docs.docker.com/compose/
2. Запустить терминал, перейти в директорию с проектом
```shell
cd BlueBox
```
3. Создать копию файла **.env.example** и назвать ее **.env**
```shell
cp .env.example .env
```
4. При необходимости изменить порты и другие данные в конфигурационных файлах:
 - .env
 - docker-compose.yml
 - docker/nginx/conf.d/nginx.conf
  
Используя **Makefile**:
5. Выполнить сборку и установку зависимостей
```shell
make build
```
6. Развернуть проект
```shell
make run
```
7. Заполнить таблицы
```shell
make fill
```
  
Без использования **Makefile**:
5. Выполнить сборку
```shell
docker compose build
```
6. Развернуть проект
```shell
docker compose up -d 
```
7. Открыть терминал контейнера
```shell
docker compose exec -it app bash
``` 
>Этот шаг **опционален**, т.к. все команды можно выполнить извне контейнера, например:
>```shell
>docker compose exec app composer update
>```
8.Установить зависимости
```shell
composer update
```
8. Выполнить миграции
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
- **ports**: "3000:80"
### postgres
- **ports**: "5433:5432"
- **DB**: mydatabase
- **USER**: laravel
- **PWD**: secret
### adminer
- **ports**: "8080:8080"
