## Instrukcija

### Ar Docker
```
git pull https://github.com/denissceluiko/mig-test.git mig-test
cd mig-test/laradock
cp .env.example .env
```
Atvērt `.env` un izmainīt tajā vērtības uz:
```
DATA_PATH_HOST=~/.laradock/mig-test-data
COMPOSE_PROJECT_NAME=mig-test
PHP_VERSION=8.0
```
Tad turpinot konsolē/terminālī
```
docker compose up -d nginx mysql
docker compose exec workspace bash

composer install

npm install
npm run dev

cp .env.example .env
php artisan key:generate
```
Izmainīt `.env` vērtības:
```
DB_CONNECTION=mysql
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret
```

Tālāk: `php artisan migrate`

Tad atvērt [localhost](http://localhost/), vajadzētu strādat.
### Bez Docker

Iepullot `https://github.com/denissceluiko/mig-test.git` webservera root direktorijā

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

./composer.phar install

npm install # Cerams, ka npm ir instalēts
npm run dev

cp .env.example .env
php artisan key:generate
```
Izmainīt `.env` datubāzes vērtības, lai varētu pievienoties esošai datubāzei

Tālāk: `php artisan migrate`

Tad atvērt [localhost](http://localhost/), vajadzētu strādat.
