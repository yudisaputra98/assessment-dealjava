<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Installation

Edit .env using your connection : 
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Migrate database and run the seeder :
```
php artisan migrate --seed
```

And try to access the api using Postman to this url :
```
http://mysite.com/api/products?key=blablabla
```

Note :
- change "mysite.com" using your own domain
- change "blablabla" using your own key
