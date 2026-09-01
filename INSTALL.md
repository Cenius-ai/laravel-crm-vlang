# INSTALL.md

1. **Prerequisites**  
   Ensure you have the following installed:
   - PHP 8.2 or later (with `sqlite3` extension enabled)
   - Composer

2. **Get the code**  
   Clone the repository or download the source code.
   ```bash
   git clone <repository-url>
   cd laravel-crm
   ```

3. **Install dependencies**  
   ```bash
   composer install
   ```

4. **Environment setup**  
   Copy the example environment file and edit as needed:
   ```bash
   cp .env.example .env
   ```
   Ensure the following variables are set:
   - `DB_CONNECTION=sqlite`
   - `APP_ENV=local`
   - `APP_DEBUG=true`
   No database credentials are required for SQLite.

5. **Database migration and seeding**  
   Run migrations and seed the database with 10 demo customers:
   ```bash
   php artisan migrate --seed
   ```

6. **Start the development server**  
   ```bash
   php artisan serve
   ```
   The app will be accessible at `http://localhost:8000` (or the port you configured via `PORT`).

7. **Run tests (optional)**  
   ```bash
   php artisan test
   ```

8. **Production build**  
   No dedicated production build command is provided. For production, ensure `APP_ENV=production`, run `composer install --no-dev`, and set a web server document root to `public/`.

9. **Troubleshooting**  
   - *Missing .env file*: ensure `cp .env.example .env` was run.
   - *Write permissions*: `storage/` and `bootstrap/cache/` must be writable by the web server.
   - *SQLite not found*: verify the `php-sqlite3` extension is enabled (`php -m | grep sqlite`).
   - *Composer memory limit*: increase with `COMPOSER_MEMORY_LIMIT=-1 composer install`.