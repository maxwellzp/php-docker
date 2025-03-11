FROM php:8.3.17-fpm

RUN apt update \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

RUN apt get update \
    && docker-php-ext-install opcache \

