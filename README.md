<<<<<<< HEAD
=======

## Instalasi
#### Via Git
```bash
git clone https://github.com/shofiudinmuh/resto-website.git
```


### Setup Aplikasi
Jalankan perintah 
```bash
composer update
```
atau:
```bash
composer install
```
Copy file .env dari .env.example
```bash
cp .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_olive
DB_USERNAME=root
DB_PASSWORD=
```

Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Seeder table User, Pengaturan
```bash
php artisan db:seed
```
Menjalankan aplikasi
```bash
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT)
>>>>>>> 302b4ab19b86ab5b2424de12f1527d2e07318a4d
