FROM nginx
LABEL MAINTAINER="conlecl@163.com"

RUN sed -i "s@http://deb.debian.org@http://mirrors.aliyun.com@g" /etc/apt/sources.list && rm -Rf /var/lib/apt/lists/* &&  cat /etc/apt/sources.list

RUN apt-get update
ADD nginx.conf /etc/nginx/nginx.conf
ADD sites-enabled/* /etc/nginx/conf.d/
RUN mkdir -p /docker/htdocs && mkdir -p /docker/log && mkdir -p /docker/log/nginx
RUN chown -R www-data.www-data /docker/htdocs /docker/log
EXPOSE 80
VOLUME ["/docker"]