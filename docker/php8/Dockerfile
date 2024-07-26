FROM php:8.3-fpm-alpine

RUN apk --update add wget \
		     curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
