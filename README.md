# API Crypto

# API Endpoints

|   Endpoints   |  Paramaters  |    Verb    |
| :---         |     :---:      |          ---: |
| api/{coin}   | coin     | GET    |
| api/{coin)/search/{date}     | coin and date       | GET    |

Test my api on heroku:
    http://api-crypto-diogo.herokuapp.com/api/documentation#/Projects

    

<h4><li>Technologies Used</li></h4>
    PHP<br>
    Laravel<br>
    PHPUnit<br>
    Sail<br>
    PostgreSQL<br>
    MySQL<br>
    Api CoinGecko<br>
    Guzzle<br>
    Swagger<br>
    Heroku<br>
    Docker<br>

# Downloading and setting up the project

(Are you in a hurry? Run the installation script with: ./install.sh)

Clone project:

    $ git clone https://github.com/diogoribeiro1/backend-technical-test.git
    $ cd backend-technical-test

Install dependencies:

    $ composer install

Setting up env:

    $ cp .env.example .env

Start the application:

    $ sail up -d
    or
    $ vendor/bin/sail up -d 
    
Update as environment variables from .env file
    
    APP_NAME=ApiCrypto
    APP_URL=http://localhost:8000

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=nome_que_desejar_db
    DB_USERNAME=root
    DB_PASSWORD=root

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=memcached

    REDIS_HOST=redis
    REDIS_PASSWORD=null
    REDIS_PORT=6379

Generate env variables:

    $ php artisan key:generate

Run the migrations:

    $ sail php artisan migrate
    $ sail php artisan db:seed #Just if you want to run the seeders
    or
    $ vendor/bin/sail php artisan migrate
    $ vendor/bin/sail php artisan db:seed #Just if you want to run the seeders

Enjoy!

http://localhost:80/
