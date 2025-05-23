FROM httpd:2.4.59

# 1. mod_rewrite 및 log_config 활성화
RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf && \
    echo "LoadModule log_config_module modules/mod_log_config.so" >> /usr/local/apache2/conf/httpd.conf

# 2. DocumentRoot 접근 허용 및 AllowOverride 활성화
RUN printf '\n<Directory "/usr/local/apache2/htdocs">\n\
  AllowOverride All\n\
  Require all granted\n\
</Directory>\n\
<Directory "/usr/local/apache2/htdocs/data">\n\
  Require all granted\n\
</Directory>\n' >> /usr/local/apache2/conf/httpd.conf

# 3. %3F 등 인코딩된 슬래시와 ? 허용
RUN echo "AllowEncodedSlashes NoDecode" >> /usr/local/apache2/conf/httpd.conf

# 4. 에러/접속 로그를 Docker 콘솔로 출력되게 설정
RUN echo "ErrorLog /dev/stderr" >> /usr/local/apache2/conf/httpd.conf && \
    echo "CustomLog /dev/stdout combined" >> /usr/local/apache2/conf/httpd.conf

# 5. 웹 파일 복사
COPY src/ /usr/local/apache2/htdocs/
