# =====================================================
# Dockerfile - CodeIgniter 3 (PHP 8.1 + Apache)
# =====================================================

FROM php:8.1-apache

# Install PHP extensions yang dibutuhkan CI3
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Aktifkan mod_rewrite untuk .htaccess CI3
RUN a2enmod rewrite

# Set Apache AllowOverride agar .htaccess terbaca
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy seluruh isi folder farm/ (CI3 app) ke web root
COPY farm/ /var/www/html/

# Pastikan folder writable untuk logs dan cache CI3
RUN mkdir -p /var/www/html/application/logs \
    && mkdir -p /var/www/html/application/cache \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/application/logs \
    && chmod -R 777 /var/www/html/application/cache

# Install Composer dan dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && composer install --no-dev --optimize-autoloader 2>/dev/null || true

# Railway inject PORT via env var — Apache listen di PORT tsb
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

# Expose port 80 (Railway akan map otomatis)
EXPOSE 80

CMD ["apache2-foreground"]
