#!/bin/bash

echo "=== Initializing MariaDB and Laravel ==="

for i in {1..40}; do
    if mariadb -u root -e "SELECT 1;" >/dev/null 2>&1; then
        echo "MariaDB connection established."
        break
    fi
    sleep 1
done

echo "Setting up database and privileges..."
mariadb -u root <<EOF
CREATE DATABASE IF NOT EXISTS \`test_web_hi\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'ridanxd'@'localhost' IDENTIFIED BY 'ridanxd';
CREATE USER IF NOT EXISTS 'ridanxd'@'127.0.0.1' IDENTIFIED BY 'ridanxd';
CREATE USER IF NOT EXISTS 'ridanxd'@'%' IDENTIFIED BY 'ridanxd';
GRANT ALL PRIVILEGES ON \`test_web_hi\`.* TO 'ridanxd'@'localhost';
GRANT ALL PRIVILEGES ON \`test_web_hi\`.* TO 'ridanxd'@'127.0.0.1';
GRANT ALL PRIVILEGES ON \`test_web_hi\`.* TO 'ridanxd'@'%';
FLUSH PRIVILEGES;
EOF

cd /var/www/html

echo "Running Laravel artisan setup..."
php artisan package:discover --ansi || true
php artisan filament:upgrade || true
php artisan storage:link || true
php artisan migrate --force || true

USER_COUNT=$(mariadb -u ridanxd -pridanxd test_web_hi -se "SELECT COUNT(*) FROM users;" 2>/dev/null || echo "0")
if [ "$USER_COUNT" = "0" ] || [ -z "$USER_COUNT" ]; then
    echo "Seeding initial database data..."
    php artisan db:seed --force || true
else
    echo "Database has $USER_COUNT users, skipping seeder."
fi

php artisan optimize:clear || true
echo "=== Initialization Complete ==="
