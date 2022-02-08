# Сборка всего проекта
build:
	docker-compose build

# Поднятие всего проекта
up:
	docker-compose up -d

# Просмотр активных сервисов
ps:
	docker-compose ps

# Положить все сервисы
down:
	docker-compose down

# Рестартануть все сервисы
restart:
	docker-compose restart

# Пересобрать весь проект
rebuild:
	docker-compose down
	docker-compose build
	docker-compose up -d
	sh install_afisha_api.sh

# Поднять только сервис nginx
up-nginx:
	docker-compose up -d afisha-api-nginx --build

# Поднять только сервис afisha-api
up-php-fpm:
	docker-compose up -d afisha-api-php-fpm --build
	
# Поднять только сервис afisha-api
up-mysql:
	docker-compose up -d afisha-api-mysql --build

# Положить только сервис nginx
down-nginx:
	docker-compose down afisha-api-nginx

# Положить только сервис adata-api
down-php-fpm:
	docker-compose down afisha-api-php-fpm
	
# Положить только сервис adata-api
down-mysql:
	docker-compose down afisha-api-mysql

# Консоль для afisha-api
php-fpm:
	docker-compose exec afisha-api-php-fpm bash
