FROM php:8.1-apache

RUN a2enmod rewrite

# .htaccess 허용
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# AllowEncodedSlashes 허용
RUN echo "AllowEncodedSlashes NoDecode" >> /etc/apache2/apache2.conf

# 디렉토리 접근 허용
RUN echo '<Directory "/var/www/html">\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n\
<Directory "/var/www/html/upload">\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# 웹 파일 복사
COPY src/ /var/www/html/
