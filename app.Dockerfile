FROM jguyomard/laravel-php:7.3

COPY composer.lock /var/www

COPY composer.json /var/www

COPY database /var/www/database

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

RUN composer update

RUN composer install

RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

RUN chmod 777 -R /var/www/storage

RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan optimize:clear
