FROM php:8.3.17-fpm

RUN apt-get update \
    && docker-php-ext-install opcache

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN pecl install redis-6.1.0 && docker-php-ext-enable redis
