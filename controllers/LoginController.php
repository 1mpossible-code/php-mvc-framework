<?php


namespace app\controllers;


use app\core\Controller;
use app\core\Request;

/**
 * Class LoginController
 * @package app\controllers
 */
class LoginController extends Controller
{
    /**
     * Show login page
     * @return array|false|string|string[]
     */
    public function index()
    {
        $this->setLayout('auth');
        return $this->render('auth/login');
    }

    /**
     * Login if request data is valid
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        return 'handle submitted data';
    }
}