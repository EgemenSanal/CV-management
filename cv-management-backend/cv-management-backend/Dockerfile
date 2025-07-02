FROM php:8.2-fpm

# Paket kaynaklarını temizle + güncelle
RUN apt-get clean && apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring zip exif pcntl gd

# Composer'ı ekle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizini
WORKDIR /var/www

# Dosyaları kopyala
COPY . .

# Laravel bağımlılıkları
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

# Portu expose et
EXPOSE 8000

# Laravel'i başlat
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
