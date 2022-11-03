# Test Backend Inosoft
## _Rest API Penjualan Kendaraan_
### Class diagram
![Class Diagram](https://i.postimg.cc/PrDbBhYx/inosoft.jpg)


### Requirement
- Laravel 8
- PHP 8
- Mongodb 4.2

### Installation
- Clone Project
```sh
git clone 
```
- Download dependency
```sh
composer install
```
- Copy env from env.example and adjust the file
```sh
DB_CONNECTION=mongodb
DB_DATABASE=db-name
DB_DSN=mongodb://localhost:27017
```
- Migrate DB and Seed
```sh
php artisan migrate:fresh --seed
```

- Generate Key for JWT
```sh
php artisan jwt:secret
```

- Run server
```sh
php artisan serve
```
### Route List
- Register
```sh
http://127.0.0.1:8000/api/register
```
![Register](https://i.postimg.cc/cLZk6JNK/a1.jpg)

- login
```sh
http://127.0.0.1:8000/api/login
```
![Register](https://i.postimg.cc/rwQjmCJb/a2.jpg)

- stok kendaraan
```sh
http://127.0.0.1:8000/api/stok-kendaraan
```
![Register](https://i.postimg.cc/Sxs8Z06T/aa3.jpg)

- penjualan kendaraan - untuk motor bisa 'mobil' diganti 'motor'
ambil id kendaraan (mobil) dari http://127.0.0.1:8000/api/get-all-mobil
```sh
http://127.0.0.1:8000/api/penjualan-mobil/6362728dcc710f952c0288ff
```
![Register](https://i.postimg.cc/W48BskFb/a4.jpg)

- laporan penjualan per kendaraan
```sh
http://127.0.0.1:8000/api/rekap-penjualan-kendaraan
```
![Register](https://i.postimg.cc/xTrnxLLW/a5.jpg)
- Route lainnya
```sh
php artisan route:list
```

