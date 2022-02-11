Изменить файл .env.dev и сохранить как .env

Выполнить две команды в корне проекта 

<pre>
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd)":/opt \
-w /opt \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs

docker-compose up --build

</pre>

Для удобной работы добавляем алиас

<pre>
alias sail="./vendor/bin/sail"
</pre>