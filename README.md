## PhoneBook Application

The PhoneBook App is a simple contact management system built using the Laravel Framework. It allows users to create, view, update, and delete contact information efficiently.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Configuration](#configuration)
- [Contributing](#contributing)
- [License](#license)

## Installation

Follow these steps to set up the PhoneBook App on your local machine:

1. **Clone the Repository**
    git clone https://github.com/LaurelAmah/PhoneBook-App.git

    cd PhoneBook-App

2. **Install dependencies**
    composer install

3. **Copy the .env.example file to env**
    cp .env.example .env

4. **Generate the application key**
    php artisan key:generate

5. **Configure your environment variables in the env file including your database settings.**

6. **Run Migrations**
    php aritsan migrate

7. **Serve the application**
    php artisan serve

The application should now be running at **http://localhost:8080**

## Usage
Once the application is up and running, you can:
- Create new contacts by clicking on the "Create new Contact" button.
- View a list of all contacts on the main page.
- Edit or Delete existing contacts using the provided options.

## Features

- **Create Contact**: Add new contacts with names, phone number, and email.
- **View Contacts**: Display a list of all saved contacts and view details of a particular contact when clicked on.
- **Update Contact**: Edit existing contact details.
- **Delete Contact**: Remove contacts from the list.

## Configuration

- **Database**: Ensure your database connection settings in the **.env** file are correct. 

E.g.

    DB_CONNECTION=mysql

    DB_HOST=127.0.0.1

    DB_PORT=3306

    DB_DATABASE=phonebook

    DB_USERNAME=root

    DB_PASSWORD=yourpassword

- **Environment variables**: Adjust other settings as necessary for your environment, such as mail settings, app name, and debug options.

## Contributing
I am the sole contributor to this small project, and for all other information you can contact me by mail:
- laurelngumamah@gmail.com.

# Liscense
This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
