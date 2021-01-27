######################################################################
##                                                                  ##
## Dockerfile                        (c) Wolfram Plettscher 11/2020 ##
## hello                                                            ##
##                                                                  ##
######################################################################

FROM php:7.4-apache

LABEL maintainer="Wolfram Plettscher (woppl at webdotde)"

# change DOCUMENT_ROOT
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# enable Apache Modules
RUN a2enmod env
RUN a2enmod alias
# rewrite needed to eliminate index.php from URL
RUN a2enmod rewrite
RUN service apache2 restart

###< symfony/framework-bundle ###
RUN apt-get update \
    && apt-get install -y \
        zlib1g-dev \
        git-core \
        libicu-dev \
    && docker-php-ext-install -j$(nproc) pdo_mysql \ 
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

ADD --chown=www-data bin bin
ADD --chown=www-data config config
ADD --chown=www-data vendor vendor
ADD --chown=www-data templates templates
ADD --chown=www-data src src
ADD --chown=www-data composer.json composer.json
#ADD --chown=www-data getParameter getParameter

### .env necessary, otherwise crash ... need to check
#ADD --chown=www-data .env.dist .env
ADD --chown=www-data .env .env

### build public directory (including index.php)
ADD --chown=www-data public public

RUN mkdir var
RUN chown www-data var
RUN chgrp www-data var

#ADD --chown=www-data composer composer
#ADD --chown=www-data composer.lock composer.lock

ENTRYPOINT \
  apache2-foreground
