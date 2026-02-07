FROM php:8.3-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql zip

# Instalar Redis extension
RUN pecl install redis && docker-php-ext-enable redis

WORKDIR /var/www/html
