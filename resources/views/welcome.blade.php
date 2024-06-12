<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./images/logo.png" type="image/png">
    @vite(['resources/css/app.css','resources/css/header.css','resources/css/chat.css'])
    <title>Bikey</title>
</head>
<body>
    @include('header-footer.header')
    @include('features.chat.chat')
    <div class="bg-red-600">
        hello world
    </div>
</body>
</html>