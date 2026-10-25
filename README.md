# HIMASTIKA Web App

Website for **HIMASTIKA** (Himpunan Mahasiswa Teknik Informatika, Esa Unggul University): a public profile of the student association plus an admin panel for managing members, registrations, work programs and announcements.

Built with **CodeIgniter 3**, PHP and MySQL.

## Features

**Public website** (`/`)
- Landing page with the association profile, divisions, work programmes, announcements and board members, all pulled live from the database
- Online member registration (`/daftar`) with KRS/KHS upload and a thank-you page
- Responsive layout for phones and desktops

**Admin panel** (`/login`)
- Dashboard with totals, cabinet progress, latest registrants and announcements
- Member management with search and division filter
- Review registrations: accept, reject or delete, view uploaded files
- Work programmes with a one-click "done" switch
- Announcements and a to-do list for the board
- Every admin page requires login; passwords hashed with bcrypt

## Tech stack

| Layer    | Tools                               |
| -------- | ----------------------------------- |
| Backend  | PHP, CodeIgniter 3 (MVC)            |
| Database | MySQL / MariaDB                     |
| Frontend | HTML, CSS, JavaScript, Tailwind CSS |

## Project structure

```
application/
├── core/MY_Controller.php   # Admin_Controller: login guard + shared layout
├── controllers/             # Home (public), Dashboard, Anggota, Pendaftaran, Proker, Informasi, Todo, Login
├── helpers/ui_helper.php    # icons, initials, Indonesian dates
├── models/
└── views/
    ├── layouts/             # admin + public header/footer
    ├── home/                # public landing page
    └── ...
assets/
├── css/app.css              # design system (no CSS framework needed)
├── js/app.js                # sidebar, confirmations, status switch, mobile menu
└── img/
uploads/           # uploaded files (ignored by git)
himastika_db.sql   # database schema + dummy seed data
```

## Running locally (XAMPP)

1. Clone into your web root:
   ```bash
   cd C:/xampp/htdocs
   git clone https://github.com/ffyzhra/himastikaweb.git himastika
   ```
2. Create a database named `himastika_db` in phpMyAdmin and import `himastika_db.sql`.
3. Check the settings in `application/config/database.php` (default: `root`, no password) and `base_url` in `application/config/config.php` (`http://localhost/himastika/`).
4. Open `http://localhost/himastika/` for the public site and `http://localhost/himastika/login` for the admin panel.

**Demo login (local only):** `admin` / `admin123`. Change it right after installing.

> All member and registration data in `himastika_db.sql` is dummy data.

## Author

**Fayza Azzahra**, fullstack developer · [GitHub](https://github.com/ffyzhra) · [LinkedIn](https://www.linkedin.com/in/ffyzhra)
