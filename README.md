# AdminZ

## About

AdminZ adalah sebuah dashboard admin yang di buat dengan framework laravel versi 8. 
Admin ini digunakan sebagai starter project web admin. 
Untuk development tiap menunya admin ini menggunakan package Livewire.
Untuk HTML admin ini menngunakan AdminLTE 3 / Boostrap 4.

## Installation
* Gunakan php versi 7.4 ke atas 
* Gunakan node versi 14 ke atas
* clone repository
```bash
https://github.com/programercopas/adminz.git
```
* setting database .env file
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adminz
DB_USERNAME=root
DB_PASSWORD=
```
* go to root directory and run composer install
```bash
composer install
```
* run npm install
```bash
npm install
```
* run migration
```bash
php artisan migrate
```
* run database seed untuk generate superadmin user
```bash
php artisan db:seed --class=UserSeeder
```
* publish adminLTE source
```bash
npm run dev
```
## Superadmin Users
* username : superadmin
* passwrod : superadmin
