FROM php:8.1-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip

# PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# DISABLE ALL MPM FIRST (INI FIX UTAMA)
RUN a2dismod mpm_event || true
RUN a2dismod mpm_worker || true
RUN a2dismod mpm_prefork || true

# ENABLE ONLY PREFORK
RUN a2enmod mpm_prefork
RUN a2enmod rewrite

# Apache config
RUN printf '<Directory /var/www/html>\n\tAllowOverride All\n</Directory>\n' \
    >> /etc/apache2/apache2.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy project
COPY . /var/www/html/

WORKDIR /var/www/html

# Permission CI3
RUN chmod -R 777 application/cache application/logs

EXPOSE 80