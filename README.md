# PHP Stock Manager

PHP Stock Manager is a minimal web application designed to demostrate PHP interactions with database and HTML to build more complex applications.

It allows users to create, update, and delete stock items, as well as manage user accounts with different roles.

PHP Stock Manager features CRUD operations following the MVC Pattern with a minimal interface made with TailwindCSS 4.0.0.

## Requirements

- PHP 8.1 or higher
- MySQL 8.0 or higher
- Composer 8.2.6 or higher
- Node.js 10.9.2 or higher

## Features

- **User Management**: Create, update, and delete user accounts with roles (Admin and User).
- **Stock Management**: Add, update, and delete stock items with details such as name, description, price, and quantity.
- **Responsive Design**: The application is designed to be responsive and works well on various devices.
- **Validation**: Client-side validation for forms to ensure data integrity.
- **Authentication**: Secure login and registration system for users.
- **Authorization**: Protected views filtered by user roles.
- **Password restoration**: Made with PHPMailer and Google SMTP; allows user to securely restore their password when forgotten.

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Angi-1401/php-stock-manager.git
   cd php-stock-manager
   ```

2. **Set up the environment**:

   - Ensure you have [XAMPP](https://www.apachefriends.org/index.html) installed.
   - Place the project folder in the `htdocs` directory of your XAMPP installation.

3. **Create a database**:

   - Start Apache and MySQL from the XAMPP control panel.
   - Open phpMyAdmin and import the provided SQL file to set up the necessary tables at the database:
     ```sql
     -- Import the SQL file located at ./php-stock-manager/database/db.sample.sql
     ```

4. **Configure the application**:

   - Rename the `.env.sample` file to `.env` in the `root` directory.
   - Update the database configuration in `.env`:
   - In order to send emails, you will need to configure the PHPMailer and Google SMTP settings in the `.env` file.

5. **Install dependencies**:

   - Install dependencies using Composer and NPM:

   ```bash
   composer install
   npm install
   ```

6. **Run the application**:
   - Open your web browser and navigate to `http://localhost/php-stock-manager`.

## Usage

### User Management

- **Create User**: Navigate to the "Create User" page to add a new user.
- **Update User**: Navigate to the "Users" page, click on "Edit" next to a user to update their details.
- **Delete User**: Navigate to the "Users" page, click on "Delete" next to a user to remove them.

### Stock Management

- **Create Stock**: Navigate to the "Create Stock" page to add a new stock item.
- **Update Stock**: Navigate to the "Stocks" page, click on "Edit" next to a stock item to update its details.
- **Delete Stock**: Navigate to the "Stocks" page, click on "Delete" next to a stock item to remove it.

## Acknowledgements

- [XAMPP](https://www.apachefriends.org/index.html) for providing an easy-to-use development environment.
- [Tailwind CSS](https://tailwindcss.com/) for the utility-first CSS framework.
- [Font Awesome](https://fontawesome.com/) for the icons used in the project.
