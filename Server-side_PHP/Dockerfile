FROM httpd:2.4.59

# 1. rewrite_module, log_config_module 활성화 (CGI 제거됨)
RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf && \
    echo "LoadModule log_config_module modules/mod_log_config.so" >> /usr/local/apache2/conf/httpd.conf

# 2. DocumentRoot .htaccess 허용
RUN printf '<Directory "/usr/local/apache2/htdocs">\n\
    AllowOverride All\n\
    Options Indexes FollowSymLinks\n\
    Require all granted\n\
</Directory>\n' >> /usr/local/apache2/conf/httpd.conf

# 3. 가상 호스트 설정 포함
COPY apache.conf /usr/local/apache2/conf/extra/httpd-vhosts.conf
RUN echo "Include conf/extra/httpd-vhosts.conf" >> /usr/local/apache2/conf/httpd.conf

# 4. 인코딩된 슬래시 허용 (%3F 등)
RUN echo "AllowEncodedSlashes NoDecode" >> /usr/local/apache2/conf/httpd.conf

# 5. 로그를 Docker 콘솔로 출력
RUN echo "ErrorLog /dev/stderr" >> /usr/local/apache2/conf/httpd.conf && \
    echo "CustomLog /dev/stdout combined" >> /usr/local/apache2/conf/httpd.conf

# 6. 리소스 복사
COPY src/ /usr/local/apache2/htdocs/
COPY src/www.local /var/www/www.local
COPY src/static.local /var/www/static.local

EXPOSE 80
CMD ["httpd-foreground"]
