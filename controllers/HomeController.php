<?php


namespace app\controllers;


use impossible\phpmvc\Controller;

/**
 * Class HomeController
 * @package app\controllers
 */
class HomeController extends Controller
{
    /**
     * Show homepage
     * @return array|false|string|string[]
     */
    public function index()
    {
        return $this->render('home');
    }
}