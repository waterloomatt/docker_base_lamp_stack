@echo off

FOR /f "tokens=*" %%i IN ('docker ps -q') DO docker stop %%i

docker-compose down
docker-compose up --build