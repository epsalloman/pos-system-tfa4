# POS System - CodeIgniter 4

## About the Project

This project is a basic Point-of-Sale (POS) system created using CodeIgniter 4 for IT0049 - Web System Technologies.

The project demonstrates the use of the MVC architecture using Routes, Controllers, Models, Views, and a MySQL database.

## Pages

The application contains four main pages:

- Home
- About
- Customer Accounts
- User Accounts

## Database

The project uses a MySQL database named:

pos_system

The database contains two tables:

- customers
- users

The Customer Accounts and User Accounts pages retrieve their records from the MySQL database through CodeIgniter Models. Both record types can be created and edited through validated forms. User accounts also support a prepared 240 x 240 profile avatar.

A database export is included in the project:

pos_system.sql

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL
- CodeIgniter 4

## Setup Instructions

1. Clone or download this repository.

2. Open a terminal inside the project folder.

3. Install the project dependencies:

   composer install

4. Copy the `env` file and rename the copy to `.env`.

5. Create or import the `pos_system` MySQL database using:

   pos_system.sql

6. Configure the database connection in `.env`:

   database.default.hostname = localhost
   database.default.database = pos_system
   database.default.username = YOUR_DATABASE_USERNAME
   database.default.password = YOUR_DATABASE_PASSWORD
   database.default.DBDriver = MySQLi
   database.default.port = 3306

7. Apply the included database migration. This safely adds the avatar column and customer email index when they are missing:

   php spark migrate

8. Make sure PHP's GD extension is enabled so avatar thumbnails can be prepared.

9. Set the base URL:

   app.baseURL = 'http://localhost:8080/'

10. Start the CodeIgniter development server:

   php spark serve

11. Open a browser and visit:

   http://localhost:8080/

## Available Routes

- `/` - Home
- `/about` - About
- `/customers` - Customer Accounts
- `/customers/new` - Add Customer
- `/users` - User Accounts
- `/users/new` - Add User

## Customer Accounts

Customer records are retrieved from the `customers` table using `CustomerModel`. Full name and email are required, email must be valid and unique, and an optional phone number must contain 11 digits beginning with 09.

## User Accounts

User records are retrieved from the `users` table using `UserModel`. Usernames are required and unique. The edit form accepts an optional JPG or PNG avatar up to 2 MB, prepares a 240 x 240 thumbnail, stores it under `public/uploads/avatars`, and saves only the generated filename in the database.

## TFA3

This version adds validated create and edit workflows for customers and users, CSRF protection for form submissions, and validated avatar upload with a placeholder fallback.

## TFA2

This version extends the previous TFA1 POS application by replacing the temporary static PHP arrays with a real MySQL database.
