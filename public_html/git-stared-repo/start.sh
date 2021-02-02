docker-compose up -d --build
docker exec stared_repo_php composer install
docker exec stared_repo_php cp .env.example .env

echo "Project installed successfully";
