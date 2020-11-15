######################################################################
##                                                                  ##
## Dockerfile                        (c) Wolfram Plettscher 11/2020 ##
## hello                                                            ##
##                                                                  ##
######################################################################

# alternative Dockerfile with multiple containers and nginx
# maybe we switch to this concept at a later time
# documented here: https://knplabs.com/fr/blog/how-to-dockerise-a-symfony-e-project

FROM composer:2.0 as composer
FROM php:7.4-fpm

LABEL maintainer="Wolfram Plettscher (woppl at webdotde)"

RUN docker-php-ext-install
# RUN docker-php-ext-install pdo_myasq
RUN pecl install apcu

RUN apt-get update && \
    apt-get install -y \
    libzip-dev

RUN docker-php-ext-install zip
RUN docker-php-ext-enable apcu

WORKDIR /usr/src/app
COPY --chown=1000:1000 /Users/wopl/dev/microservices/hello /usr/src/app

RUN PATH=$PATH:/usr/src/app/vendor/bin:bin

RUN composer install --no-scripts --prefer-dist \
  && rm -rf "$(composer config cache-dir)" "$(composer config data-dir)"
