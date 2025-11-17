# syntax=docker/dockerfile:1
FROM php:8.3-fpm-alpine

# Dependências do sistema
RUN apk add --no-cache \
    git \
    curl \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    bash \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev

# Extensões necessárias para Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    intl \
    zip \
    gd \
    bcmath

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php-fpm"]
