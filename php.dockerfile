FROM php:7.4-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

RUN chown laravel:laravel /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --no-cache bash

RUN pecl install xdebug; \
    docker-php-ext-enable xdebug; \
    echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \


#RUN apk add --no-cache $PHPIZE_DEPS \
#    && pecl install xdebug-2.9.2 \
#    && docker-php-ext-enable xdebug  \

#ENV XDEBUG_VERSION=2.9.2
#RUN apk --no-cache add --virtual .build-deps \
#        g++ \
#        autoconf \
#        make && \
#    pecl install xdebug-${XDEBUG_VERSION} && \
#    docker-php-ext-enable xdebug && \
#    apk del .build-deps && \
#    rm -r /tmp/pear

#RUN pecl install xdebug-2.6.0
#RUN docker-php-ext-enable xdebug
#RUN echo "zend_extension=\"/usr/local/php/modules/xdebug.so\"" >> /usr/local/etc/php/php.ini
#RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
#RUN echo "xdebug.remote_port=9000" >> /usr/local/etc/php/php.ini
#RUN echo "xdebug.remote_host=192.168.1.145" >> /usr/local/etc/php/php.ini
