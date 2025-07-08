# 🗺️ Pemetaan Wisata GIS

Aplikasi web untuk pemetaan dan pengelolaan data wisata menggunakan Geographic Information System (GIS) yang dibangun dengan Laravel.

## 📋 Prerequisites

Pastikan sistem Anda sudah terinstall:

- **PHP** >= 8.1
- **Composer** 
- **Node.js** & **npm**
- **MySQL** atau database lainnya
- **Git**

## 🚀 Installation

Ikuti langkah-langkah berikut untuk menjalankan aplikasi:

### 1. Clone Repository
```bash
git clone https://github.com/manzadhit/pemetaan-wisata-GIS.git
```

### 2. Masuk ke Directory Project
```bash
cd pemetaan-wisata-GIS
```

### 3. Install Dependencies PHP
```bash
composer install
```

### 4. Install Dependencies JavaScript
```bash
npm install
```

### 5. Setup Environment
```bash
cp .env.example .env
```

### 6. Generate Application Key
```bash
php artisan key:generate
```

### 7. Konfigurasi Database
Buka file `.env` dan sesuaikan konfigurasi database jika ingin menggunakan MySql:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=username_anda
DB_PASSWORD=password_anda
```

### 8. Migrasi Database
```bash
php artisan migrate
```

### 9. Seed Database (Opsional)
```bash
php artisan db:seed
```

## 🎯 Running the Application

Untuk menjalankan aplikasi, buka **2 terminal** dan jalankan perintah berikut:

### Terminal 1 - Laravel Server
```bash
php artisan serve
```

### Terminal 2 - Asset Development
```bash
npm run dev
```

Aplikasi akan berjalan di: `http://localhost:8000`

## 📁 Project Structure

```
pemetaan-wisata-GIS/
├── app/                 # Logic aplikasi
├── database/           # Migrations & Seeders
├── public/             # Asset publik
├── resources/          # Views, CSS, JS
├── routes/             # Route definitions
└── .env                # Environment configuration
```

## 🛠️ Built With

- **Laravel** - PHP Framework
- **MySQL** - Database
- **Bootstrap/Tailwind** - CSS Framework
- **JavaScript** - Frontend Interactivity
- **Leaflet/Google Maps** - Mapping Library

## 👥 Contributing

1. Fork repository ini
2. Buat branch feature (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request


## 📞 Contact

**Developer:** King Sahrul 
**Repository:** [pemetaan-wisata-GIS](https://github.com/sahrulraiya23/wisata-kendari-gis)

---

⭐ Jika project ini membantu Anda, jangan lupa untuk memberikan star!
