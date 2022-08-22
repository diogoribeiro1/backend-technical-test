# API Crypto

A api foi desenvolvida em Laravel, seguindo todos os requisitos do teste, usei os princípios do clean code e do solid. A api tem dois endpoints, um endponit que retorna o preço mais recente de uma criptomoeda, esse endpoint tem como parametro o nome da criptomoeda, aceitando apenas Bitcoin, Dacxi, Ethereum, Cosmos,
Terra-luna. O outro endpoint tem como parametro o nome da criptomoeda e a data que retorna o preço estimado da criptomoeda naquela data. Realizei testes unitários com PHPUnit e usei o laravel sail, que é uma interface de linha de comando leve para interagir com o ambiente de desenvolvimento Docker padrão do Laravel.

The api was developed in Laravel, following all the test requirements, I used the principles of clean code and solid. The api has two endpoints, an endponit that returns the most recent price of a cryptocurrency, this endpoint has the name of the cryptocurrency as a parameter, accepting only Bitcoin, Dacxi, Ethereum, Cosmos,
Earth-moon. The other endpoint has as a parameter the name of the cryptocurrency and the date that returns the estimated price of the cryptocurrency on that date. I did unit tests with PHPUnit and used laravel sail, which is a lightweight command line interface for interacting with Laravel's standard Docker development environment.

# API Endpoints

|   Endpoints   |  Parameters  |    Verb    |
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

http://localhost:8000/api/bitcoin
