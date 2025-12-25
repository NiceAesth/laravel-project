.PHONY: serve vite dev stop

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
