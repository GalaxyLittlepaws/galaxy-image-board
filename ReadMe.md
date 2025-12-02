# Galaxy Image Board

🚧 **Work In Progress** — A Laravel + Inertia + Vue application for image sharing and curation.

An open-source image board platform with support for galleries, tagging, and social features. Currently in active development with fundamental features being built out.

## Current Status

- [x] Basic project structure (Laravel 11, Inertia, Vue 3, TypeScript, Vite)
- [x] User authentication with Laravel Fortify
- [x] MariaDB database configured for dev
- [ ] Image upload and gallery management
- [ ] Tag system
- [ ] Social features — likes, comments
- [ ] Public/private/unlisted post visibility
- [ ] Registration modes and invite system

## Development Setup

```bash
# Install dependencies
composer install
npm install

# Set up environment (uses local MariaDB by default)
php artisan migrate --seed

# Start dev servers
php artisan serve        # Laravel (http://localhost:8000)
npm run dev             # Vite (hot reload)
```

Then visit `http://localhost:8000` in your browser.

## Admin Setup

Registration is disabled by default. To create the initial admin account:

```bash
php artisan admin:create
```

This will prompt you for email, name, and password.

## Environment Variables (Current Defaults)

These are currently configured for local development with MariaDB:

```env
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=galaxy_image_board
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
MAIL_MAILER=log           # Log emails to console
```

For production or custom setup, update `APP_URL`, `APP_ENV`, and storage/database drivers as needed.

## Project Structure

- `app/` — Laravel models, controllers, middleware, actions
- `resources/js/` — Vue 3 components, pages, layouts, composables (TypeScript)
- `routes/` — Web routes and API endpoints
- `database/` — Migrations and seeders
- `storage/app/private` — Local file storage
- `tests/` — Feature and unit tests

## Contributing

This is an active development project. Feel free to open issues or PRs for bugs, feature ideas, or improvements. Please keep in mind that currently, there is only one core dev and the project is in early stages.

## License

See LICENSE file for details.
