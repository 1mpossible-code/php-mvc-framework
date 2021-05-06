<?php


namespace app\controllers;


use impossible\phpmvc\Application;
use impossible\phpmvc\Controller;
use impossible\phpmvc\Request;
use impossible\phpmvc\Response;
use app\models\LoginForm;

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
        // Make new login form
        $loginForm = new LoginForm();
        // Set auth layout
        $this->setLayout('auth');
        // Render login page with LoginForm model
        return $this->render('auth/login', [
            'model' => $loginForm,
        ]);
    }

    /**
     * Login if request data is valid
     * @param Request $request
     * @param Response $response
     * @return array|false|string|string[]
     */
    public function store(Request $request, Response $response)
    {
        // Make new login form
        $loginForm = new LoginForm();
        // Load data to login form model
        $loginForm->loadData($request->getBody());
        // If login form data is valid and user
        // logined successfully redirect to homepage
        if ($loginForm->validate() && $loginForm->login()) {
            // Redirect to homepage
            $response->redirect('/');
            exit;
        }
        // Set auth layout
        $this->setLayout('auth');
        // Render login page with LoginForm model
        return $this->render('auth/login', [
            'model' => $loginForm,
        ]);
    }

    /**
     * Logout user
     */
    public function destroy(Request $request, Response $response)
    {
        // Logout user
        Application::$app->logout();
        // Redirect guest to homepage
        $response->redirect('/');
        // Stop application
        exit;
    }
}