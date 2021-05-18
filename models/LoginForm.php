<?php


namespace app\models;


use impossible\phpmvc\Application;
use impossible\phpmvc\Model;

/**
 * Class LoginForm
 * @package app\models
 */
class LoginForm extends Model
{
    /**
     * @var string
     */
    public string $email = '';
    /**
     * @var string
     */
    public string $password = '';

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * Login user
     * @return bool
     */
    public function login(): bool
    {
        // Find user with specified email
        $user = User::findOne(['email' => $this->email]);
        // Add error if user is not exists
        if (!$user) {
            // Add error to field email
            $this->addError('email', 'User does not exists with this email: {email}', [
                'email' => $this->email,
            ]);
            // Return false if user email is invalid
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            // Add error to field password
            $this->addError('password', 'Password is not valid. Try again');
            // Return false if user password is invalid
            return false;
        }
        // Login user and return the result of login
        return Application::$app->login($user);
    }

    /**
     * @inheritDoc
     * @return string[]
     */
    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}