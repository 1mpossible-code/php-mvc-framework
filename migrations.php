<?php

use impossible\phpmvc\Application;
use app\models\User;

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Load .env file from root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create config with information
// from .env
$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

// Create an instance of application
$app = new Application(__DIR__, $config);

// Process up, down and fresh arguments
// else display help
if ($argv[1] === 'up') {
    $app->db->applyMigrations();
} else if ($argv[1] === 'down') {
    $app->db->destroyMigrations();
} else if ($argv[1] === 'fresh') {
    $app->db->freshMigrations();
} else {
    echo "PHP MVC Framework".PHP_EOL.PHP_EOL;
    echo "MIGRATIONS".PHP_EOL.PHP_EOL;
    echo "Usage:".PHP_EOL;
    echo "  command [arguments]".PHP_EOL.PHP_EOL;
    echo "Available commands:".PHP_EOL;
    echo "  up\t\t Apply migrations".PHP_EOL;
    echo "  down\t\t Destroy migrations".PHP_EOL;
    echo "  fresh\t\t Make fresh migrations".PHP_EOL;
}
