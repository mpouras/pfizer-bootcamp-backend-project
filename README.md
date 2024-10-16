# Pfizer Prescription API Manager

This backend project, developed using **Laravel Sail** and **Docker**, is part of **Pfizer's bootcamp initiative**. It provides an API that manages drug and prescription data, with smooth integration between the backend and a Vue.js frontend. By leveraging Docker for containerization and Laravel for its robust backend framework, the project ensures efficient and scalable management of pharmaceutical data.

## Installation instructions (macOS)

### Run the commands below in your terminal

- Clone this repository
```
git clone https://github.com/mpouras/pfizer-bootcamp-backend-project.git
// or
git clone git@github.com:mpouras/pfizer-bootcamp-backend-project.git
```

- Enter the folder
```
cd pfizer-bootcamp-backend-project
```

- Install vendor files for docker
```
docker run --rm --interactive --tty -v $(pwd):/app composer install
```

- Create the .env file
```
cp .env.example .env
```

- Install Sail and run the app
```
./vendor/bin/sail up
```

**In case of an error like:**
>Error response from daemon: Ports are not available: exposing port TCP 0.0.0.0:3306 -> 0.0.0.0:0: listen tcp 0.0.0.0:3306: bind: address already in use

*Go to file **docker-compose.yml** and change this:*
```
        ports:
            - '${FORWARD_DB_PORT:-3306}:3306'
```
*to this:*

```
        ports:
            - '${FORWARD_DB_PORT:-3307}:3306'
```
*then run again the command below for sail to run*
```
./vendor/bin/sail up
```

- Run database migrations
```
./vendor/bin/sail artisan migrate
```
