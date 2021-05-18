<?php


namespace app\services;


use app\models\ContactForm;
use impossible\phpmvc\Request;

/**
 * Class ContactService
 * @package app\services
 */
class ContactService
{
    /**
     * Save contact validated data from
     * request and return its result
     * @param ContactForm $contactForm
     * @param Request $request
     * @return bool
     */
    public function save(ContactForm $contactForm, Request $request): bool
    {
        // Load data to model
        $contactForm->loadData($request->getBody());
        // Return the result of saving and validation
        return $contactForm->validate() && $contactForm->save();
    }
}