FROM php:fpm-alpine

CMD ["php-fpm"]

RUN docker-php-ext-install pdo pdo_mysql opcache && docker-php-ext-enable pdo pdo_mysql

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

EXPOSE 9000