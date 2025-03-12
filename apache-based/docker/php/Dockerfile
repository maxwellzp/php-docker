FROM php:8.3.17-apache

COPY ./application/public /var/www/html/public
COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt update \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

RUN apt-get update \
    && docker-php-ext-install opcache

RUN pecl install redis-6.1.0 && docker-php-ext-enable redis

RUN a2enmod rewrite negotiation