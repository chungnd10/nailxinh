
## About NailXinh

// cai dat composer
1: composer install


2:tao database

3:tao file env

// tao app key
4: php artisan key:generate

5:cau hinh database

//run migrate
6: php artisan migrate

//run seeder
7: php artisan db:seed

// run project
8: php artisan serve

cấu hình thêm file env
APP_NAME=NailXinh
APP_URL=http://localhost:8000

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=nailxinh1@gmail.com
MAIL_PASSWORD=Matkhau1
MAIL_ENCRYPTION=tls
