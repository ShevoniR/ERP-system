# ERP System for Managing Customers, Items, and Reports

## Overview
This ERP system is designed to manage customer registrations, item records, and generate reports such as invoices, invoice item reports, and item reports. It uses **PHP**, **MySQL**, **Bootstrap**, and **JavaScript** to provide a user-friendly interface and backend functionality.

## Features
1. **Customer Management**:
   - Add and view customer details.
   - Input validation for required fields.
2. **Item Management**:
   - Add and view item details.
   - Input validation and dropdown selections for categories.
3. **Reports**:
   - Invoice Report: Displays invoice summary within a selected date range.
   - Invoice Item Report: Detailed invoice item records filtered by date range.
   - Item Report: Displays items grouped by category and subcategory.

---

## Assumptions
1. **Database Schema**:
   - The database tables and relationships are based on the provided SQL script.
   - `customer`, `district`, `item`, `item_category`, `item_subcategory`, `invoice`, and `invoice_master` are predefined tables.
2. **Category & Subcategory**:
   - Categories and subcategories for items are managed via the `item_category` and `item_subcategory` tables.
3. **Date Formats**:
   - The date inputs in the forms use the format `YYYY-MM-DD`.
4. **Environment**:
   - The application assumes a local server environment using **XAMPP** or **WAMP**.
5. **Frontend**:
   - Bootstrap is used for styling. Ensure internet access for Bootstrap CDN or include the files locally.

---

## Setup Instructions

### Prerequisites
1. Install [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/).
2. Ensure **PHP 7.4+** and **MySQL 5.7+** are available.
3. A web browser to access the application.

### Steps to Set Up the Project
1. **Clone or Download the Project**:
   - Clone this repository or download the zip file and extract it.

2. **Move to the Server Directory**:
   - Place the project folder into the `htdocs` directory of XAMPP (or the `www` directory for WAMP).

   ```bash
   mv your_project_directory /path_to_xampp/htdocs/

3. **Import the Database**:
   - Open phpMyAdmin: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a new database named `assignment`.
   - Import the provided SQL script `assignment.sql` into the database.

4. **Update Database Configuration**
   - Open the `db_connect.php` file in the project directory.
   - Update the credentials as per your local server setup:

   ```php
   <?php
   $servername = "localhost";
   $username = "root"; 
   $password = "";    
   $dbname = "assignment";
   ?>

5. **Start the Server**:
   - Launch Apache and MySQL from the XAMPP/WAMP control panel
   - Access the project in your browser: http://localhost/your_project_directory/   