# 💻 Innovatech – Laptop Service & E-Commerce Platform

![Innovatech Banner](https://via.placeholder.com/1000x250?text=Innovatech+Platform)

Welcome to **Innovatech**, a full-featured web platform for managing laptop sales, maintenance services, and accessories. Designed with usability, functionality, and smooth admin operations in mind, Innovatech is your one-stop digital solution for modern laptop businesses.

> 🛠️ Built as a graduation project for the 2024/2025 academic year – Web Programming Course.

---

## 📌 Table of Contents

- [🧠 Project Overview](#-project-overview)
- [🚀 Features](#-features)
- [📊 Admin Dashboard](#-admin-dashboard)
- [🔐 Authentication System](#-authentication-system)
- [🗂️ Database Schema](#-database-schema)
- [🛠️ Tech Stack](#-tech-stack)
- [📸 Screenshots](#-screenshots)
- [📦 Installation](#-installation)
- [👥 Team](#-team)
- [📚 References](#-references)

---

## 🧠 Project Overview

**Innovatech** is a PHP & MySQL-based e-commerce platform that offers:

- 📦 A dynamic product catalog for laptops and accessories
- 🔧 Booking system for diagnostics and maintenance
- 🛒 A smart shopping cart & checkout system
- 📈 Admin dashboard with real-time control and analytics
- 💬 Messaging system between users and admins
- ⭐ Wishlist & product previews with animations

All pages are responsive, secure, and optimized for a seamless user experience.

---

## 🚀 Features

### 🧑‍💻 User-Side

- Register/Login with secure password encryption
- Browse laptops, components, and accessories
- Add to cart, wishlist, or view product previews
- Submit inquiries via **Contact Us**
- Track and manage orders in the **Orders** section
- Auto-login and form field caching

### 🛠️ Maintenance Services

- Explore repair services and pricing
- Schedule diagnostics or maintenance
- View team and client testimonials
- Access dynamic maps and real-time service updates

---

## 📊 Admin Dashboard

Built for efficiency and full control, the admin panel allows:

- ✏️ Add/Edit/Delete laptops and accessories
- 🧾 View and update orders
- 👥 Manage users and other admins
- 💬 View/delete customer messages
- 📈 Track performance via budget/order counters

🔐 Admins access the dashboard through a secure login with encrypted credentials.

---

## 🔐 Authentication System

- Separate logins for **users** and **admins**
- Password encryption for all accounts
- Session-based caching to retain login state
- Update profile and change password securely
- Unauthorized access redirection with prompts

---

## 🗂️ Database Schema

The project is powered by MySQL with the following main tables:

| Table         | Description                              |
|---------------|------------------------------------------|
| `users`       | Stores user details                      |
| `admins`      | Stores encrypted admin credentials       |
| `laptop`      | Laptop products and details              |
| `products`    | Accessories and additional components    |
| `cart`        | Items in user shopping cart              |
| `wishlist`    | User favorite items                      |
| `orders`      | Submitted orders with statuses           |
| `messages`    | Contact form submissions                 |
| `checkoutlaptop` | Admin-managed laptop display catalog |

ERD diagram included in the `/docs` folder.

---

## 🛠️ Tech Stack

| Technology | Role |
|------------|------|
| **PHP** | Backend logic & server-side scripting |
| **MySQL** | Database management |
| **XAMPP** | Local server environment |
| **PhpStorm** | Development IDE |
| **HTML/CSS/JS** | Frontend interface & animations |
| **Swiper.js** | Interactive sliders (reviews & products) |

---

## 📸 Screenshots

> ✅ Live UI Samples (upload your screenshots into `/assets/screenshots`):

- 🏠 Homepage with laptop carousel and banners
- 💬 Animated customer reviews
- 🛒 Cart with quantity control and live total
- 🔒 Login prompts when unauthorized actions occur
- 🧑‍💼 Admin dashboard with editable cards and metrics
- 📬 Contact form with submission feedback

---

## 📦 Installation

### 🔧 Requirements

- PHP 7.x or later
- MySQL
- XAMPP / WAMP or any LAMP stack
- PhpMyAdmin

### ⚙️ Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/Innovatech.git
