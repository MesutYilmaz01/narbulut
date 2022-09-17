## Kurulum
```sh
$ git clone https://github.com/MesutYilmaz01/narbulut .
$ mv .env.example .env
$ php artisan key:generate
```

##Env Bilgileri
```sh
CACHE_DRIVER=redis
QUEUE_CONNECTION=database

DB_CONNECTION=mysql
DB_HOST=192.10.2.6
DB_PORT=3306
DB_DATABASE=testdb
DB_USERNAME=user
DB_PASSWORD=mypassword

REDIS_CLIENT=predis
REDIS_HOST=192.10.2.7
REDIS_USERNAME=null
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_DB=0
REDIS_CACHE_DB=1

Mail için ben mailtrap kulandım.
```
## Docker Kaldırma
```sh
$ docker-compose up -d
$ docker exec -it app bash
$ composer install

```

## Test
```sh
$ php artisan test
```

## Veritabanı kurulumu

```sh
$ php artisan migrate
$ php artisan db:seed
```

## Kuyruğu Dinleme
```sh
CSV Dosyasını import etmeden önce kuyruğu çalıştırmanız gerekmektedir.
$ docker exec -it app bash
php artisan queue:listen
```

## CSV Dosyası Import
```sh
$ php artisan command:readfromcsv
```

## Sistem API Kullanımı
Sistemde kayıtlı olan endpointler
```sh
 api\users GET
 api\user\{uuid} GET
 api\organizations GET
 api\organization\{uuid} GET
```

