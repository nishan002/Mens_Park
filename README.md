====================================================
project installation guidelines
====================================================

1. Download Men's Park from https://github.com/nishan002/Mens_Park/tree/master.
2. From Men's Park folder run 'composer install'.
3. run 'npm install'. (optional)
4. From Men's Park folder copy '.env.example' and create new '.env' file or run 	'cp .env.example .env'.
5. Edit '.env' file and change to DB_DATABASE=mens_park.
6. Create database from phpmyadmin with name 'mens_park' then go to import choose 'mens_park.sql' which you can find in the "SQL_File" folder.
7. php artisan key:generate.
8. php artisan migrate
9. php artisan serve.

10. Go to Login Page from menu bar and use below information as email and password-

email: md.nishanahmed14@gmail.com
password: nishan123
