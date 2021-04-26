<?php


namespace app\controllers;


use app\core\Controller;

/**
 * Class ContactController
 * @package app\controllers
 */
class ContactController extends Controller
{
    /**
     * Show contact page
     * @return array|false|string|string[]
     */
    public function index()
    {
        return $this->render('contact');
    }

    /**
     * Handle the data from contact's page request
     * @return string
     */
    public function store()
    {
        return 'handling submitted data';
    }

}