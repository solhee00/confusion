FROM httpd:2.4.59

# 1. CGI, Rewrite, 로그 모듈 활성화
RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf && \
    echo "LoadModule cgi_module modules/mod_cgi.so" >> /usr/local/apache2/conf/httpd.conf && \
    echo "LoadModule log_config_module modules/mod_log_config.so" >> /usr/local/apache2/conf/httpd.conf

# 2. ScriptAlias + 실행 디렉토리 권한
RUN echo 'ScriptAlias /cgi-bin/ "/usr/local/apache2/cgi-bin/"' >> /usr/local/apache2/conf/httpd.conf && \
    printf '<Directory "/usr/local/apache2/cgi-bin">\n\
    Options +ExecCGI\n\
    AddHandler cgi-script .cgi\n\
    Require all granted\n\
</Directory>\n' >> /usr/local/apache2/conf/httpd.conf

# 3. DocumentRoot 디렉토리 권한 및 .htaccess 허용
RUN printf '<Directory "/usr/local/apache2/htdocs">\n\
    AllowOverride All\n\
    Options Indexes FollowSymLinks ExecCGI\n\
    Require all granted\n\
</Directory>\n' >> /usr/local/apache2/conf/httpd.conf

# 4. 인코딩된 슬래시 허용 (%3F 유지)
RUN echo "AllowEncodedSlashes NoDecode" >> /usr/local/apache2/conf/httpd.conf

# 5. 로그를 Docker 콘솔로 출력
RUN echo "ErrorLog /dev/stderr" >> /usr/local/apache2/conf/httpd.conf && \
    echo "CustomLog /dev/stdout combined" >> /usr/local/apache2/conf/httpd.conf

# 6. 소스 복사 (정적 + CGI 노출용)
COPY src/ /usr/local/apache2/htdocs/
COPY src/usr/lib/cgi-bin/download.cgi /usr/local/apache2/cgi-bin/download.cgi

# 7. 실행 권한 부여
RUN chmod +x /usr/local/apache2/cgi-bin/download.cgi && \
    chmod +x /usr/local/apache2/cgi-bin/download.cgi

