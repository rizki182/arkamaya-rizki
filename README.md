## Deploy menggunakan docker
**Clone repository**

```sh
git clone https://github.com/rizki182/arkamaya-rizki.git
```

**Masuk ke folder docker**
```sh
cd arkamaya-rizki/docker
```

**Deploy**
```sh
docker compose up -d
```

Setelah proses deploy selesai akses url berikut melalui browser. Jika muncul pesan **Bad Gateway** tunggu beberapa saat lalu coba refresh halaman kembali
```sh
http://localhost:8080
```

Jika sudah tidak ada pesan bad gateway jalankan perintah berikut untuk mengisi database dengan data awal:
```sh
docker exec -it arkamaya-rizki-php php artisan db:seed
```

Untuk melihat database, akses url berikut melalui browser :
```
http://localhost:8081
```

Lalu isi form login dengan data berikut
```
Server : mariadb
Username : arkamaya
Password : arkamaya
Database : db_project_rizki
```


## Deploy menggunakan php

**Requirement**
```
- php >= 8.1
- php-cli
- php-mysql
- php-xml
- php-curl
- composer
- mariadb
```

**Clone repository**
```sh
git clone https://github.com/rizki182/arkamaya-rizki.git
```

**Masuk ke folder source code**
```sh
cd arkamaya-rizki/code
```
Edit file configurasi laravel
```
.env
```
Lalu sesuaikan variabel database dengan konfigurasi databse anda
```
DB_HOST= {mariadb host address}
DB_PORT= {mariadb port}
DB_DATABASE= {database name}
DB_USERNAME= {database username}
DB_PASSWORD= {database password}
```

Jalankan perintah berikut untuk install laravel dependency
```sh
composer install
```

Perintah import skema database dan isi database dengan data awal
```sh
php artisan migrate
php artisan db:seed
```

**Deploy**
```sh
php artisan serve
```

Akses aplikasi di
```
http://localhost:8000
```
## Login API dengan JWT
```
(POST) {base_url}/api/login
Form-data:
- email   : test@test.test
- password: password
```
