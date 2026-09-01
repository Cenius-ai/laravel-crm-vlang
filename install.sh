#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

echo "=== Cenius CRM — Setup ==="

# 1. Composer install
echo "→ Installing PHP dependencies…"
composer install --no-interaction --prefer-dist --no-progress

# 2. Copy .env if missing
if [ ! -f .env ]; then
    echo "→ Creating .env from .env.example…"
    cp .env.example .env
fi

# 3. Generate APP_KEY (always, for warm-container reuse)
echo "→ Generating application key…"
php artisan key:generate --force

# 4. Create storage directories
echo "→ Creating storage directories…"
mkdir -p storage/framework/views
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/logs
mkdir -p storage/app
mkdir -p bootstrap/cache
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# 5. Ensure SQLite database file exists
echo "→ Setting up SQLite database…"
mkdir -p database
touch database/database.sqlite

# 6. Download fonts (self-hosted, best-effort — won't fail on network issues)
echo "→ Downloading fonts…"
mkdir -p public/fonts

download_font() {
    local family="$1"
    local weight="$2"
    local file="$3"
    if [ -f "public/fonts/${file}" ]; then
        return 0
    fi
    local css_url="https://fonts.googleapis.com/css2?family=${family}:wght@${weight}&display=swap"
    local woff2_url
    woff2_url=$(curl -sS --connect-timeout 8 -H "User-Agent: Mozilla/5.0" "${css_url}" 2>/dev/null \
        | grep -oP 'url\((https://[^)]+\.woff2)\)' | head -1 | sed 's/url(//;s/)//' || true)
    if [ -n "${woff2_url:-}" ]; then
        echo "   Downloading ${file}…"
        if curl -sS --connect-timeout 15 -L -o "public/fonts/${file}" "${woff2_url}" 2>/dev/null; then
            echo "   OK"
        else
            echo "   (download skipped — using system fallback)"
            rm -f "public/fonts/${file}"
        fi
    else
        echo "   (could not resolve ${file} URL — using system fallback)"
    fi
}

# Run font downloads but don't let failures break the install
set +e
download_font "Space+Grotesk" "500" "space-grotesk-500.woff2"
download_font "Space+Grotesk" "600" "space-grotesk-600.woff2"
download_font "Inter+Tight" "400" "inter-tight-400.woff2"
download_font "Inter+Tight" "500" "inter-tight-500.woff2"
set -e

# 7. Run migrations
echo "→ Running database migrations…"
php artisan migrate --force

# 8. Seed demo data
echo "→ Seeding demo customers…"
php artisan db:seed --force

echo ""
echo "=== Setup complete ==="
echo "Run: php artisan serve --host=0.0.0.0 --port=\${PORT:-8000}"
