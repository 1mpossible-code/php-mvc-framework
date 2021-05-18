<?php


namespace app\services;


use app\models\LoginForm;
use impossible\phpmvc\Application;
use impossible\phpmvc\Request;

/**
 * Class LoginService
 * @package app\services
 */
class LoginService
{
    /**
     * Validate data from request
     * and login user
     * @param LoginForm $loginForm
     * @param Request $request
     * @return bool
     */
    public function login(LoginForm $loginForm, Request $request): bool
    {
        // Load data to login form model
        $loginForm->loadData($request->getBody());
        // Return the result of user login and its validation
        return $loginForm->validate() && $loginForm->login();
    }

    /**
     * Logout user
     */
    public function logout(): void
    {
        // Logout user
        Application::$app->logout();
    }
}