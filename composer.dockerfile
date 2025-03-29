FROM composer:latest

ENV APP_NAME=crude

WORKDIR /app

RUN apk update ; apk add git ; composer create-project laravel/laravel $APP_NAME;

WORKDIR /app/$APP_NAME

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

EXPOSE 8000
