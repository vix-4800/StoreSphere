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

1. Clone this repository

    ```
    git clone https://github.com/vix-4800/StoreSphere.git
    ```

2. Create _.env_ file and configure your environment (copy and rename .env.example)

### With Docker and Sail

3. Install Laravel dependencies

    ```
    docker run --rm -v $(pwd):/opt -w /opt laravelsail/php83-composer composer install --no-progress --no-interaction
    ```

4. Start Sail

    ```
    ./vendor/bin/sail up -d
    ```

5. Install node dependencies

    ```
    ./vendor/bin/sail npm install
    ```

6. Generate Laravel application key

    ```
    ./vendor/bin/sail artisan key:generate
    ```

7. Start npm

    ```
    ./vendor/bin/sail npm run dev
    ```

Use `./vendor/bin/sail stop` to stop the server

### Without Docker

3. Install Laravel dependencies

    ```
    composer install --no-progress --no-interaction
    ```

4. Install node dependencies

    ```
    npm install
    ```

5. Generate Laravel application key

    ```
    php artisan key:generate
    ```

6. Run migrations and seeders for the database

    ```
    php artisan migrate && \
    php artisan db:seed
    ```

7. Start the app

    ```
    php artisan serve
    npm run dev
    ```

## After installation

You can access the application at http://localhost:80
Test login and password:

-   test1@example.com : 12345qwert
-   test2@example.com : 12345qwert
