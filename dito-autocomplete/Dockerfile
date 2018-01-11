FROM php:7.1-apache

LABEL maintainer pedro.paiva@dito.com.br

EXPOSE 80

RUN mkdir /var/www/html/dito-autocomplete

COPY src /var/www/html/dito-autocomplete

RUN chgrp -R www-data /var/www/html/dito-autocomplete

WORKDIR /var/www/html/dito-autocomplete
