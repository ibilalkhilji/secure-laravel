# 🔒 SecureLaravel
![Secure Laravel](banner.png)
![GitHub Issues or Pull Requests](https://img.shields.io/github/issues/ibilalkhilji/secure-laravel)
![GitHub Tag](https://img.shields.io/github/v/tag/ibilalkhilji/secure-laravel?label=version)
![GitHub contributors](https://img.shields.io/github/contributors/ibilalkhilji/secure-laravel)
![GitHub Repo stars](https://img.shields.io/github/stars/ibilalkhilji/secure-laravel)

A lightweight Laravel security enhancement package by **Bilal Khilji** — designed to add advanced licensing, authorization, and integrity protection layers to your Laravel applications.

---

## 🚀 Features

* 🧩 Plug-and-play **Laravel Service Provider**
* 🪪 **License validation and encryption**
* 🖥️ **Machine fingerprinting** support
* 🌐 **IP, domain, and usage tracking**
* 🧱 **Pre-boot protection** for unauthorized copies
* ⚙️ Helper functions for secure key management
* 🪶 Zero configuration — autoloaded via Composer
* 🧩 **Dynamic patch injection** for `Application.php` and `index.php`

---

## 📦 Installation

Require the package via Composer:

```bash
composer require ibilalkhilji/secure-laravel
```

Then run the migrations (**this step is required**):

```bash
php artisan migrate
```

This will create the necessary database tables for license management and usage tracking.

---

## ⚙️ Configuration

No manual configuration or file export is required. The package auto-registers its service provider and uses sensible defaults for most environments.

You can, however, override behavior directly through environment variables or by extending the default classes under `src/`.

Example:

```env
SECURE_LARAVEL_ENDPOINT=https://your-license-server.com
```

---

## 🧩 Dynamic Patch Injection

SecureLaravel allows you to dynamically patch your Laravel core files — like `Application.php` and `index.php` — without modifying them manually.

Simply place your patch files inside the **`Patches`** folder located at the Laravel base path:

```
/basepath/Patches/
    ├── Application.php
    └── index.php
```

At runtime, the package automatically detects and injects these patch files, ensuring seamless updates and rollback safety.

This is particularly useful for:

* Injecting licensing validation before Laravel boot
* Enforcing pre-startup checks for unauthorized copies
* Extending bootstrap logic securely

**Fallback behavior:** If no dynamic patch files are provided in the `Patches` folder, SecureLaravel will fall back to its built-in default implementations (no changes to your core files).

---

## 🧠 Usage

### 1️⃣ Register License

You can register or verify your license key using the helper:

```php
use Ibilalkhilji\\SecureLaravel\\Facades\\SecureLaravel;

SecureLaravel::validateLicense('YOUR-LICENSE-KEY');
```

### 2️⃣ Retrieve Machine Fingerprint

Get a unique hash based on system and environment data:

```php
$fingerprint = SecureLaravel::fingerprint();
```

### 3️⃣ Track Usage

Record usage meta for your application:

```php
SecureLaravel::track([
    'ip' => request()->ip(),
    'user_agent' => request()->userAgent(),
]);
```

---

## 🧰 Helper Functions

| Function                | Description                      |
|-------------------------|----------------------------------|
| `secure_check()`        | Validates if the app is licensed |
| `secure_fingerprint()`  | Returns system fingerprint       |
| `secure_encrypt($data)` | Encrypts data with package key   |
| `secure_decrypt($data)` | Decrypts data securely           |

---

## 🧩 Folder Structure

```
src/
 ├── Facades/
 ├── Http/
 ├── Services/
 ├── Traits/
 ├── Helpers/helpers.php
 └── SecurityServiceProvider.php
```

---

## 🔐 Example Middleware

You can use the provided middleware to protect routes:

```php
Route::middleware(['secure.license'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
```

---

## ‍💻 Author

**Bilal Khilji**
📧 [kbinfo4u@gmail.com](mailto:kbinfo4u@gmail.com)
🌍 [GitHub: ibilalkhilji](https://github.com/ibilalkhilji)

---

## 📜 License

This package is open-sourced software licensed under the [MIT license](LICENSE).

---

## 💡 Notes

If you’re building a SaaS or distributed Laravel product, this package is ideal for embedding robust licensing and usage validation directly into your codebase.

---

### 🧱 Version

**v1.0.4**
