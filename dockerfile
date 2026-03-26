FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY . .

RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]