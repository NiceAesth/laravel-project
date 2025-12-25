# Laravel Fintech Project

## Getting Started

To run the project locally, copy the `.env.example` file to `.env` and configure your database settings. Then run the following commands:

```bash
composer install
php artisan migrate --seed
npm install
npm run dev
php artisan serve
```

A makefile is also provided for convenience:

```bash
make migrate      # Run migrations
make seed         # Migrate fresh and seed the database
make serve        # Start the Laravel development server
make vite         # Start the Vite development server
make dev          # Start both Laravel and Vite servers
make clear        # Clear caches
```

The option you are likely looking for is `make dev`, which will start both the Laravel and Vite development servers.
