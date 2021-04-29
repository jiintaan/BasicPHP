FROM php:cli-alpine

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
    && docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql \
    && pecl install xdebug-2.9.0 \
    && docker-php-ext-enable xdebug \
    && apk del pcre-dev ${PHPIZE_DEPS}