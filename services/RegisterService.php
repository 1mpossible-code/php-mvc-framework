<?php


namespace app\services;


use app\models\LoginForm;
use app\models\User;
use impossible\phpmvc\Application;
use impossible\phpmvc\Request;

/**
 * Class RegisterService
 * @package app\services
 */
class RegisterService
{
    /**
     * Register new user with
     * validated data from request
     * and return the result
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function register(User $user, Request $request): bool
    {
        // Fulfill the model with the data from request
        $user->loadData($request->getBody());
        return $user->validate() && $user->save();
    }
}