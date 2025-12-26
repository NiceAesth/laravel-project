# Laravel Fintech Project

## Getting Started

To run the project locally, copy the `.env.example` file to `.env` and configure your database settings. Then run the following commands:

```bash
composer install
php artisan migrate --seed
php artisan key:generate
npm install
npm run dev # Do not close this terminal
php artisan serve
```

A makefile is also provided for convenience:

```bash
make dev          # Start both Laravel and Vite servers
make install      # Install dependencies and set up the project
make migrate      # Run migrations
make seed         # Migrate fresh and seed the database
make clear        # Clear caches
```

The option you are likely looking for is `make dev`, which will start both the Laravel and Vite development servers.
Running `make` on its own will run the `dev` target by default.
