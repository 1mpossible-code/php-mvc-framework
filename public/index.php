<?php

use app\controllers\ContactController;
use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\ProfileController;
use app\controllers\RegisterController;
use impossible\phpmvc\Application;
use app\models\User;

// Composer autoload
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Load .env file from root directory
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Create config with information
// from .env and userClass value
$config = [
    'userClass' => User::class,
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
$app->router->get('/logout', [LoginController::class, 'destroy']);

// Register
$app->router->get('/register', [RegisterController::class, 'index']);
$app->router->post('/register', [RegisterController::class, 'store']);

// Profile
$app->router->get('/profile', [ProfileController::class, 'index']);

// Run application
$app->run();