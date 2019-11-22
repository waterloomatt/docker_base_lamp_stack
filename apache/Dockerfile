ARG APACHE_VERSION=""
FROM httpd:${APACHE_VERSION:+${APACHE_VERSION}-}alpine

RUN apk update; \
    apk upgrade; 

# Copy apache vhost file to proxy php requests to php-fpm container
COPY demo.apache.conf /usr/local/apache2/conf/demo.apache.conf
RUN echo "Include /usr/local/apache2/conf/demo.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
    
COPY httpd-ssl.conf /conf/extra/httpd-ssl.conf
RUN echo "Include /conf/extra/httpd-ssl.conf" \
    >> /usr/local/apache2/conf/httpd.conf


COPY /certs/crt/localhost.crt /etc/ssl/certs/localhost.crt
COPY /certs/key/localhost.key /etc/ssl/private/localhost.key