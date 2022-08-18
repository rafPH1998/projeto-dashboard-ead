How to start the project

docker-compose up -
docker exec container cp .env.example .env && php artisan key:generate
docker exec container php artisan migrate:fresh --seed
