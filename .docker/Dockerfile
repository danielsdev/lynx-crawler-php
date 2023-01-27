FROM php:8.2.0-cli

RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip zlib1g-dev libzip-dev

RUN docker-php-ext-install zip

COPY --from=composer:2.5.1 /usr/bin/composer /usr/bin/composer

WORKDIR /code

CMD ["tail", "-f", "/var/log/php_errors.log"]
