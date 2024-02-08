FROM node:21.6.1 as node

WORKDIR /var/www/html

ENTRYPOINT [ "npm" ]
