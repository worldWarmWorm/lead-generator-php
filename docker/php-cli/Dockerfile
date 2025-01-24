FROM php:8.3-cli AS base

ARG COMPOSER_VERSION=2.8.3
ARG COMPOSER_INSTALL="@composer-${COMPOSER_VERSION}"
ARG PHP_EXTENSIONS="redis"

RUN curl -sSLf -o /usr/local/bin/install-php-extensions \
  https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions \
  && chmod +x /usr/local/bin/install-php-extensions \
  && /usr/local/bin/install-php-extensions ${PHP_EXTENSIONS} \
  && /usr/local/bin/install-php-extensions ${COMPOSER_INSTALL}

FROM base

WORKDIR /app

COPY --chmod=777 ./sources .
RUN composer install

#ENTRYPOINT ["sleep", "infinity"]
ENTRYPOINT ["php"]
CMD ["index.php"]
