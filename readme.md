
## About NailXinh

1: composer install

2: tạo database

3: tạo file env

4: php artisan key:generate

5:cấu hình database trong file env

6: php artisan migrate --seed

7: php artisan serve

cấu hình thêm file env

APP_NAME=NailXinh
APP_URL=http://localhost:8000
APP_DEBUG=false

MAIL_DRIVER=smtp <br/>
MAIL_HOST=smtp.gmail.com<br/>
MAIL_PORT=587<br/>
MAIL_USERNAME=nailxinh1@gmail.com<br/>
MAIL_PASSWORD=Matkhau1<br/>
MAIL_ENCRYPTION=tls<br/>

SWEET_ALERT_MIDDLEWARE_TOAST_POSITION='top'
SWEET_ALERT_MIDDLEWARE_TOAST_CLOSE_BUTTON=true
SWEET_ALERT_MIDDLEWARE_ALERT_AUTO_CLOSE=8000
