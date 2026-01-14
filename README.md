# Multi-Vendor Checkout & Order Engine (Laravel 10)

A Laravel 10 backend application that implements a **multi-vendor checkout system**.  
Customers can add products from multiple vendors to their cart, and on checkout the
system automatically **splits the cart into vendor-specific orders**.

---

## Features

- Multi-vendor cart support
- Vendor-wise order splitting during checkout
- Inventory validation & stock deduction
- Simulated payment processing
- Role-based access (Admin / Customer)
- Admin order listing & filtering
- Event-driven architecture

---

## Tech Stack

- Laravel 10
- Laravel Sanctum (API Authentication)
- MySQL / PostgreSQL
- PHP 8.1+

---

## Setup Instructions

```bash
git clone https://github.com/Kishorsoni0706/multivendor-checkout.git
cd multivendor-checkout
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


Dummy Credentials
Admin

Email: admin@test.com

Password: password

Customer

Email: customer@test.com

Password: password

Seeded Data
Vendors

Vendor A

Vendor B

Products

Product 1 (Vendor A)

Product 2 (Vendor A)

Product 3 (Vendor B)