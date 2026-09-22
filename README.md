Student Accommodation Finder 🏠
A lightweight, full-stack web application designed to help university students search, filter, and shortlist off-campus housing accommodations (PGs, Hostels, and Flats). Built using PHP, MySQL, JavaScript, and Bootstrap.
🌟 Key Features
Dynamic Search & Filtering: Filter listings seamlessly by accommodation type (PG, Flat, Hostel) and maximum budget without page reloads (via AJAX).
Client-Side Shortlisting: Easily bookmark/shortlist preferred accommodations during your session.
Responsive UI: Clean, modern interface built with Bootstrap 5 that works on desktop, tablet, and mobile browsers.
RESTful API Backend: Decoupled PHP backend returning structured JSON response data from the MySQL database.
🛠️ Tech Stack
Frontend: HTML5, CSS3, JavaScript (Fetch API), Bootstrap 5
Backend: PHP 8.x
Database: MySQL / MariaDB (phpMyAdmin)
Environment: XAMPP / WAMP / LAMP stack
📁 Project Structure
student_accommodation/
├── index.php     # Main web interface with interactive UI & filters
├── api.php       # PHP backend script returning JSON filtered data
├── db.php        # MySQL PDO database connection handler
└── schema.sql    # Database schema creation and sample records


🚀 Getting Started
Follow these steps to run the application locally on your machine using XAMPP.
Prerequisites
XAMPP (with Apache and MySQL modules installed)
Web browser (Chrome, Firefox, Edge, etc.)
Step-by-Step Installation
Clone or Download the Repository
Place the project directory into your XAMPP htdocs folder:
C:\xampp\htdocs\student_accommodation


Start Local Apache & MySQL Servers
Open XAMPP Control Panel.
Click Start next to Apache and MySQL.
Import Database in phpMyAdmin
Open your browser and navigate to http://localhost/phpmyadmin.
Create a new database named student_accommodation.
Click on the SQL tab.
Copy the contents of schema.sql from your project folder, paste it into the editor, and click Go.
Launch the Application
Open your browser and visit:
http://localhost/student_accommodation/index.php


🖼️ API Endpoint Documentation
GET /api.php
Fetches property listings filtered by type and price.
Query Parameters:
Parameter
Type
Description
type
string
Filter by type (PG, Flat, Hostel, or All)
max_price
number
Upper limit for monthly rent

Sample Response:
[
  {
    "id": 1,
    "title": "Sunny PG for Students",
    "type": "PG",
    "location": "Near Main Campus",
    "price": 6500,
    "image": "https://images.unsplash.com/photo-1555854877-bab0e564b8d5"
  }
]


🤝 Contributing
Contributions, issues, and feature requests are welcome! Feel free to fork this repository and submit a pull request.
📜 License
This project is open-source and available under the MIT License.
