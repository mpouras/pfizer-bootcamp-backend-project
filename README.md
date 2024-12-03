# Pfizer Prescription API Manager
 
This backend project, developed using **Laravel Sail** and **Docker**, is part of **Pfizer's bootcamp initiative**. It provides an API that manages drug and prescription data, with smooth integration between the backend and a Vue.js frontend. By leveraging Docker for containerization and Laravel for its robust backend framework, the project ensures efficient and scalable management of pharmaceutical data.
 
## Installation instructions
 
## Prerequisites
 
Before you begin, ensure you have the following installed on your system:
 
1. **Docker Desktop** - [Install Docker Desktop](https://www.docker.com/products/docker-desktop)
2. **WSL2 (for Windows users)** - [Install WSL2](https://learn.microsoft.com/en-us/windows/wsl/install)
3. **PHP** (Optional, only needed if you plan to run some Laravel commands directly) - [Install PHP](https://www.php.net/manual/en/install.php)
4. **Git** - [Install Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
5. **Laravel Sail** - [Install Laravel Sail](https://laravel.com/docs/11.x/installation#docker-installation-using-sail)
-  **Important for Windows users:** *you need to run the following commands in the WSL2 terminal*
 
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
- Environment-specific settings
>Inside the .env file you just created change the following
```
DB_CONNECTION=mysql DB_HOST=mysql DB_PORT=3306 DB_DATABASE=laravel DB_USERNAME=root(username can vary) DB_PASSWORD=password
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
- Import the database
  
**when prompted for the root password. Enter the password you set in your .env file.**
  
*create the Database if you haven’t created the database yet*
```
    ./vendor/bin/sail mysql -u root -p -e "CREATE DATABASE laravel;"
```
 
*import the SQL dump after creating the database*
```
./vendor/bin/sail mysql -u root -p laravel < ./laravel_dump.sql
```
 
- Run database migrations
```
./vendor/bin/sail artisan migrate
```
 
- Generate artisan key for .env file
```
php artisan key:generate
```
 
