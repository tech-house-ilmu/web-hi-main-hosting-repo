#!/bin/bash
set -e

echo "=== Starting Container Initialization ==="

# Ensure directories exist
mkdir -p /var/run/mysqld /var/log/supervisor /var/log/nginx
chown -R mysql:mysql /var/run/mysqld /var/lib/mysql
chmod 777 /var/run/mysqld

# Ensure storage directories exist and are writable
mkdir -p /var/www/html/storage/framework/{sessions,views,cache/data} /var/www/html/storage/logs
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Initialize MariaDB data directory if not initialized
if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "Initializing MariaDB data directory..."
    mariadb-install-db --user=mysql --datadir=/var/lib/mysql
fi

# Start MariaDB temporarily for initialization and migrations
echo "Starting temporary MariaDB..."
/usr/bin/mysqld_safe --datadir=/var/lib/mysql &
MARIADB_PID=$!

echo "Waiting for MariaDB to be ready..."
for i in {1..30}; do
    if mariadb-admin ping --silent 2>/dev/null; then
        echo "MariaDB is ready."
        break
    fi
    sleep 1
done

echo "Configuring database and user..."
mariadb -u root <<EOF
CREATE DATABASE IF NOT EXISTS \`test_web_hi\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'ridanxd'@'localhost' IDENTIFIED BY 'ridanxd';
CREATE USER IF NOT EXISTS 'ridanxd'@'127.0.0.1' IDENTIFIED BY 'ridanxd';
CREATE USER IF NOT EXISTS 'ridanxd'@'%' IDENTIFIED BY 'ridanxd';
GRANT ALL PRIVILEGES ON \`test_web_hi\`.* TO 'ridanxd'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON \`test_web_hi\`.* TO 'ridanxd'@'127.0.0.1' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON \`test_web_hi\`.* TO 'ridanxd'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EOF

echo "Running Laravel Artisan commands..."
cd /var/www/html

# Storage symlink
php artisan storage:link || true

# Run migrations
php artisan migrate --force

# Seed database if users table is empty
USER_COUNT=$(mariadb -u ridanxd -pridanxd test_web_hi -se "SELECT COUNT(*) FROM users;" 2>/dev/null || echo "0")
if [ "$USER_COUNT" = "0" ] || [ -z "$USER_COUNT" ]; then
    echo "Seeding database with initial data..."
    php artisan db:seed --force
else
    echo "Database already has $USER_COUNT user(s), skipping seed."
fi

php artisan optimize:clear

# Stop temporary MariaDB so supervisord can manage it cleanly
echo "Stopping temporary MariaDB..."
mariadb-admin shutdown
wait $MARIADB_PID 2>/dev/null || true

echo "Starting Supervisor to manage all processes..."
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
