# afisha.kz Laravel API Server
## Install project by following steps/commands

- Clone project from https://github.com/captkakao/api-server-afisha.kz
- Copy .env.example and rename it to .env
- Set your database, google recaptcha, sendpulse and other service credentials
- Change FILESYSTEM_DRIVER to public in .env file

```sh
composer install
```
```sh
php artisan key:generate
```
```sh
php artisan migrate --seed
```
```sh
php artisan storage:link
```

### Set permissions for project
```sh
chown -R username:group ./
```
```sh
chmod -R 755 ./
```
### Then inside /public, run:
```sh
chown -R username:group storage
```
### Run code below to make queue work
```sh
php artisan queue:work
```
### If you are running project on your server run code below to to keep background processes running (even after you closed terminal)
```sh
nohup php artisan queue:work --daemon &
```
