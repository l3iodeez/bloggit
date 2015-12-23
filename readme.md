## Bloggit Web App

This is a Laravel app built using SQLite3. It provides Laravel based authentication
and the ability to create posts with attached links and make comments on those links.


### Setup
1. composer update
2. touch database/database.sqlite
3. php -S localhost:8888 -t public
4. visit localhost:8888 in browser


## Database reset
1. php artisan migrate
2. php artisan db:seed
