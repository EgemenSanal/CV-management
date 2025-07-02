FROM php:8.2-fpm

# Sistemi güncelle, gerekli paketleri kur
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
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Composer kopyala
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizini ayarla
WORKDIR /var/www

# Proje dosyalarını kopyala
COPY . .

# Laravel işlemleri
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

# Uygulama portunu aç
EXPOSE 8000

# Laravel sunucusunu başlat
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
