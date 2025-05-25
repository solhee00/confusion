FROM php:8.1-apache

RUN apt-get update && apt-get install -y libapache2-mod-security2

# Apache 설정
COPY custom.conf /etc/apache2/conf-enabled/custom.conf
COPY mime.types /etc/apache2/mime.types
COPY phpinfo.php /var/www/html/

# ModSecurity 기본 설정
COPY modsecurity.conf /etc/modsecurity/modsecurity.conf

RUN a2enmod security2

# ServerName 설정
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
