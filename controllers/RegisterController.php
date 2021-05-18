<?php


namespace app\controllers;


use app\services\RegisterService;
use impossible\phpmvc\Application;
use impossible\phpmvc\Controller;
use impossible\phpmvc\Request;
use app\models\User;

/**
 * Class RegisterController
 * @package app\controllers
 */
class RegisterController extends Controller
{
    /**
     * @var RegisterService
     */
    private RegisterService $registerService;

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->registerService = new RegisterService();
    }

    /**
     * Show register page
     * @return array|false|string|string[]
     */
    public function index()
    {
        $registerModel = new User();
        $this->setLayout('auth');
        return $this->render('auth/register', [
            'model' => $registerModel,
        ]);
    }

    /**
     * Register new user
     * @param Request $request
     * @return array|false|string|string[]
     */
    public function store(Request $request)
    {
        // Create an instance of RegisterModel
        $user = new User();
        // Set success flash message if new user is registered successfully
        if ($this->registerService->register($user, $request)) {
            // Set success flash message
            Application::$app->session->setFlash('success', 'User created successfully!');
            // Redirect to homepage
            Application::$app->response->redirect('/');
        }
        // Render register page
        $this->setLayout('auth');
        return $this->render('auth/register', [
            'model' => $user,
        ]);
    }
}