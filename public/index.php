<?php

use app\core\Application;

require_once dirname(__DIR__).'/vendor/autoload.php';

// Create an instance of application
$app = new Application();

// Define routes
$app->router->get('/', function (){
    return 'Hello world';
});

// Run application
$app->run();