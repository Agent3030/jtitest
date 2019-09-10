FROM phpdockerio/php72-fpm:latest

RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.2-mysql php-xdebug php7.2-intl \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git flow
RUN apt-get update \
    && apt-get install git-flow

ENV TERM xterm

RUN usermod -u 1000 www-data

EXPOSE 9000
CMD ["php-fpm"]


