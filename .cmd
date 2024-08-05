php artisan make:component Input
php artisan make:component Button
npm install firebase
php artisan make:component Error
php artisan make:middleware UserLoginCheck
composer require beyondcode/laravel-websockets --with-all-dependencies
composer require react/promise:^2.7
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"
php artisan migrate
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"
PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET, PUSHER_HOST, PUSHER_PORT, PUSHER_SCHEME, BROADCAST_DRIVER in .env
npm install --save-dev laravel-echo pusher-js
Uncomment this line (App\Providers\BroadcastServiceProvider::class) from this location (config\app.php)
php artisan make:model Chat -m
php artisan make:event MessageSentEvent
php artisan make:event UserStatusEvent
php artisan make:controller ChatController