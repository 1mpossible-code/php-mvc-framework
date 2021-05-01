<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\User;
use function Couchbase\defaultDecoder;

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
        // Fulfill the model with the data from request
        $user->loadData($request->getBody());
        // Set success flash message if the validation is passed and new user is created
        if ($user->validate() && $user->save()) {
            // Set success flash message
            Application::$app->session->setFlash('success', 'User created successfully!');
            // Redirect to homepage
            Application::$app->response->redirect('/');
            exit;
        }
        // Render register page
        $this->setLayout('auth');
        return $this->render('auth/register', [
            'model' => $user,
        ]);
    }
}