## Employee Management

Project ini menggunakan Laravel 11 yang berjalan diatas PHP8.2. Untuk keseluruhan user interface, saya menggunakan Bootstrap untuk mempercepat proses pengerjaan.

### Library yang digunakan:
- Select2
- DataTables
- JQuery UI
- Bootstrap File-Input
- Bootstrap Icon

### Instalasi

Buat file `.env` dengan isi sebagai berikut.
Ubah data yang diperlukan, misalnya `DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME` dan `DB_PASSWORD` sesuai dengan koneksi database yang digunakan.
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:K3CE/l3yI/S1pAelWnr6Ln1lKSM5+/g1bVFEycbRyDI=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

#DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=data_pegawai
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
```

Kemudian jalankan command berikut:
```
php artisan migrate
php artisan storage:link
php artisan serve
```

### Opsional:

Saya telah menyediakan 1000 baris data dummy yang saya generate menggunakan [Mockaroo](https://mockaroo.com/). Data tersebut siap digunakan dengan cara menjalankan seeder EmployeeSeeder
```
php artisan db:seed --class=EmployeeSeeder
```

### Routes
| Route | Keterangan |
| -- | -- |
| `/employees` | Daftar pegawai |
| `/employees/create` | Menambah pegawai baru |
| `/employees/{id}` | Data pegawai berdasarkan ID |
| `/employees/{id}/edit` | Edit Data pegawai berdasarkan ID |
| `/api/employees` | API semua pegawai |
| `/api/employee/id/{id}` | API pegawai berdasarkan ID |
| `/api/employee/name/{name}` | API pegawai berdasarkan Nama|
| `/api/employee/position/{position}` | API pegawai berdasarkan Posisi |
| `/api/employee/department/{department}` | API pergawai berdasarkan Department |