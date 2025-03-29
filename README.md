# PHP Mini Framework Core

🚀 A lightweight and fun PHP framework to understand core concepts of MVC, routing, and database management. Built for learning, experimenting, and growing your PHP skills!

## ⚠️ Disclaimer
**This project is for educational purposes only. Never use it in production!**

---

## 🛠️ Requirements
- **PHP** (>=7.4 recommended)
- **Composer** (Dependency Manager for PHP)
- **MySQL** (Recommended: [XAMPP](https://www.apachefriends.org/))

## 🚀 Getting Started
Follow these simple steps to set up the project on your local machine:

### 1️⃣ Clone the Repository
```sh
git clone https://github.com/cva67/php-framework.git
cd php-mini-framework
```

### 2️⃣ Install Dependencies
```sh
composer update
```

### 3️⃣ Create the Environment File
```sh
cp .env.example .env
```
Make sure to configure your database settings inside the `.env` file.

### 4️⃣ Run Migrations
```sh
php migrator.php
```
This will set up the required database tables.

To rollback a specific model, run:
```sh
php rollback {modelName}
```

### 5️⃣ Run the Project
```sh
cd public
php -S localhost:8080 index.php
```
This will start a local development server at `http://localhost:8080`.

---

## 🔐 Authentication & Middleware
The framework includes a **simple login & registration system** with built-in **middleware** for protecting routes.

---

## 🎉 Features
✅ MVC Architecture  
✅ Lightweight Routing System  
✅ Simple Database ORM  
✅ Authentication & Middleware  
✅ Custom Migration System  

---

## 🤝 Contributing
This is just a fun project, and contributions are always welcome! Feel free to report issues, suggest improvements, or just play around with the code.

💬 Drop your comments, experiment, and most importantly... **Keep coding!** 🚀

---

## 📜 License
**This project is open-source and free to use for learning purposes!**

---

Happy Coding! 🎯

