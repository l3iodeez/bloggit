## Bloggit Web App

This is a laravel app built using SQLite3. It provides Laravel based authentication
and the ability to create posts with attached links and make comments on those links.


### Setup
1. composer update
2. touch database/database.sqlite
2. php artisan migrate
3. php artisan db:seed
4. php -S localhost:8888 -t public
5. visit localhost:8888 in browser
