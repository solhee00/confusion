FROM php:8.1-apache

# mime.types 파일 복사 (mod_mime이 필요로 함)
COPY mime.types /etc/apache2/mime.types

# Apache 설정 추가 (AddType 등)
COPY custom.conf /etc/apache2/conf-enabled/custom.conf

# 테스트용 PHP 파일 추가
COPY phpinfo.php /var/www/html/

# Apache 경고 방지
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
