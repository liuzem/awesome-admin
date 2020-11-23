FROM php:7.4-fpm
LABEL MAINTAINER="conlecl@163.com"
# Install env
RUN sed -i "s@http://deb.debian.org@http://mirrors.aliyun.com@g" /etc/apt/sources.list && rm -Rf /var/lib/apt/lists/* &&  cat /etc/apt/sources.list

RUN apt-get update -yqq && apt-get install -y git vim curl libmcrypt-dev libfreetype6-dev libjpeg62-turbo-dev libcurl4-openssl-dev pkg-config libssl-dev && rm -r /var/lib/apt/lists/* && pecl channel-update pecl.php.net

# composer 安装
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/bin/composer && \
    composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

RUN pecl install mcrypt && echo "extension=mcrypt.so" >> /usr/local/etc/php/php.ini
RUN pecl install redis && docker-php-ext-enable redis
RUN apt-get install -y libpng-dev  && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd bcmath mysqli pdo_mysql

WORKDIR /www

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog
EXPOSE 9000
VOLUME ["/www"]
