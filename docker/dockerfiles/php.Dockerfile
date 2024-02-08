FROM php:8.2.16RC1-fpm as php

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql
