FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# FIX MPM
RUN a2dismod mpm_event || true
RUN a2dismod mpm_worker || true
RUN a2dismod mpm_prefork || true
RUN a2enmod mpm_prefork
RUN a2enmod rewrite

RUN printf '<Directory /var/www/html>\n\tAllowOverride All\n</Directory>\n' \
    >> /etc/apache2/apache2.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 🔥 INI YANG DIUBAH
COPY farm/ /var/www/html/

WORKDIR /var/www/html

# FIX folder CI3
RUN mkdir -p application/cache application/logs \
    && chmod -R 777 application/cache application/logs

EXPOSE 80