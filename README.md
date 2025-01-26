# LEAD GENERATOR APP

### Installing app

via HTTP: 
```
git clone https://github.com/worldWarmWorm/lead-generator-php.git
```

via SSH:
```
git clone git@github.com:worldWarmWorm/lead-generator-php.git
```

### How to use

Up docker containers with build
```
docker compose up -d --build
```
Open terminal in container ```php-cli```
```
docker exec -it php-cli sh
```
Start lead's generator
```
php index.php
```

If you want to watch remaining in runtime execute command ```tail -f log/leads.txt``` inside  ```php-cli``` container

After generation is complete you may check you new leads in file ```/log/leads.txt```

To stop ```index.php``` or finish work with app run
```
docker compose down -v
```

### Congratulations! It was great.