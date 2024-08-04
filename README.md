<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

- [Laravel Websocket Documentation](https://beyondco.de/docs/laravel-websockets/getting-started/introduction).

## Laravel Websockets
To install the websockets install the below command
```
composer require beyondcode/laravel-websockets
```
Publish the migration file
```
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"
```
Run the migrations:
```
php artisan migrate
```
Pulish the websocket configuration file
```
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"
```
To start the websocket server
```
http://localhost:8000/laravel-websockets
```
If seen <code style="color: #619deb;">Unhandled promise rejection with TypeError: React\Http\Io\ClientRequestStream::closeError()</code> Error. Then have to change the react/promise version. To fix this run the below command
```
composer require react/promise:^2.7
```
Uncomment this line <code style="color: #619deb;">App\Providers\BroadcastServiceProvider::class</code> from this <code style="color: #619deb;">config\app.php</code> location