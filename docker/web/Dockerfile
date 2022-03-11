FROM php:7.4-apache


ARG TZ=Asia/Bishkek
ARG ARG_APACHE_DOCUMENT_ROOT=/var/www/html/

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
COPY --chown=www-data:www-data . $APACHE_DOCUMENT_ROOT

RUN echo "BEGIN MYSQLI INSTALL" \
# docker-php-ext-install mysqli && docker-php-ext-enable \ mysqli && apt-get update && apt-get upgrade -y \
    && echo "MYSQLI INSTALLED" \

#RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

RUN echo "BEGIN COMPOSER INSTALL" \
 && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && echo "COMPOSER INSTALLED"

WORKDIR /var/www/html
