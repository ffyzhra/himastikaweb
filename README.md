# HIMASTIKA Web App

Website for **HIMASTIKA** (Himpunan Mahasiswa Teknik Informatika, Esa Unggul University): a public profile of the student association plus an admin panel for managing members, registrations, work programs and announcements.

Built with **CodeIgniter 3**, PHP and MySQL.

## Features

**Public site**
- Association profile, vision & mission, divisions and board members
- Work programs (*program kerja*) already running
- Online member registration with KRS/KHS upload and validation
- Feedback form for each division

**Admin panel**
- Member management (CRUD)
- Review and approve new registrations
- Work program and announcement management
- To-do list for association tasks
- User and role management, passwords hashed with bcrypt

## Tech stack

| Layer    | Tools                               |
| -------- | ----------------------------------- |
| Backend  | PHP, CodeIgniter 3 (MVC)            |
| Database | MySQL / MariaDB                     |
| Frontend | HTML, CSS, JavaScript, Tailwind CSS |

## Project structure

```
application/
├── controllers/   # Anggota, Pendaftaran, Proker, Informasi, Todo, User, Login, ...
├── models/
└── views/
assets/            # logos and static images
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
4. Open `http://localhost/himastika/`.

**Demo login (local only):** `admin` / `admin123`. Change it right after installing.

> All member and registration data in `himastika_db.sql` is dummy data.

## Author

**Fayza Azzahra**, fullstack developer · [GitHub](https://github.com/ffyzhra) · [LinkedIn](https://www.linkedin.com/in/ffyzhra)
