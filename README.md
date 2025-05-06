# 🚀 DRONO – Autonomous Drone Delivery Platform

DRONO is an innovative platform that leverages drone technology to offer fast, eco-friendly, and secure delivery services within urban areas. Designed to connect local merchants with customers, DRONO simplifies the delivery process through intuitive web and mobile interfaces, real-time tracking, and seamless payment integration.

---

## ✨ Key Features

- 🛍️ **Shop & Order** — Browse nearby stores and order products effortlessly
- 📦 **Real-Time Drone Tracking** — Follow your delivery live via OpenStreetMap
- 🔒 **Secure Payments** — Pay with confidence through Stripe integration
- 🛒 **Merchant Dashboard** — Add/manage products and track orders
- 🧑‍💼 **Admin Panel** — Full control over users, merchants, and deliveries
- 📱 **Responsive Design** — Optimized for mobile, tablet, and desktop

---

## 🎯 Who It's For

- 🕒 People with busy lifestyles who value speed
- 🌱 Eco-conscious consumers seeking greener alternatives
- 🏪 Local businesses looking to modernize logistics
- 🤖 Tech lovers interested in drone-powered innovation

---

## 🧪 Tech Stack

| Layer       | Technology                           |
|-------------|--------------------------------------|
| Frontend    | HTML5, Tailwind CSS                  |
| Backend     | PHP (Laravel, DDD)                   |
| Database    | Postgres                             |
| Mapping     | OpenStreetMap                        |
| Payments    | Stripe                               |
| Compatibility | Chrome, Firefox, Safari, Edge, Opera |

---

## ⚙️ Getting Started

```bash
# Clone the repository
git clone https://github.com/your-repo/drono.git
cd drono

# Install backend & frontend dependencies
composer install
npm install

# Environment setup
cp .env.example .env
# ➤ Add your database, Stripe, and OpenStreetMap API credentials

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Build assets
npm run dev

# Launch the local server
php artisan serve
