How to start the project

docker-compose up -d
docker exec container bash
cp .env.example .env 
&& php artisan key:generate
docker exec container php artisan migrate:fresh --seed
 
