<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Laravel

Laravel project wehere I can study again all about laravel, but from [Laracats](https://laracasts.com/)

## How to run the project

First we have to use docker to run this project with 

- Laravel 10
- PHP 8.2
- MySQL

And is just with the next commands

```bash
# To start
docker compose up -d

# To use composer is just with
docker compose exec php bash

# Inside the container run
composer install && \
php artisan key:gen && \
chmod -R 777 storage bootstrap

# if you want to create models, controllers, etc, is here
```

After that commands, just visit the nect domain `http://localhost://7777`

## Ports

This project use the next ports

| PORT  | DESTINATION  |
|-------|--------------|
| 7777  | Web project  |
| 7779  | Database     |
