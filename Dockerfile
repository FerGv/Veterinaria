FROM php:7-apache

RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY ./ /var/www/html/
