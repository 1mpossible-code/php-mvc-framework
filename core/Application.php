<?php


namespace app\core;


/**
 * Main class of application
 * @package app
 */
class Application
{
    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;
    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    /**
     * Main function of application that starts it
     */
    public function run()
    {
        // Router start resolving
        $this->router->resolve();
    }
}