# =====================================================
# Dockerfile - CodeIgniter 3 (PHP 8.1 + Apache)
# =====================================================

FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions yang dibutuhkan CI3
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# Aktifkan mod_rewrite untuk .htaccess CI3
RUN a2enmod rewrite

# Set Apache AllowOverride agar .htaccess terbaca
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

# ⚠️ PENTING: COPY farm/ bukan COPY .
# Repo ini punya subfolder farm/ yang isinya CI3 app.
# Kalau pakai COPY . maka index.php tidak langsung di /var/www/html/
COPY farm/ /var/www/html/

WORKDIR /var/www/html

# Pastikan folder writable untuk logs dan cache CI3
RUN mkdir -p application/logs application/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 application/logs application/cache

# Install Composer dan jalankan dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader 2>/dev/null || true

# Expose port 80 (Railway akan map otomatis)
EXPOSE 80

CMD ["apache2-foreground"]
