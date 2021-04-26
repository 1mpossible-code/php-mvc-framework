<?php

use app\controllers\ContactController;
use app\core\Application;

require_once dirname(__DIR__).'/vendor/autoload.php';

// Create an instance of application
$app = new Application(dirname(__DIR__));

// Define routes
$app->router->get('/', 'home');
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'store']);

// Run application
$app->run();