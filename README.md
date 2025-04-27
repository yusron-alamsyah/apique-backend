# Apique Backend

This is a Laravel project.

## Requirements

- PHP >= 8.1
- Composer
- MySQL 

## Installation

Follow these steps to set up the project locally:

### 1. Clone the repository

git clone https://github.com/yusron-alamsyah/apique-backend.git
cd apique-backend

### 2. Install PHP dependencies

composer install


### 3. Create a copy of your `.env` file

cp .env.example .env

### 4. Generate application key

php artisan key:generate

### 5. Configure the `.env` file

Update the following sections in your `.env`:

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=your_database_user  
DB_PASSWORD=your_database_password

### 6. Run database migrations

php artisan migrate


### 7. Start the development server

php artisan serve

Your application will be available at [http://localhost:8000](http://localhost:8000).

---

## Features

- REST API POST /tasks → Create a task
- REST API GET /tasks → List all tasks
- REST API PUT /tasks/{id} → Update a task
- REST API DELETE /tasks/{id} → Delete a task
