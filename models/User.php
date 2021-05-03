<?php


namespace app\models;


use app\core\DbModel;

/**
 * User model
 * @package app\models
 */
class User extends DbModel
{
    /**
     * Status that indicated that user is inactive
     */
    public const STATUS_INACTIVE = 0;
    /**
     * Status that indicated that user is active
     */
    public const STATUS_ACTIVE = 1;
    /**
     * Status that indicated that user is deleted
     */
    public const STATUS_DELETED = 2;

    /**
     * User's name
     * @var string
     */
    public string $name = '';
    /**
     * User's email
     * @var string
     */
    public string $email = '';
    /**
     * User's status
     * @var int
     */
    public int $status = self::STATUS_INACTIVE;
    /**
     * User's password
     * @var string
     */
    public string $password = '';
    /**
     * User's passwordConfirm that
     * must matches password
     * @var string
     */
    public string $passwordConfirm = '';

    /**
     * Save model to database
     * with hashed password
     * @return bool
     */
    public function save(): bool
    {
        // Hash password value
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        // Save with updated password
        return parent::save();
    }

    /**
     * User model's table
     * @return string
     */
    public function tableName(): string
    {
        // Table name
        return 'users';
    }

    /**
     * @inheritDoc
     * @return string[]
     */
    public function attributes(): array
    {
        // Attributes that will
        // be saved to database
        return [
            'name', 'email', 'password'
        ];
    }

    /**
     * @inheritDoc
     * @return array[]
     */
    public function rules(): array
    {
        // Rules for attributes
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => '8'], [self::RULE_MAX, 'max' => '255']],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    /**
     * @inheritDoc
     * @return string[]
     */
    public function labels(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Repeat password',
        ];
    }
}