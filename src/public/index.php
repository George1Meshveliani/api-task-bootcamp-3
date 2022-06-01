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

try {
    $db = new PDO('mysql:host=db;dbname=favorite_shows_database', 'root', 'changeme');

    $name = "TV show";
    $channel = "BBC";

    $query = 'INSERT INTO shows_list (name, channel)
              VALUES (:name, :channel)';
    $id_query = 'SELECT * FROM shows_list WHERE id =';

    $stmt = $db->prepare($query);

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':channel', $channel);

    $stmt->execute();

    $id = (int) $db->lastInsertId();

    $show = $db->query($id_query . $id)->fetch();

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

$router = new \App\Route\Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'update'])
    ->post('/', [App\Controllers\HomeController::class, 'store'])
    ->get('/source', [App\Controllers\SourceController::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);