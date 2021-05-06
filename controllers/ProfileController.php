<?php


namespace app\controllers;


use impossible\phpmvc\Controller;
use impossible\phpmvc\middlewares\AuthMiddleware;

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