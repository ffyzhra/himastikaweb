# HIMASTIKA Web App

Website for **HIMASTIKA** (Himpunan Mahasiswa Teknik Informatika, Esa Unggul University): a public profile of the student association plus an admin panel for managing members, registrations, work programs and announcements.

Built with **CodeIgniter 3**, PHP and MySQL.

## Features

**Public website** (`/`)
- Landing page with a photo slideshow, animated counters, division cards, a scrolling board-member strip, work programmes, gallery and announcements, all pulled live from the database
- Board page (`/pengurus`) and a page per division (`/divisi/<slug>`) with member photos
- Work programme list and detail pages (`/program-kerja`) with cover photo and documentation
- Staff Intern page (`/staff-intern`) and photo gallery (`/galeri`) with filters and a lightbox
- Scroll animations that respect the "reduce motion" setting
- Online member registration (`/daftar`) with KRS/KHS upload and a thank-you page
- Responsive layout for phones and desktops

**Admin panel** (`/login`)
- Dashboard with totals, cabinet progress, latest registrants and announcements
- Member management with search, division filter and photo upload
- Staff Intern management with photo upload
- Documentation (gallery) upload, optionally linked to a work programme
- Review registrations: accept, reject or delete, view uploaded files
- Work programmes with cover photo and a one-click "done" switch
- Announcements and a to-do list for the board
- Every admin page requires login; passwords hashed with bcrypt

## Tech stack

| Layer    | Tools                               |
| -------- | ----------------------------------- |
| Backend  | PHP, CodeIgniter 3 (MVC)            |
| Database | MySQL / MariaDB                     |
| Frontend | HTML, CSS, vanilla JavaScript        |

## Project structure

```
application/
├── core/MY_Controller.php   # Admin_Controller: login guard + shared layout
├── controllers/             # Home (public), Dashboard, Anggota, Intern, Dokumentasi, Pendaftaran, Proker, Informasi, Todo, Login
├── config/himastika.php     # cabinet profile, vision/mission, division descriptions
├── helpers/ui_helper.php    # icons, initials, Indonesian dates, photo URLs
├── models/
└── views/
    ├── layouts/             # admin + public header/footer
    ├── home/                # public pages (landing, pengurus, divisi, proker, intern, galeri)
    ├── partials/            # person and work-programme cards
    └── ...
assets/
├── css/app.css              # design system (no CSS framework needed)
├── js/app.js                # animations, slideshow, lightbox, filters, admin helpers
└── img/                     # anggota/, intern/, divisi/, proker/, hero/ photos
uploads/           # uploaded files (ignored by git)
himastika_db.sql   # database schema + dummy seed data
```

## Running locally (Laragon / XAMPP)

1. Clone into your web root (`C:/laragon/www` or `C:/xampp/htdocs`):
   ```bash
   cd C:/laragon/www
   git clone https://github.com/ffyzhra/himastikaweb.git himastika
   ```
2. Create a database named `himastika_db` in phpMyAdmin and import `himastika_db.sql`.
3. Check the settings in `application/config/database.php` (default: `root`, no password). `base_url` is detected automatically.
4. Open `http://himastika.test/` (Laragon) or `http://localhost/himastika/` for the public site, and add `/login` for the admin panel.

> Updating from an older version? Re-import `himastika_db.sql`: it adds the `foto` columns and the `intern` and `galeri` tables.

**Demo login (local only):** `admin` / `admin123`. Change it right after installing.

> `himastika_db.sql` contains the 2024/2025 board (Kabinet Sinergi Harmoni) with names, NIM, position, division and photo only, **no phone numbers or emails**. Registration rows are dummy data.

## Author

**Fayza Azzahra**, fullstack developer · [GitHub](https://github.com/ffyzhra) · [LinkedIn](https://www.linkedin.com/in/ffyzhra)
