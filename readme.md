## Running with Docker

### Installing Docker

* Follow [the official guide](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#install-docker-ce) to install Docker CE for Ubuntu
* Follow [the official guide](https://docs.docker.com/engine/installation/linux/linux-postinstall/) to run Docker as a non-root user
* Follow [the official guide](https://docs.docker.com/compose/install/) to install Docker Compose for Ubuntu

### Configuring the application

* copy the docker-compose.yml.example file to docker-compose.yml
* change volumes mapping from ```/var/www/html/bookshelf:/app``` to your desired path
* once you install Docker, you can start the containers using the Docker compose

```sh
$ docker-compose up -d
```

* copy the .env.example file to .env
* run ```php artisan key:generate``` to set APP_KEY
* run ```npm install``` to install dependencies
* run ```npm run dev``` to run all Mix tasks
* start a reverse proxy container using this [docker-compose file](https://lsv.wsgroup-asia.com:12221/php/dev-script/blob/master/reverse-proxy/docker-compose.yml.example)
* setup the local domain ```dev.bookshelf.wsgroup-asia.net``` using /etc/hosts

You should be able to visit the application at [http://dev.bookshelf.wsgroup-asia.net](http://dev.bookshelf.wsgroup-asia.net).

## Important Commands

* run ```npm run watch``` and keep that terminal open to watch all relevant files for changes
* run ```composer check-name``` to check naming conventions
* run ```composer cs-check``` to check your code (one by one) to follow standards
* run ```composer cs-check-all``` to check your code (all) to follow standards
* run ```composer cs-fix``` to fix your code (one by one) to follow standards
* ```composer dumpautoload```
* ```php artisan cache:clear```
* ```php artisan view:clear```
* ```php artisan config:clear```
* ```php artisan route:clear```
* ```php artisan clear-compiled```
* ```php artisan route:list```
