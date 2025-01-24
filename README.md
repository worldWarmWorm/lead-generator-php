# LEAD GENERATOR APP

### Installing app

via HTTP: 
```
git pull
```

via SSH:
```
git pull
```

### How to use

Let up docker containers
```
docker compose up -d --build
```
As soon as the containers rise, the command ```php index.php``` will be executed automatically. The
```index.php``` is entrypoint. Wait for the command to complete.

If you want to watch remaining in runtime execute command in another one console ```tail -f log/leads.txt```

If you need to stop process just down containers via ```docker compose down -v```

After generation is complete you may check you new leads in file ```/log/leads.txt```

### Congratulations! It was great.