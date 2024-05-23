# shopping-mall

This project is a Shopping Mall application built using Laravel for the backend and Vue.js for the frontend. It allows users to view categories, products within those categories, and detailed product information. Additionally, it includes functionalities for adding new products.

## Table of Contents
- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Contributing](#contributing)
- [License](#license)

## Features
- View all categories.
- View products within a specific category.
- View detailed information of a product.
- Add new products.

## Prerequisites
- PHP >= 7.4
- Composer
- Vue >= 3.x
- NPM or Yarn
- MySQL

## Installation

### Backend (Laravel)
1. Clone the repository:
    ```sh
    https://github.com/AshotHovhannisyan/shopping-mall.git
    cd shopping-mall
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Copy the `.env.example` file to `.env`:
    ```sh
    cp .env.example .env
    ```

4. Generate application key:
    ```sh
    php artisan key:generate
    ```

5. Set up your database credentials in the `.env` file.

6. Run the database migrations:
    ```sh
    php artisan migrate --seed
    ```

### Frontend (Vue.js)
1. Install dependencies:
    ```sh
    npm install
    ```

3. Run the development server:
    ```sh
    npm run dev
    ```

## Configuration

### .env
Ensure the `APP_URL` is set correctly:
```env
APP_URL=http://localhost:8000
