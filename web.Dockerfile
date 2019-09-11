FROM nginx

ADD vhost.conf /etc/nginx/conf.d/default.conf

COPY public /var/www/public