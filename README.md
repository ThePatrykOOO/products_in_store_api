# Products in shop API

## Business Features

- Crud Management Users, Shops and Products
- Get info about weather for determined shop
- Every update was data has been stored in audits table. I'm using for this laravel-auditing

## Run project

Clone repository:

    git clone git@github.com:ThePatrykOOO/products_in_store_api.git

Go to folder:

    cd products_in_store_api

Install dependencies:

    composer install

Copy .env file:

    cp .env.example .env

Generate app key:

    php artisan key:generate

Run docker

    docker-compose up

Enter to container and run migrations

    docker-compose exec -it laravel.test bash
    php artisan migrate

Run seeders

    php artisan db:seed

## API Endpoints

Every enabled endpoint has been documented in Postman. You can import the endpoints and test the application using the
file 'postman/products_in_store.postman_collection.json'.
