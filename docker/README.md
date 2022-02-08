## Docker & docker-compose

.env for docker ```cp .env.example .env```

change AFISHA_API_PATH variable in .env to your full path to project

```
docker-compose build
docker-compose ps
docker-compose up -d
```

Check http://127.0.0.1:8080

If you need artisan use ```docker-compose exec afisha-api-php-fpm bash```

# Installation from script.

### Running 
Just exec
```shell
docker-compose exec afisha-api-mysql bash
```
Then type your user password (root)
```shell
mysql -u root -p
```

```shell
GRANT ALL ON afisha.* TO 'root'@'%' IDENTIFIED BY 'root';
```

```shell
FLUSH PRIVILEGES;
```

```shell
EXIT;
```
After database installation run sh file

```shell
sh install_afisha_api.sh
```
