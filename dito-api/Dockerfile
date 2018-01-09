FROM php:7.1-apache

LABEL maintainer pedro.paiva@dito.com.br

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
        libssl-dev \
    && pecl install mongodb \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/ext-mongodb.ini \
    && echo "upload_max_filesize = 5M" > /usr/local/etc/php/conf.d/upload.ini \
    && docker-php-ext-install iconv mcrypt mbstring exif zip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

RUN a2enmod rewrite

# installs memcached and enables it in apache
RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-3.0.3 \
    && docker-php-ext-enable memcached

EXPOSE 80

RUN mkdir /var/www/html/dito-api

COPY src /var/www/html/dito-api

COPY src/.env /var/www/html/dito-api/.env

COPY config/dito-api.conf /etc/apache2/sites-available/dito-api.conf

RUN chgrp -R www-data /var/www/html/dito-api
RUN chmod -R 775 /var/www/html/dito-api/storage

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /var/www/html/dito-api

RUN composer install
