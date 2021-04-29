<?php

use app\controllers\ContactController;
use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\RegisterController;
use app\core\Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

// Create an instance of application
$app = new Application(dirname(__DIR__), $config);

// Define routes
// Homepage
$app->router->get('/', [HomeController::class, 'index']);

// Contact
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'store']);

// Login
$app->router->get('/login', [LoginController::class, 'index']);
$app->router->post('/login', [LoginController::class, 'store']);

// Register
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);

// Run application
$app->run();