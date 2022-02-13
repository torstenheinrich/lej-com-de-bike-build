FROM composer:2.2 as build

WORKDIR /app
COPY composer.* .
RUN docker-php-ext-install bcmath
RUN composer install

FROM php:8.1-cli

WORKDIR /app
COPY --from=build /app/vendor /app/vendor
COPY . /app
COPY ./docker-entrypoint.sh /
ENTRYPOINT ["/docker-entrypoint.sh"]
