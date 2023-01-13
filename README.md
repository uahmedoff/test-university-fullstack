<h1>Test university schedule system</h1>

### Installation

##### Clone project

    git clone https://github.com/uahmedoff/test-university-fullstack.git

##### Go to the folder application using cd command on your cmd or terminal

    cd test-university-fullstack

##### Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu

    cp .env.example .env

##### Run your cmd or terminal

    composer install

##### Run

    ./vendor/bin/sail artisan key:generate

##### Run laravel sail (Docker)

    ./vendor/bin/sail up

##### Oen new terminal    

##### Open your .env file and change the database name (DB_HOST) to mysql then clear config cache

    ./vendor/bin/sail artisan config:cache

##### Run Migrations 
    ./vendor/bin/sail artisan migrate
   
##### Database seeder run
    ./vendor/bin/sail artisan module:seed Schedule

##### Symlink to public folder
    ./vendor/bin/sail artisan storage:link

### Installing frontend packages

    ./vendor/bin/sail npm install

##### For develpment mode run

    ./vendor/bin/sail npm run watch

##### For production mode run

    ./vendor/bin/sail npm run prod

     