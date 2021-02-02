FROM php:7.3.1-fpm-stretch

RUN apt-get update && apt-get install -y git zip unzip

RUN docker-php-ext-install mbstring bcmath

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html/git-stared-repo
