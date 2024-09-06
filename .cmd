composer require laravel/breeze
composer require beyondcode/laravel-websockets
composer require react/promise:^2.7
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"
php artisan migrate
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"
PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET, PUSHER_HOST, PUSHER_PORT, PUSHER_SCHEME in .env
php artisan make:migration create_chats_table
php artisan migrate
php artisan breeze:install blade
npm install
php artisan make:controller UserController
php artisan make:event UserStatusEvent
Add broadcast on this file(routes\channels.php)
php artisan make:model Chat
php artisan make:event MessageEvent
php artisan make:event MessageDeleteEvent
php artisan make:event MessageUpdateEvent
php artisan make:mail SendVerificationMail
php artisan make:model Product -m
php artisan make:seeder ProductsTableSeeder
php artisan db:seed --class=ProductsTableSeeder
php artisan make:controller ProductController
@REM app\Providers\AppServiceProvider.php // make changes for use of pagination for globally use
@REM This is for laravel pagination with tailwind
php artisan vendor:publish --tag=laravel-pagination
php artisan make:model UserCart -m