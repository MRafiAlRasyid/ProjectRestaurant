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
