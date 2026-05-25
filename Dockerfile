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

# Fix "More than one MPM loaded" - hapus SEMUA mpm symlinks, buat ulang hanya prefork
RUN rm -f /etc/apache2/mods-enabled/mpm_*.conf \
    && rm -f /etc/apache2/mods-enabled/mpm_*.load \
    && ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf \
    && ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load \
    && a2enmod rewrite

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
