# 🚨 Early Warning System (EWS)

Sistem monitoring akademik untuk mendeteksi mahasiswa berisiko dan memberikan peringatan dini.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

## 📋 Tentang Project

Early Warning System adalah aplikasi web berbasis Laravel yang dirancang untuk memantau perkembangan akademik mahasiswa secara real-time. Sistem ini dapat mendeteksi mahasiswa yang berisiko mengalami masalah akademik sejak dini.

### ✨ Fitur Utama

- 🔐 **Authentication System** - Login/Register dengan role-based access
- 📊 **Dashboard Interaktif** - Tampilan berbeda untuk Admin, Dosen, dan Mahasiswa
- ⚠️ **Early Warning Monitoring** - Deteksi mahasiswa berisiko berdasarkan IPK dan SKS
- 👥 **Student Management** - Kelola data mahasiswa lengkap dengan statistik akademik
- 📈 **Academic Tracking** - Pantau IPK, IPS, dan progress SKS
- 🎯 **Role-based Access**:
  - **Admin**: Kelola users, laporan sistem, data master
  - **Dosen**: Monitoring mahasiswa, input nilai, early warning
  - **Mahasiswa**: Lihat progress akademik, early warning pribadi

## 🛠 Teknologi yang Digunakan

- **Backend**: Laravel 10+
- **Frontend**: Tailwind CSS, Blade Templates
- **Database**: MySQL
- **Icons**: Font Awesome 6
- **Authentication**: Laravel Auth

## 🚀 Instalasi & Setup

### Prerequisites
- PHP 8.1+
- Composer
- MySQL 5.7+
- Node.js (untuk assets)

### Step-by-Step Installation

1. **Clone Repository**
   ```bash
   git clone https://github.com/raii99/early-warning-system.git
   cd early-warning-system