<?php
require __DIR__ . '/../views/headers/navbar.php';
require __DIR__ . '/../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../views');



$router = new \App\Route\Router();

$router
    ->get('/', [App\PageControllers\HomeController::class, 'index'])
    ->get('/dashboard', [App\PageControllers\DashboardController::class, 'store'])
//    ->get('/', [App\PageControllers\HomeController::class, 'insert'])
    ->post('/dashboard', [App\PageControllers\DashboardController::class, 'store'])
    ->get('/source', [App\PageControllers\SourceController::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI'],  $_SERVER['REQUEST_METHOD']);