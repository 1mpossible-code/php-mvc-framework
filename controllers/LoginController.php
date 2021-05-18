<?php


namespace app\controllers;


use app\services\LoginService;
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
     * @var LoginService
     */
    private LoginService $loginService;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->loginService = new LoginService();
    }

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
        // If login is successful, redirect to homepage
        if ($this->loginService->login($loginForm, $request)) {
            // Redirect to homepage
            $response->redirect('/');
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
    public function destroy(Request $request, Response $response): void
    {
        // Logout user
        $this->loginService->logout();
        // Redirect guest to homepage
        $response->redirect('/');
        // Stop application
        exit;
    }
}