FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# FIX MPM: hapus semua symlink mpm_* secara langsung, lalu aktifkan hanya prefork
RUN find /etc/apache2/mods-enabled/ -name 'mpm_*' -delete \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

RUN printf '<Directory /var/www/html>\n\tAllowOverride All\n</Directory>\n' \
    >> /etc/apache2/apache2.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY . /var/www/html/

WORKDIR /var/www/html

RUN mkdir -p application/cache application/logs \
    && chmod -R 777 application/cache application/logs

EXPOSE 80