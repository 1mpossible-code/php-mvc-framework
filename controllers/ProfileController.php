<?php


namespace app\controllers;


use app\core\Controller;
use app\core\middlewares\AuthMiddleware;

/**
 * Class ProfileController
 * @package app\controllers
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        // Register profile middleware
        $this->registerMiddleware(new AuthMiddleware(['index']));
    }

    /**
     * Render profile page
     * @return array|false|string|string[]
     */
    public function index()
    {
        return $this->render('profile');
    }
}