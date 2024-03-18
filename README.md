<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Setup Aplikasi

Copy file .env dari .env.example

```
cp .env.example .env
```

Konfigurasi file .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=root
DB_PASSWORD=
```

Generate key

```
php artisan key:generate
```

Migrate database

```
php artisan migrate
```

Seeder table User

```
php artisan db:seed --class=UserSeeder
```

Menjalankan aplikasi

```
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT)
