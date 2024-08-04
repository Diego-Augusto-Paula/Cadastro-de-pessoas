BUILD 
composer install 
//--ignore-platform-req=ext-mbstring
//composer install --ignore-platform-reqs

sudo apt install php7.4-sqlite3
sudo apt-get install php7.4-curl

criar arquivo database
touch ./database/database.sqlite ( criar banco sqlite local)
php artisan migrate
php artisan serve
    
	
build front
node 20.12
npm run dev
npm run watch

pre requisitos, php 7.4 , composer
