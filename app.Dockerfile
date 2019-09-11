FROM jguyomard/laravel-php:7.3

COPY composer.lock /var/www

COPY composer.json /var/www

COPY database /var/www/database

WORKDIR /var/www
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
&& php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
&& php composer-setup.php \
&& php -r "unlink('composer-setup.php');" \
&& php composer.phar install --no-dev --no-scripts \
&& rm composer.phar

COPY . /var/www

RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan optimize