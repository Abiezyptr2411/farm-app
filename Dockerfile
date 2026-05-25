# =====================================================
# Dockerfile - CodeIgniter 3 (PHP 8.1 + Apache)
# VERSI MINIMAL - untuk Railway deployment
# =====================================================

FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# Fix: disable mpm_event, aktifkan mpm_prefork (wajib untuk mod_php)
# Tanpa ini → "More than one MPM loaded" error
RUN a2dismod mpm_event && a2enmod mpm_prefork rewrite

# AllowOverride All agar .htaccess CI3 terbaca
RUN printf '<Directory /var/www/html>\n\tAllowOverride All\n</Directory>\n' \
    >> /etc/apache2/apache2.conf \
    && echo 'ServerName localhost' >> /etc/apache2/apache2.conf

# Copy CI3 app ke web root
# (farm/ = subfolder berisi index.php, application/, system/)
COPY farm/ /var/www/html/

WORKDIR /var/www/html

# Set permissions
RUN mkdir -p application/logs application/cache \
    && chmod -R 777 application/logs application/cache \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
