.PHONY: serve vite dev stop

migrate:
	php artisan migrate

seed:
	php artisan migrate:fresh --seed

serve:
	php artisan serve

vite:
	npm run dev

dev:
	@echo "Starting Laravel + Vite..."
	@trap 'kill 0' SIGINT; \
	php artisan serve & \
	npm run dev

clear:
	php artisan optimize:clear
