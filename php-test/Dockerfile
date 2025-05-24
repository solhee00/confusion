FROM php:8.2-apache

# 업로드 디렉토리 생성
RUN mkdir -p /var/www/html/uploads

# PDO, PDO_MYSQL 확장 설치
RUN docker-php-ext-install pdo pdo_mysql

# src 폴더 전체를 /var/www/html/로 복사
COPY src/ /var/www/html/

# uploads 권한 설정
RUN chown -R www-data:www-data /var/www/html/uploads

