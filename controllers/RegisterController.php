<?php


namespace app\controllers;


use app\core\Controller;
use app\core\Request;

/**
 * Class RegisterController
 * @package app\controllers
 */
class RegisterController extends Controller
{
    /**
     * Show register page
     * @return array|false|string|string[]
     */
    public function index()
    {
        $this->setLayout('auth');
        return $this->render('auth/register');
    }

    /**
     * Register new user
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        return 'handle submitted data';
    }
}