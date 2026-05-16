# 🔗 URL Shortener Service

A role-based URL shortening service built with Laravel. This was developed as part of a technical assignment to demonstrate understanding of authentication, authorization, and database relationships.

## 📋 The Problem We're Solving

Companies need internal URL shorteners where different roles have different permissions. Not everyone should create short links, and people should only see what they're supposed to see.

## 👥 User Roles & Permissions

| Role | Create Short URLs | View Short URLs |
|------|------------------|-----------------|
| **SuperAdmin** | ❌ No | ❌ Cannot see any |
| **Admin** | ❌ No | ✅ Only URLs from OTHER companies |
| **Member** | ❌ No | ✅ Only URLs created by OTHERS |
| **Sales** | ✅ Yes | ✅ All URLs in their company |
| **Manager** | ✅ Yes | ✅ All URLs in their company |

## 🏗️ How It Works

- Each company has multiple users
- Short URLs belong to both a user and a company
- Authentication required to access any short URL
- Users can only access short URLs from their own company

## 🚀 Quick Start Guide

### What You'll Need
- PHP 8.1 or higher
- Composer
- MySQL or SQLite

### Step-by-Step Setup

```bash
# 1. Get the code
git clone https://github.com/RajukrRaja/url-shortener-by-raju.git
cd url-shortener-by-raju

# 2. Install dependencies
composer install

# 3. Set up environment
cp .env.example .env
php artisan key:generate

# 4. Choose your database

# For MySQL (update .env file):
# DB_CONNECTION=mysql
# DB_DATABASE= your_db
# DB_USERNAME=root
# DB_PASSWORD=

# For SQLite (simpler, no setup needed):
# DB_CONNECTION=sqlite
# Then run: touch database/database.sqlite

# 5. Run migrations and seeders
php artisan migrate
php artisan db:seed

# 6. Start the server
php artisan serve