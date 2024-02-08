# **StoreSphere**

## Installation

### Without Docker

1. Clone this repository - `git clone https://github.com/vix-4800/StoreSphere.git`
2. Create _.env_ file and configure your environment (use .env.example).
3. Install Laravel dependencies - `composer install --no-progress --no-interaction`
4. Install node dependencies - `npm install`
5. Generate Laravel application key - `php artisan key:generate`
6. Run migrations - `php artisan migrate`
7. Run seeders for the database - `php artisan db:seed`
8. Start the app - `php artisan serve` and `npm run dev`

You can access the application at http://127.0.0.1:8000
Test login and password:

-   test1@example.com : 12345qwert
-   test2@example.com : 12345qwert

### With Docker

You can use **Makefile**:

1. Clone this repository - `git clone https://github.com/vix-4800/StoreSphere.git`
2. Run configuration script - `make build`
3. Start the application - `make run`

If you don't have **make** installed:

1. Clone this repository - `git clone https://github.com/vix-4800/StoreSphere.git`
2. Create _.env_ file and configure your environment
3. Start the web server - `docker-compose up webserver -d`
4. Install Laravel dependencies - `docker-compose run --rm composer install`
5. Generate Laravel key - `docker-compose run --rm artisan key:generate`
6. Install node dependencies - `docker-compose run --rm node install`
7. Run Laravel migrations - `docker-compose run --rm artisan migrate`
8. Run seeders for the database - `docker-compose run --rm artisan db:seed`
