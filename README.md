# Veterinaria

Veterinary clinic management system.

Requirements:
- PHP 7
- MySQL
- Apache

Notes:
- Load 'veterinary_load.sql' to create initial DB structure. This script will create an admin user
  - User: admin
  - Pass: 123

## Docker
Run services (php, mysql).
```sh
$ docker-compose up
```

Connect to DB.
> Password: veterinary
```sh
$ docker-compose run --rm db mysql -p
```
