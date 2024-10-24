## Employee Management

Project ini menggunakan Laravel 11 yang berjalan diatas PHP8.2. Untuk keseluruhan user interface, saya menggunakan Bootstrap untuk mempercepat proses pengerjaan.

### Library yang digunakan:
- Select2
- DataTables
- JQuery UI
- Bootstrap File-Input
- Bootstrap Icon

### Instalasi
```
php artisan migrate
php artisan storage:link
```

### Opsional:

Saya telah menyediakan 1000 baris data dummy yang saya generate menggunakan [Mockaroo](https://mockaroo.com/). Data tersebut siap digunakan dengan cara menjalankan seeder EmployeeSeeder
```
php artisan db:seed --class=EmployeeSeeder
```

### Routes
```
/employees              => Daftar pegawai
/employees/create       => Menambah pegawai baru
/employees/{id}         => Data pegawai berdasarkan ID
/employees/{id}/edit    => Edit Data pegawai berdasarkan ID
```