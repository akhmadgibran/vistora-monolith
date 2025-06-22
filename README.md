<p align="center"><a href="https://github.com/akhmadgibran/vistora-monolith/" target="_blank"><img src="/public/images/logo/vistora_logo_only_no_bg.png" width="100" alt="Vistora Logo"></a></p>

# Vistora Monolith

**Vistora** is a Laravel-based monolithic eCommerce CMS project, designed as a showcase and learning platform for building modern fullstack applications with real-world features like authentication, content customization, and payment integration.

> ⚠️ This is the **monolith version** of Vistora. Future plans include splitting the project into REST API and decoupled frontend using Next.js.

---

## 🚀 Features

- ✅ **Authentication** with Laravel Fortify (Register, Login, Logout)
- 🧑‍💼 **Role-based access control** (Planned: Superadmin, Admin, Customer)
- 🧾 **Product Management (CRUD)**
- 🚚 **Order Management**
- 🖼️ **Content Customization** (Homepage banner, store info, etc.)
- 🛒 **Shopping Cart & Checkout** (Planned)
- 💳 **Midtrans Payment Gateway** integration (Planned)
- 📴 **Store Open/Close Toggle**
- 📦 Clean code structure, RESTful routing, and UI with Tailwind CSS
- 💡 Orther feature idea will be added here in the future

---

## 🧱 Tech Stack Currently

| Layer     | Tools / Frameworks            |
|-----------|-------------------------------|
| Backend   | Laravel 12, Laravel Fortify   |
| Frontend  | Blade, Tailwind CSS           |
| Database  | MySQL                         |
| Payment   | Midtrans Snap (Sandbox/Test)  |
| Dev Tools | Git, GitHub, VSCode, Herd     |

---

## 📦 Installation & Setup

```bash
# 1. Clone the repository
git clone https://github.com/akhmadgibran/vistora-monolith.git
cd vistora-monolith

# 2. Install PHP dependencies
composer install

# 3. Copy env file and generate app key
cp .env.example .env
php artisan key:generate

# 4. Create database and update DB credentials in .env
php artisan migrate

# 5. (Optional) Create storage symlink
php artisan storage:link

# 6. Run the development server
php artisan serve
```

## 🌿 Branching Strategy
This project follows the Git Flow branching strategy for code management..

* `main`: Contains stable production-ready code. Only receives merges from `release` or `hotfix` branches.
* `develop`: The main branch for development. All new features are integrated here.
* `feature/*`:Created from `develop` for building new features (e.g., `feature/payment-report`). Merged back into `develop` once completed.
* `release/*`: Created from `develop` to prepare for a release. Once ready, it's merged into both `main` and `develop`.
* `hotfix/*`: Created from `main` for urgent bug fixes in production. Merged back into both `main` and `develop`.


![gitflow](https://github.com/user-attachments/assets/9ac5bea1-79af-4ad5-9d15-b9f316ed5fc6)



## 🤝 Contributing
This project is part of a personal learning journey and portfolio.
Pull requests and feedback are welcome for educational collaboration.

## 📄 License
This project is open-source and available under the [MIT License](LICENSE).


