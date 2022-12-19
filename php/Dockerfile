FROM php:7.4-fpm-alpine3.16
RUN set -ex \
&& apk --no-cache add postgresql-dev \
&& apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
&& pecl install xdebug-3.0.0 \
&& docker-php-ext-install pdo pdo_pgsql pgsql \
&& docker-php-ext-enable xdebug \
&& apk del -f .build-deps

# Настройка Xdebug
RUN echo "xdebug.start_with_request=trigger" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9009" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html