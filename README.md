# hotel2

Run This project using `docker-compose` command

```sh
docker-compose up -d --no-deps
# and run this command to create database and initial data
docker exec xampp-server /opt/lampp/bin/mysql -uroot -e "create database db_hotel" 
docker exec xampp-server /opt/lampp/bin/mysql -uroot db_hotel < ./mysql/data/db_hotel.sql
```

## Open your project

When you fire the command above you can open your project on:
- Web App: `http://<your-ip-or-localhost>:41062/www/app/index.php`
- REST API: `http://<your-ip-or-localhost>:41062/www/api/index.php`
- phpMyAdmin: `http://<your-ip-or-localhost>:41062/phpmyadmin`

### ssh connection
```sh
ssh root@<your-ip-or-localhost> -p 41061
```

### get a shell terminal inside your container
```sh
docker exec -ti <container-name> bash
```
