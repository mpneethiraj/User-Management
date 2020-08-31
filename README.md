# User-Management

### Installation

1. Clone repository
```
$ git clone https://github.com/mpneethiraj/User-Management.git
```
2. Install composer dependencies
```
$ composer install
```

3. Generate APP_KEY
```
$ php artisan key:generate
```

4. Configure .env file, edit file with next command `$ nano .env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=secret
```

6. Run migrations
```
~/api-laravel$ php artisan migrate
```

6. Run seeder
```
~/api-laravel$ php artisan db:seed
```
