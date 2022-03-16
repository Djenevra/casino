FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

ARG TZ=Asia/Bishkek
ARG DOCUMENT_ROOT=/var/www/html/
ADD docker/web/php.ini /usr/local/etc/php

#COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update -yqq --allow-releaseinfo-change \
    && apt-get install -y --no-install-recommends \
        advancecomp \
        ffmpeg \
        gifsicle \
        imagemagick \
        jpegoptim \
        libimage-exiftool-perl \
        libjpeg-progs \
        libpng-dev \
        openssl \
        optipng \
        pngcrush \
        pngnq \
        pngquant \
        tar \
        unzip \
    && sed -i 's,^\(MinProtocol[ ]*=\).*,\1'TLSv1.0',g' /etc/ssl/openssl.cnf \
    && sed -i 's,^\(CipherString[ ]*=\).*,\1'DEFAULT@SECLEVEL=1',g' /etc/ssl/openssl.cnf\
    && rm -rf /var/lib/apt/lists/*

#COPY docker/web/bin/ /usr/local/bin/
#ADD docker/web/php.ini /usr/local/etc/php
COPY --chown=www-data:www-data . $DOCUMENT_ROOT

RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN apt-get update && apt-get upgrade -y

#RUN echo "BEGIN COMPOSER INSTALL" \
# && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
# && composer install \
#    && echo "COMPOSER INSTALLED"

WORKDIR /var/www/html
