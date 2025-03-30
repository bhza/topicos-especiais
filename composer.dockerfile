FROM composer:latest

ENV APP_NAME=crude

VOLUME ./app/$APP_NAME

WORKDIR /app

RUN apk update ; apk add git; apk add php84-mysqli php84-pdo_mysql mysql mysql-client; 
RUN docker-php-ext-install pdo_mysql;


WORKDIR /app/$APP_NAME

CMD ["composer","install"]
CMD ["php", "artisan", "migrate"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

EXPOSE 8000
