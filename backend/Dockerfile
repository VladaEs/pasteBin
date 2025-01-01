FROM php:8.2-fpm

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y libonig-dev
RUN docker-php-ext-install pdo mbstring pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app/backend
#COPY composer.json composer.json
#RUN composer install
COPY . .
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000