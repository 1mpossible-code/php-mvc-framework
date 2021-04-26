<?php


namespace app\controllers;


use app\core\Controller;

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