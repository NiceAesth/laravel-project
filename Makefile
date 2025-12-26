.PHONY: dev migrate seed install clear

dev:
	@echo "Starting Laravel + Vite..."
	@trap 'kill 0' SIGINT; \
	php artisan serve & \
	npm run dev

migrate:
	php artisan migrate

seed:
	php artisan migrate:fresh --seed

install:
	php composer install
	npm install
	cp .env.example .env || true
	php artisan key:generate
	php artisan migrate --seed
	@echo "Please update your .env file with the correct settings."

clear:
	php artisan optimize:clear
