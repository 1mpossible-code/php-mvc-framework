<?php

use app\core\Application;

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// Load .env file from root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Create config with information
// from .env
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

// Create an instance of application
$app = new Application(__DIR__, $config);

// Apply migrations
$app->db->applyMigrations();
