# Project Setup Guide

This guide will walk you through the setup process for our project.

## Installation

1. Clone the repository:


```sh
git clone https://github.com/IvanTaranenko/upload_csv.git
```

2. Install PHP dependencies using Composer:
```sh
composer install
```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
```sh
cp .env.example .env
```
```sh
php artisan key:generate
```
4. Run the database migrations:

```sh
php artisan migrate
```

5. Install Node.js and npm using nvm:

```sh
nvm install node
```


6. Install JavaScript dependencies:

```sh
npm run install 
```


## Running the Application

1. Start the Laravel development server:

```sh
php artisan serve
```


2. Run the Laravel queue worker to process queued jobs:
3. 
```sh
php artisan queue:work
```


The queue worker will process any pending jobs in the background.

3. Access the application in your web browser at `http://127.0.0.1:8000`.

Remember to consult the Laravel documentation for further details on configuring queues and running jobs.
