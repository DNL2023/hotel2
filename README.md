# hotel2

Run This project using `docker-compose` command

```sh
docker-compose up -d --no-deps
```

## Open your project

When you fire the command above you can open your project on:
- Web App: `http://<your-ip-or-localhost>:41062/www/index.php`
- phpMyAdmin: `http://<your-ip-or-localhost>:41062/phpmyadmin`

### ssh connection
```sh
ssh root@<your-ip-or-localhost> -p 41061
```

### get a shell terminal inside your container
```sh
docker exec -ti <container-name> bash
```
