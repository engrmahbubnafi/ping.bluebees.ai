# Domain Ping Monitor by BlueBees AI

Domain Ping Monitor is a web app for monitoring all the domain connections of X-Index Companies as routine work, developed by BlueBees AI.

## Installation and Usage

1. Install `composer`.
```bash
composer install
```

2. Copy `.env.example` file to `.env` file.
```bash
cp .env.example .env
```

3. Generate key in the `.env` file.
```bash
php artisan key:generate
```

4. Create a database in phpMyAdmin named as the database name mentioned in the `.env` file.

5. Migrate (and seed) all the migration files (and seeders) in the database.
```bash
php artisan migrate --seed
```

6. Install `npm`.
```bash
npm install
```

7. Run `watch`:
```bash
npm run watch
```