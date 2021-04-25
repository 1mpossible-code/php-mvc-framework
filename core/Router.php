<?php


namespace app\core;


/**
 * Class Router
 * @package app
 */
class Router
{
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var array
     */
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        // Define the request
        $this->request = $request;
    }

    /**
     * Define route with 'get' method
     * @param $path
     * @param $callback
     */
    public function get($path, $callback)
    {
        // Add specified callback with specified path
        // to associative array into 'get' routes list
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Do actions depending on the request
     */
    public function resolve()
    {
        // Get requested path
        $path = $this->request->getPath();
        // Get requested method
        $method = $this->request->getMethod();
        // Get callback from routes with the specified method and path
        $callback = $this->routes[$method][$path] ?? false;
        // If callback is not defined echo 'Not found'
        if ($callback === false) {
            echo 'Not found';
            exit;
        }
        // Echo the result of callback
        echo $callback();
    }
}