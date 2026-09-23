# EZE POST

Laravel web application for the EZE POST secure file transfer project.

PHP, MySQL 8, and Mailpit run in Docker. You do **not** need PHP, Composer, or Node installed on your laptop.

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) running (whale icon in the tray)
- Git

## First-time setup

```powershell
git clone <repo-url>
cd eze-post02
Copy-Item .env.example .env
```

Install PHP packages **inside Docker** (no local PHP):

```powershell
docker run --rm -v ${PWD}:/opt -w /opt laravelsail/php84-composer:latest composer install --ignore-platform-reqs
```

Start the stack and prepare Laravel:

```powershell
$env:WWWUSER = '1000'
$env:WWWGROUP = '1000'
docker compose up -d --build
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test php artisan migrate --seed
docker compose exec laravel.test npm install
docker compose exec laravel.test npm run build
```

On macOS or Linux you can use `./vendor/bin/sail` instead of `docker compose`. On **Windows PowerShell / Git Bash, do not use Sail** — it exits with `Unsupported operating system`. Use `docker compose` or `.\sail.ps1`.

## Every day

```powershell
docker compose up -d
```

| What | URL / connection |
|---|---|
| Website | http://localhost |
| Mailpit (dev inbox) | http://localhost:8025 |
| MySQL | `127.0.0.1:3306` · database `eze_post` · user `sail` · password `password` |

Useful commands:

```powershell
docker compose exec laravel.test php artisan migrate --seed
docker compose exec laravel.test php artisan test
docker compose exec laravel.test php artisan tinker
docker compose logs -f
docker compose stop
```

Or the helper in this folder:

```powershell
.\sail.ps1 up
.\sail.ps1 artisan migrate --seed
.\sail.ps1 test
.\sail.ps1 logs -f
.\sail.ps1 stop
```

## What each container is

| Service | Role |
|---|---|
| `laravel.test` | Laravel / PHP 8.5 web app |
| `mysql` | MySQL 8.4 database `eze_post` |
| `mailpit` | Catches outgoing mail in development |

Never commit `.env`. Commit `.env.example`. `vendor/` is installed on each machine with Composer inside Docker.

## Demo Accounts

### Admin

```text
Email: admin@ezepost.local
Password: Admin123!
```

### Customer

```text
Email: customer@example.com
Password: Password123!
```

## Main Features

- Individual and Organisation registration
- Login and logout
- Customer dashboard
- Transfer records
- PDF account summary
- Pricing and subscription structure
- Admin dashboard
- Plan management
- Stripe integration structure
- Automated tests

## Windows notes

- Keep Docker Desktop running. If the site dies after a reboot, run `docker compose up -d` again.
- The first page load can take several seconds because the project sits on the Windows filesystem. That is expected.
- If port 80 is already in use, set `APP_PORT=8080` in `.env` and open http://localhost:8080.
- If port 3306 is already in use, set `FORWARD_DB_PORT=3307` in `.env`.
