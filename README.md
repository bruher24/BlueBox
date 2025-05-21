# BlueBox
## Описание
Веб-приложение с использованием фреймворка Laravel (https://laravel.com/docs/9.x), которое позволяет управлять товарами и заказами.

## Установка
Клонировать репозиторий с ветки dev либо скачать архивом и распаковать в удобное место.

## Запуск
1. Запустить движок Docker (в терминале либо Docker Desktop) https://docs.docker.com/manuals/ \
Также необходим docker compose https://docs.docker.com/compose/
2. Перейти в директорию с проектом
```shell
cd BlueBox
```
3. Создать копию файла с переменными окружения **.env.example** и назвать ее **.env**
```shell
cp .env.example .env
```
4. При необходимости изменить порты и другие данные в конфигурационных файлах:
 - .env
 - docker-compose.yml
 - docker/nginx/conf.d/nginx.conf
  
> [!TIP]
> Для удобства использования в проекте присутствует Makefile, с помощью которого можно упростить сборку и развертывание.
<details open>
    <summary><h3>Используя <b>Makefile</b>:</h3></summary>

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
</details>

> [!TIP]
> Все команды, выполняемые далее в терминале контейнера, можно выполнить извне, например:
> ```shell
> docker compose exec app composer update
> ```
<details>
    <summary><h3>Без использования Makefile:</h3></summary>

5. Выполнить сборку и развертывание
```shell
docker compose up --build -d
```
6. Открыть терминал контейнера
```shell
docker compose exec -it app bash
```
7. Установить зависимости
```shell
composer update
```
8. Создать ключ приложения
```shell
php artisan key:generate
```
9. Выполнить миграции
```shell
php artisan migrate
```
10. Заполнить таблицы начальными данными
```shell
php artisan db:seed
```
</details>
  
После этого можно заходить на http://localhost:3000, проект готов к использованию. \
Adminer для управления и просмотра базы данных доступен по адресу http://localhost:8080.

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
