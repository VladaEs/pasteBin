FROM php:8.2-fpm


RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git \
    libonig-dev \
    && docker-php-ext-install pdo mbstring pdo_mysql


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app/backend

COPY composer.json composer.lock /app/backend/


RUN composer install --no-autoloader --no-scripts
RUN npm run dev

COPY . .


RUN composer dump-autoload


EXPOSE 8000


CMD php artisan serve --host=127.0.0.1 --port=8000
