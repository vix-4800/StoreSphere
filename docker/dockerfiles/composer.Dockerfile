FROM composer as composer

WORKDIR /var/www/html

ENTRYPOINT [ "composer" ]
