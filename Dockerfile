FROM php:8.3-fpm

# Встановлюємо розширення pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql
