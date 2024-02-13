# **StoreSphere**

<p align="center">
    <a href='https://github.com/vix-4800/StoreSphere'>
        <img src='https://img.shields.io/badge/Type-Educational-blue.svg'>
    </a>
    <a href='https://opensource.org/license/MIT'>
        <img src='https://img.shields.io/badge/License-MIT-yellow.svg'>
    </a>
</p>

## Installation

### With Docker and Sail

1. Clone this repository - `git clone https://github.com/vix-4800/StoreSphere.git`
2. Create _.env_ file and configure your environment (uncomment the DB_HOST line for docker)
3. Run migrations for the database - `./vendor/bin/sail artisan migrate`
4. Run seeders for the database - `./vendor/bin/sail artisan db:seed`
5. Start the app - `./vendor/bin/sail up -d` and `./vendor/bin/sail npm run dev`

Use `./vendor/bin/sail stop` to stop the server

### Without Docker

1. Clone this repository - `git clone https://github.com/vix-4800/StoreSphere.git`
2. Create _.env_ file and configure your environment (use .env.example).
3. Install Laravel dependencies - `composer install --no-progress --no-interaction`
4. Install node dependencies - `npm install`
5. Generate Laravel application key - `php artisan key:generate`
6. Run migrations for the database - `php artisan migrate`
7. Run seeders for the database - `php artisan db:seed`
8. Start the app - `php artisan serve` and `npm run dev`

## After installation

You can access the application at http://localhost:80
Test login and password:

-   test1@example.com : 12345qwert
-   test2@example.com : 12345qwert
