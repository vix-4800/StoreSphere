# <p align='center' style='margin: 0'>StoreSphere</p>

<p align="center">
    <a href='https://github.com/vix-4800/StoreSphere'>
        <img src='https://img.shields.io/badge/Type-Educational-blue.svg'>
    </a>
    <a href='https://opensource.org/license/MIT'>
        <img src='https://img.shields.io/badge/License-MIT-yellow.svg'>
    </a>
</p>

## Installation

1. Clone the Repository

    ```
    git clone https://github.com/vix-4800/StoreSphere.git
    ```

2. Configure Environment

    Create a .env file by copying and renaming .env.example. Configure your environment settings. Uncomment DB_HOST for Docker and comment it for basic installation.

### With Docker and Sail

3. Install Laravel Dependencies

    ```
    docker run --rm -v $(pwd):/opt -w /opt laravelsail/php83-composer composer install --no-progress --no-interaction
    ```

4. Start Sail

    ```
    ./vendor/bin/sail up -d
    ```

5. Install Node Dependencies

    ```
    ./vendor/bin/sail npm install
    ```

6. Generate Laravel Application Key

    ```
    ./vendor/bin/sail artisan key:generate
    ```

7. Start NPM

    ```
    ./vendor/bin/sail npm run dev
    ```

Use `./vendor/bin/sail stop` to stop the server or `./vendor/bin/sail down` to remove containers

### Without Docker

3. Install Laravel Dependencies

    ```
    composer install --no-progress --no-interaction
    ```

4. Install Node Dependencies

    ```
    npm install
    ```

5. Generate Laravel Application Key

    ```
    php artisan key:generate
    ```

6. Run Migrations and Seeders

    ```
    php artisan migrate && php artisan db:seed
    ```

7. Start the App

    ```
    php artisan serve
    npm run dev
    ```

## After installation

You can access the application at http://localhost:80
Test login and password:

-   test1@example.com : 12345qwert
-   test2@example.com : 12345qwert
