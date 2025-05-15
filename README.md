# TestAllsaved Project

A Laravel application with Bootstrap templates and task management functionality.

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL or equivalent database

## Installation

1. Clone the repository:
```bash
   git clone https://github.com/alsanger/TestAllsaved.git
```
```bash
   cd TestAllsaved
```
2. Install dependencies:
```bash
   composer install
```
3. Setup environment:
```bash
   cp .env.example .env
```
```bash
   php artisan key:generate
```
4. Configure database in `.env` file:
```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=testallsaved
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
```
5. Run migrations and seeders:
```bash
   php artisan migrate
```
```bash
   php artisan db:seed
```
6. Start the development server:
```bash
   php artisan serve
```
7. Access the application at http://localhost:8000

## Features

- Dashboard, Profile, and Settings pages
- Task management (CRUD operations)
- Bootstrap-based responsive UI
- Service-based architecture

## Technologies Used

- Laravel 10
- Bootstrap 5
- PHP 8.1+
- MySQL
