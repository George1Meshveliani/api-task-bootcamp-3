<html>
<head>
    <title>Girls Shows</title>
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

//if (isset($_POST['checkbox'])) {
//    var_dump('true');
//}
//else {
//    var_dump('false');
//}
//var_dump($_POST['checkbox']);

$router
    ->get('/', [App\Controllers\HomeController::class, 'update'])
//    ->get('/', [App\Controllers\HomeController::class, 'insert'])
    ->post('/', [App\Controllers\HomeController::class, 'store'])
    ->get('/source', [App\Controllers\SourceController::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI'],  $_SERVER['REQUEST_METHOD']);