#!/bin/bash
docker-compose exec -T afisha-api-php-fpm chmod -R 777 storage/ bootstrap/
docker-compose exec -T afisha-api-php-fpm cp .env.example .env
docker-compose exec -T afisha-api-php-fpm composer install
docker-compose exec -T afisha-api-php-fpm php artisan key:generate
docker-compose exec -T afisha-api-php-fpm php artisan config:cache
docker-compose exec -T afisha-api-php-fpm php artisan migrate:fresh --seed