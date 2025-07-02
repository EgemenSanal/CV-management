# Laravel için uygun PHP image
FROM php:8.2-fpm

# Gerekli sistem paketlerini kur
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Composer'ı indir
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Proje dosyalarını konteynıra kopyala
WORKDIR /var/www

COPY . .

# Laravel izinler ve vendor yüklemesi
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan migrate --force \
    && php artisan storage:link

# Port ayarla
EXPOSE 8000

# Laravel’i PHP built-in server ile çalıştır
CMD php artisan serve --host=0.0.0.0 --port=8000
