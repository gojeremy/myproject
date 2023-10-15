FROM php:8.2-fpm-alpine

WORKDIR /var/www/laravel

# Устанавливаем пакет autoconf
RUN apk --no-cache add autoconf g++ make && \
    docker-php-ext-install pdo pdo_mysql && \
    pecl install redis && \
    docker-php-ext-enable redis

# Очищаем временные зависимости
RUN apk del autoconf g++ make

CMD ["php-fpm"]
