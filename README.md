# Takenncs Framework

<div align="center">
    <img src="https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php"/>
    <img src="https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge"/>
    <img src="https://img.shields.io/badge/Version-1.0.0-blue?style=for-the-badge"/>
</div>

<p align="center">
    <b>Modern PHP framework with beautiful UI, built-in authentication, and developer-friendly features</b>
</p>

---

## ✨ Features

- 🚀 Simple Routing  
- 📦 MVC Architecture  
- 🎨 Modern UI (Tailwind CSS + Dark Mode)  
- 🔒 Built-in Authentication  
- 📱 Fully Responsive  
- 🌙 Light / Dark Mode Toggle  
- ⚡ Lightweight & Fast  
- 🛠 Developer Friendly  

---

## 📋 Requirements

- PHP 8.0+
- MySQL 5.7+ (optional)
- Apache/Nginx with mod_rewrite
- Composer (optional)

---

# 🚀 Quick Installation

## Option 1: Direct Download

### 1. Clone Repository

```bash
git clone https://github.com/takenncs/framework.git my-app
```

### 2. Navigate Into Project

```bash
cd my-app
```

### 3. Point Web Server To Public Folder

Set your document root to:

```text
/my-app/public
```

### 4. Open In Browser

```text
http://localhost/my-app
```

---

## Option 2: Using Composer

```bash
composer create-project takenncs/framework my-app
```

---

# ⚙️ Configuration

Edit the file:

```text
app/Core/Config.php
```

Example configuration:

```php
private function __construct()
{
    $this->config = [
        'app' => [
            'name' => 'Takenncs Framework',
            'env' => 'development',
            'debug' => true,
            'url' => 'http://localhost',
            'base_path' => '/my-app',
            'timezone' => 'Europe/Tallinn',
        ],
    ];
}
```

---

# 🗄 Database Setup (Optional)

### Create Database

```sql
CREATE DATABASE framework;
```

### Create Users Table

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Update your database credentials inside `Config.php`.

---

# 📁 Project Structure

```text
my-app/
├── app/
│   ├── Controllers/
│   ├── Core/
│   ├── Middleware/
│   ├── Models/
├── public/
│   └── index.php
├── routes/
│   └── web.php
├── views/
│   ├── layouts/
│   ├── components/
│   ├── auth/
│   └── dashboard/
└── storage/
```

---

# 🎨 Available Routes

| URL | Description | Access |
|-----|------------|--------|
| `/` | Home | Public |
| `/about` | About | Public |
| `/docs` | Documentation | Public |
| `/login` | Login | Guest |
| `/register` | Register | Guest |
| `/dashboard` | Dashboard | Auth |
| `/profile` | Profile | Auth |
| `/settings` | Settings | Auth |
| `/admin` | Admin Panel | Admin |

---

# 🔧 Usage Examples

## Create Route

Add inside `routes/web.php`:

```php
$router->get('/contact', 'ContactController@show');
$router->post('/contact', 'ContactController@send');
```

---

## Create Controller

Create `app/Controllers/ContactController.php`:

```php
<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;

class ContactController extends Controller
{
    public function show()
    {
        View::layout('app');
        $this->view('contact');
    }

    public function send()
    {
        $_SESSION['_flash']['success'] = 'Message sent!';
        header('Location: /contact');
        exit;
    }
}
```

---

# 🔐 Authentication

```php
// Check if user is logged in
if (\App\Core\Auth::check()) {
    echo "User is logged in";
}

// Get current user
$user = \App\Core\Auth::user();

// Get user ID
$id = \App\Core\Auth::id();
```

---

# 💬 Flash Messages

```php
// Set flash message
\App\Core\Session::flash('success', 'Operation successful!');

// Get flash message
$message = \App\Core\Session::flash('success');
```

---

# 🎨 UI Components

## Button

```php
<?= \App\Core\UI::component('button', [
    'text' => 'Save',
    'icon' => 'save'
]) ?>
```

## Card

```php
<?= \App\Core\UI::component('card', [
    'title' => 'User Info',
    'icon' => 'user',
    'slot' => '<p>Name: John Doe</p>'
]) ?>
```

## Input

```php
<?= \App\Core\UI::component('input', [
    'type' => 'email',
    'name' => 'email',
    'label' => 'Email Address',
    'required' => true
]) ?>
```

## Badge

```php
<?= \App\Core\UI::component('badge', [
    'text' => 'Admin',
    'type' => 'purple'
]) ?>
```

## Alert

```php
<?= \App\Core\UI::component('alert', [
    'type' => 'success',
    'message' => 'Operation successful!'
]) ?>
```

---

# 🌙 Dark Mode

Theme is stored in cookie:

```php
$theme = $_COOKIE['theme'] ?? 'light';
```

---

# 🚀 Deployment

1. Upload files to your server  
2. Update config:

```php
'url' => 'https://yourdomain.com',
'base_path' => '',
```

3. Set permissions:

```bash
chmod -R 755 storage/
chmod 644 public/index.php
```

4. Point your web server to the `/public` directory

---

# 🤝 Contributing

```bash
git checkout -b feature/AmazingFeature
git commit -m "Add AmazingFeature"
git push origin feature/AmazingFeature
```

Then open a Pull Request.

---

# 📝 License

MIT License

---

# 🙏 Acknowledgments

- Tailwind CSS  
- Font Awesome  
- Inter Font  

---

# 📞 Support

GitHub Issues:  
https://github.com/takennncs/php-framework/issues

---

<div align="center">
<b>Made with ❤️ by Takenncs</b>
</div>
