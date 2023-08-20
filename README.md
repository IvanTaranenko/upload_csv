docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
docker system prune -a



docker-compose build
docker-compose build --no-cache



To start both services: docker-compose up -d
To stop both services: docker-compose down

docker ps -a -q
