Изменить файл .env.dev и сохранить как .env

Выполнить две команды в корне проекта docker run --rm
-u "$(id -u):$(id -g)"
-v "$(pwd)":/opt
-w /opt
laravelsail/php81-composer:latest
composer install --ignore-platform-reqs

docker-compose up --buid