# Address Book Application

This is a simple **Address Book Application** developed using **PHP** and **MySQL** with a **JavaScript**-enhanced front-end. The application allows users to add, edit, view, and delete address book entries. It also provides functionality to export the data to **JSON** and **XML** formats.

## Features

- Add new entries
- Edit and delete existing entries
- Export address book entries to JSON and XML
- Basic form validation for email addresses
- Responsive and user-friendly design

## Technologies Used

- **Backend**: PHP, MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Export**: JSON, XML

## Installation

### Requirements

- [XAMPP](https://www.apachefriends.org/index.html) or any other local server environment with **PHP** and **MySQL**.
- Web browser (e.g., Google Chrome, Mozilla Firefox).

### Setup

1. Clone the repository or download the source files.

    ```bash
    git clone https://github.com/OG-1534/address-book.git
    ```

2. Start your **XAMPP** or another server environment.

3. Create a database called `address_book_db` in **phpMyAdmin** and import the provided SQL file.

4. Place the project folder in your **htdocs** directory (or your server’s root directory).

5. Open the browser and navigate to:

    ```
    http://localhost/address-book
    ```

6. The application should be up and running.

### Database

The database schema for the `address_book` table:

| Field       | Type         | Description                            |
|-------------|--------------|----------------------------------------|
| id          | INT          | Auto-increment primary key              |
| name        | VARCHAR(100) | Last name of the contact, cannot be NULL |
| first_name  | VARCHAR(100) | First name of the contact, cannot be NULL |
| email       | VARCHAR(100) | Email address, cannot be NULL           |
| street      | VARCHAR(150) | Street address                         |
| zip_code    | VARCHAR(10)  | Postal/Zip code                        |
| city_id     | INT          | ID of the city associated with the contact |

## Usage

- Use the "Add New Entry" button to add a new contact.
- Click the "Edit" button to modify an existing contact's details.
- Click the "Delete" button to remove a contact.
- Export your address book to **JSON** or **XML** using the respective buttons.

## File Structure

```bash
address-book/
│
├── .git/               # Git version control folder
├── .gitignore          # Specifies files ignored by Git
├── .env                # Environment variables for database configuration
├── .htaccess           # Configuration for server behavior
├── AUTHORS             # Project authors
├── README.md           # Project documentation
├── add_edit.php        # Add/Edit form handling logic
├── config/             # Configuration directory
│   └── database.php    # Database connection configuration
├── composer.json       # PHP dependencies management file
├── composer.lock       # Lock file for PHP dependencies
├── css/                # Stylesheets for the application
│   └── styles.css      # Main stylesheet for form and table styling
├── export.php          # Script to export address book entries to XML/JSON
├── index.php           # Main entry point to display and manage address book
├── js/                 # JavaScript files for frontend functionality
│   └── scripts.js      # Script for basic form validation
├── package.json        # Node.js dependencies file
├── package-lock.json   # Lock file for Node.js dependencies
├── process.php         # Script to process form submissions (add/edit/delete entries)
└── vendor/             # PHP dependencies (managed via Composer)
