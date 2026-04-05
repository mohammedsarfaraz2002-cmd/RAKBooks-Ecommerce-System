# 📚 RAKBooks E-Commerce System

A full-stack **PHP & MySQL-based e-commerce platform** that allows users to browse and purchase books from multiple external suppliers using **SOAP web services integration**.

This project simulates a real-world distributed system where a central application communicates with multiple supplier systems (Banbury, Cerebro, and Plutonium) to fetch and manage book data.

---

## 🚀 Key Features

- 🛒 Browse books from multiple suppliers in one platform  
- 🔍 Search and view book details  
- 🧺 Shopping cart and checkout system  
- 📦 Order tracking system  
- 👨‍💼 Admin panel for managing books and orders  
- 🔗 SOAP-based integration with external supplier services  

---

## 🧠 What Makes This Project Unique

- Implements **SOAP Web Services** (rare in student projects)  
- Demonstrates **multi-database architecture**  
- Simulates **real-world supplier integration**  
- Combines **frontend + backend + service communication**

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server Environment:** XAMPP  
- **Integration:** SOAP Web Services  

---

## Prerequisites

- **XAMPP** (includes Apache, MySQL, PHP)
- **PHP 7.4+** with SOAP extension enabled
- **MySQL 5.7+**
- Modern web browser (Chrome, Firefox, Edge, Safari)

---

## Installation Steps

### 1. Install XAMPP
- Download and install XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
- Install to default location (usually `C:\xampp` on Windows)

### 2. Enable PHP SOAP Extension
- Open `php.ini` file in XAMPP installation directory
- Find the line `;extension=soap` and remove the semicolon to uncomment it
- Save the file and restart Apache

### 3. Copy Project Files
- Copy the entire `rakbooks` folder to `C:\xampp\htdocs\`
- Project should be accessible at `http://localhost/RAKBooks/Rakbooks/`

### 4. Database Setup
- Start MySQL service in XAMPP Control Panel
- Open phpMyAdmin (`http://localhost/phpmyadmin`)
- Create the following databases:
  - `rakbooks_db` (main application database)
  - `banbury_db` (Banbury supplier database)
  - `cerebro_db` (Cerebro supplier database)
  - `plutonium` (Plutonium supplier database)
- Import SQL schema files for each database (if provided)

### 5. Configure Database Connection
- Open `Rakbooks/connection.php`
- Verify database credentials match your MySQL setup:
  ```php
  $servername = "localhost";
  $username = "root";
  $password = "";  // Default XAMPP password (empty)
  $dbname = "rakbooks_db";
  ```

  ---

## How to Use

### Starting the Application
1. Open XAMPP Control Panel
2. Start **Apache** and **MySQL** services
3. Open browser and navigate to: `http://localhost/RAKBooks/Rakbooks/HomePage.php`

### User Features
- **Browse Books**: Search and view books from all suppliers
- **Shopping Cart**: Add books to cart and proceed to checkout
- **Track Orders**: View order history and status

### Admin Features
- **Login**: Access admin dashboard at `AdminLogin.php`
- **Add Books**: Add new books to supplier databases
- **Remove Books**: Remove books from supplier databases
- **Manage Orders**: View and update order statuses

---

## Project Structure

```
rakbooks/
├── RAKBooks/          # Main application files
│   ├── HomePage.php
│   ├── UserLogin.php
│   ├── BrowseBooks.php
│   ├── cart.php
│   ├── checkout.php
│   └── ...
├── Banbury/           # Banbury supplier SOAP service
│   ├── server.php
│   └── service.wsdl
├── Cerebro/           # Cerebro supplier SOAP service
│   ├── server.php
│   └── service.wsdl
└── Plutonium/         # Plutonium supplier SOAP service
    ├── server.php
    └── service.wsdl
```

---

## Default Access

- **User Registration**: Available at `UserRegister.php`
- **User Login**: `UserLogin.php`
- **Admin Login**: `AdminLogin.php` (requires manual account creation)




