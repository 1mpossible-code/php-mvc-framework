<?php


namespace app\models;


use app\core\DbModel;

class ContactForm extends DbModel
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED, [self::RULE_MAX, 'max' => 255]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Subject',
            'email' => 'Email',
            'body' => 'Body',
        ];
    }

    public function tableName(): string
    {
        return 'contacts';
    }

    public function attributes(): array
    {
        return ['subject', 'email', 'body'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }
}