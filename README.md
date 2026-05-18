#  URL Shortener Service

A modern, secure, and role-based URL shortening platform built using Laravel.
This project demonstrates clean architecture, scalable backend practices, authentication, authorization, database relationships, service-oriented design, and role-based access control used in real production applications.

---


---

#  Development Journey (Commit History)

This project was built incrementally using structured commits.

| Commit                                                                                                        | Description                                           |
| ------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------- |
| `first commitment by raju`                                                                                    | Initial Laravel setup and project initialization      |
| `Setup database configuration and improve README`                                                             | Database setup improvements and documentation updates |
| `Implement authentication and role management`                                                                | Added authentication and role system                  |
| `Add company relationship to users`                                                                           | Introduced company-user relationships                 |
| `Add company relationship and super admin seeder`                                                             | Added super admin setup and database constraints      |
| `Define routes for short url module`                                                                          | Implemented URL module routes                         |
| `Add policy rules for short url permissions`                                                                  | Added authorization policies                          |
| `Implement short url service layer`                                                                           | Moved business logic into services                    |
| `Refactor short URL module using services, policies, Eloquent relationships, and dedicated list/create views` | Major architecture refactor                           |
| `Add invitation system and role-based authorization`                                                          | Added invitation flow and advanced authorization      |

---

#  Project Overview

Organizations often need an internal URL shortening system where access must be controlled carefully.

Different employees have different responsibilities:

* Some users should only view links
* Some should create and manage links
* Some should only access company-specific data
* Sensitive data should never be visible to everyone

This project solves that problem using:

* Role-based permissions
* Company-level data isolation
* Policy-driven authorization
* Service layer architecture
* Secure authentication flow

The application ensures users only access resources they are authorized to use.



---

#  Key Features

## Authentication System

* Secure login & registration
* Session-based authentication
* Protected routes using middleware
* User-company association
* Role-based access restrictions

---

## 👥 Advanced Role Management

The system contains multiple user roles with different permissions.

| Role           | Create URLs | View URLs | Access Scope           |
| -------------- | ----------- | --------- | ---------------------- |
| **SuperAdmin** | No            | Yes     | Global access          |
| **Admin**      | Yes           | Yes     | Other companies only   |
| **Member**     | Yes           | Yes     | URLs created by others |


This permission structure is implemented using Laravel Policies for clean authorization handling.

---

#  Multi-Company Architecture

The application supports multiple companies.

Each company:

* Has multiple users
* Owns its own short URLs
* Maintains isolated data visibility
* Restricts unauthorized cross-company access

This architecture simulates how real SaaS products manage tenants securely.

---

#  Architecture & Design Principles

The project follows clean backend engineering practices.

##  Service Layer Pattern

Business logic is separated from controllers using dedicated service classes.

Example:

* URL generation logic
* Slug uniqueness checks
* Validation handling
* Company mapping
* Click tracking

All handled inside:

```bash
app/Services/ShortUrlService.php
```

This keeps controllers lightweight and maintainable.

---

##  Policy-Based Authorization

Authorization is handled using Laravel Policies.

Benefits:

* Centralized permission management
* Clean controller code
* Scalable role logic
* Easy testing & maintenance

Implemented inside:

```bash
app/Policies/ShortUrlPolicy.php
```

---

##  Eloquent Relationships

The project uses proper database relationships:

* Company → hasMany Users
* User → belongsTo Company
* User → hasMany ShortUrls
* ShortUrl → belongsTo User
* ShortUrl → belongsTo Company

This enables optimized queries and scalable data handling.

---

#  Installation Guide

##  Requirements

Before setup, ensure the following are installed:

* PHP 8.1+
* Composer
* MySQL or SQLite
* Node.js (optional for frontend assets)

---

#  Quick Setup

```bash
# Clone repository
git clone https://github.com/RajukrRaja/url-shortener-by-raju.git

# Enter project directory
cd url-shortener-by-raju

# Install dependencies
composer install

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

---

#  Database Configuration

## MySQL Setup

Update `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=
```

---

---

## Db download instruction

Database SQL file is available on GitHub inside:

```txt id="e5x9q2"
database_sql_url_shortner/url_shortener_raju.sql
```

### Steps

1. Open the SQL file from the repository.
2. Click on **Raw**.
3. Press `Ctrl + S` to download the file.

### Import Database

1. Start Apache and MySQL from XAMPP.
2. Open:

```txt id="u7k3m1"
http://localhost/phpmyadmin
```

3. Create database:

```sql id="r4n8p6"
CREATE DATABASE url_shortener_raju;
```

4. Import:

```txt id="q2v5x9"
url_shortener_raju.sql
```

---


#  Run Migrations & Seeders

```bash
php artisan migrate

php artisan db:seed
```

This automatically creates:

* Roles
* Companies
* Demo users
* Sample permissions

---

# Start Development Server

```bash
php artisan serve
```

Application will run on:

```bash
http://127.0.0.1:8000
```

---

#  Demo User Accounts

After seeding the database:

| Email                                                   | Password | Role       |
| ------------------------------------------------------- | -------- | ---------- |
| [superadmin@example.com](mailto:superadmin@example.com) | password | SuperAdmin |
| [admin@example.com](mailto:admin@example.com)           | password | Admin      |
| [member@example.com](mailto:member@example.com)         | password | Member     |


These accounts help test authorization behavior quickly.

---

# Important Project Structure

```bash
app/
├── Http/
│   ├── Controllers/
│   │   ├── ShortUrlController.php
│   │   └── InvitationController.php
│   │
│   ├── Policies/
│   │   └── ShortUrlPolicy.php
│   │
│   └── Middleware/

├── Models/
│   ├── User.php
│   ├── Company.php
│   ├── ShortUrl.php
│   └── Invitation.php

├── Services/
│   └── ShortUrlService.php

database/
├── migrations/
└── seeders/
```



#  Technology Stack

| Category       | Technology                 |
| -------------- | -------------------------- |
| Backend        | PHP                        |
| Framework      | Laravel 10/11              |
| Database       | MySQL / SQLite             |
| ORM            | Eloquent                   |
| Authentication | Laravel Breeze / Jetstream |
| Authorization  | Laravel Policies           |
| Frontend       | Blade + TailwindCSS        |

---

#  Security Considerations

The application includes several backend security practices:

* Route protection using middleware
* Role-based authorization
* Company-level access isolation
* URL ownership validation
* Expiring invitation links
* Secure password hashing
* CSRF protection

---

#  Scalability Improvements Possible

Future upgrades can include:

* REST API support
* QR code generation
* Click analytics dashboard
* Custom aliases/slugs
* URL expiration handling
* Redis caching
* Queue jobs
* Rate limiting
* Audit logs
* Activity tracking
* Team collaboration modules

---

#  Learning Outcomes

This project demonstrates practical understanding of:

* MVC architecture
* Clean code practices
* Service-oriented backend design
* Database normalization
* Authentication systems
* Authorization using policies
* Multi-tenant application structure
* Scalable Laravel development

Perfect for backend developer technical evaluations and portfolio projects.

---

# License

This project was created for educational and technical assignment purposes.

---

# Author

Built with dedication by **Raju Kumar Raja**

A backend-focused project designed to showcase real-world Laravel architecture, scalable coding practices, and production-ready authorization systems.

