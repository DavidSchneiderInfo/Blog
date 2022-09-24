FROM nginx:latest

COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf  /etc/nginx/conf.d/default.conf

COPY public /var/www/public
EXPOSE 80
