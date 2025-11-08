 Online Voting System (PHP + MySQL)
A simple Online Voting System built with PHP, MySQL, W3.CSS, and Bootstrap styling. This project allows users to register, log in, vote for candidates, and view results. Each user can vote only once.

 Project Structure
Code
voting_system/
│── db.php          # Database connection
│── register.php    # User registration
│── login.php       # User login
│── vote.php        # Voting page (one vote per user)
│── results.php     # Voting results
│── logout.php      # Logout
│── style.css       # Custom styling
🛠 Requirements
XAMPP (Apache + MySQL + PHP)

phpMyAdmin (comes with XAMPP)

VS Code or any text editor

 Database Setup
Start XAMPP Control Panel → Run Apache and MySQL.

Open http://localhost/phpmyadmin.

Create a database:

sql
CREATE DATABASE voting_system;
USE voting_system;
Create tables:

sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    voted TINYINT(1) DEFAULT 0
);

CREATE TABLE candidates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    votes INT DEFAULT 0
);
Insert sample candidates:

sql
INSERT INTO candidates (name) VALUES ('Alice'), ('Bob'), ('Charlie');
Running the Project
Copy the project folder voting_system into:

Code
C:\xampp\htdocs\
Open browser and go to:

Registration → http://localhost/voting_system/register.php

Login → http://localhost/voting_system/login.php

Vote → http://localhost/voting_system/vote.php

Results → http://localhost/voting_system/results.php

 Features
User Registration: Secure password hashing.

Login System: Session-based authentication.

Voting Page: Users can vote only once.

Results Page: Displays votes in descending order.

Logout: Ends session securely.

 Styling
Uses W3.CSS for responsive design.

Custom styles in style.css for layout, buttons, and tables.

Notes
Each user can vote only once (controlled by the voted flag in users table).

Passwords are stored securely using password_hash().

Results are updated in real-time after voting.
