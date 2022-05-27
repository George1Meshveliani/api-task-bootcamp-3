<html>
<head>
    <title>Users profile</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<ul>
    <li class="navbar"><a href="/">Home</a></li>
    <li class="navbar"><a href="/source">Source</a></li>
</ul>
</body>
</html>

<?php

require __DIR__ . '/../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../views');

$router = new \App\Route\Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'update'])
    ->post('/', [App\Controllers\HomeController::class, 'store'])
    ->get('/source', [App\Controllers\SourceController::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);