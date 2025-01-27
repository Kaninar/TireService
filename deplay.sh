composer install

npm install
npm install bootstrap
npm install --save vuex-persist
npm run dev

php artisan migrate
php artisan db:seed

php artisan key:generate

php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Проект задеплоен"