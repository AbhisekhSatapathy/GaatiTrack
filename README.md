# GaatiTrack

**GaatiTrack** is a PHP-based web application for parcel tracking and logistics management. Designed with simplicity and scalability in mind, it enables admins to manage parcels, users, branches, and track delivery statuses in real-time.

# 🚀 Built by [Abhisekh Satapathy](https://github.com/AbhisekhSatapathy)

---
# 🤝 Contributing
Contributions, issues, and feature requests are welcome!
Fork the repository
Create your feature branch: git checkout -b feature/your-feature
Commit your changes: git commit -m "Add new feature"
Push to the branch: git push origin feature/your-feature
Open a pull request

# 📜 License
This project is open-source and available under the MIT License
.

# 👤 Author

## Abhisekh Satapathy
🔗 GitHub: @AbhisekhSatapathy
📧 Email: satapathyabhisekh2003@gmail.com

## Table of Contents

- [About](#about)  
- [Features](#features)  
- [Architecture / Tech Stack](#architecture--tech-stack)  
- [Getting Started](#getting-started)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  
  - [Configuration](#configuration)  
  - [Running the Application](#running-the-application)  
- [Directory Structure](#directory-structure)  
- [Usage](#usage)  
- [Future Improvements](#future-improvements)  
- [License](#license)  
- [Author](#author)

---

## About

GaatiTrack is a web-based system to manage parcels, users, branches/staff and to allow tracking of parcels through statuses, branches, etc. Admins can manage users, branches, staff, parcels; users can track parcels, view parcel details, etc.

---

## Features

Some of the features include:

- Admin login / authentication  
- CRUD operations for: parcels, branches, staff, users  
- Viewing / managing parcel status and tracking  
- Reporting (list, print, etc.)  
- Branch listing / editing  
- User management  
- Interface components like sidebar, header, footer  
- Search / filter functionality (if implemented)  


---

## Architecture & Tech Stack

- **Backend / Server-side**: PHP  
- **Database**: MySQL (or whichever DB used)  
- **Frontend**: HTML, CSS, JavaScript  
- Uses MVC-like structure / classes (you have `classes.php`, `admin_class.php`, etc.)  
- Separation of concerns between config, database connection, UI templates (header, footer) etc.

---

GaatiTrack/
├── assets/                # CSS, JS, images, static files
├── classes.php            # Helper class or base classes?
├── admin_class.php        # Admin-specific logic
├── db_connect.php         # Database connection
├── ajax.php               # Ajax requests handler
├── login.php              # Login
├── index.php              # Main dashboard / entry-point
├── header.php, footer.php # UI template parts
├── home.php               # Admin / user home dashboard
├── parcel_list.php        # List all parcels
├── manage_parcel_status.php
├── user_list.php, manage_user.php, etc.
├── reports.php            # Reports
├── track.php              # Parcel tracking
└── Credentials            # (Probably contains credentials — secure this!)

## Getting Started

### Prerequisites

Make sure you have:

- PHP installed (version compatible)  
- A web server (e.g. Apache / Nginx)  
- MySQL (or other supported relational database)  
- Composer (if you use any external PHP dependencies)  
- Git

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/AbhisekhSatapathy/GaatiTrack.git
