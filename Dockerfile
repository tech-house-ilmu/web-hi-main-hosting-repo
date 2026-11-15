# Stage 1: Build frontend assets
FROM node:20-alpine AS node_builder
WORKDIR /app
COPY package*.json vite.config.js ./
RUN npm install
COPY resources ./resources
COPY public ./public
RUN npm run build

# Stage 2: Production PHP + MariaDB + Nginx + Supervisor
FROM php:8.2-fpm-bookworm

ENV DEBIAN_FRONTEND=noninteractive
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install system dependencies, MariaDB, Nginx, and Supervisor
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx \
    mariadb-server \
    mariadb-client \
    supervisor \
    curl \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        intl \
        zip \
        opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Copy built frontend assets from node_builder
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Copy .env.example to .env temporarily for composer post-autoload scripts if .env does not exist
RUN if [ ! -f .env ]; then cp .env.example .env; fi \
    && composer install --no-dev --optimize-autoloader --no-interaction

# Set up permissions
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache /var/run/mysqld /var/log/supervisor /var/log/nginx \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R mysql:mysql /var/run/mysqld /var/lib/mysql \
    && chmod 777 /var/run/mysqld

# Copy Nginx configuration
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy Supervisor configuration
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy Entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80 3000

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
