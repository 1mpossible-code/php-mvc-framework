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
     * @var Response
     */
    public Response $response;
    /**
     * @var array
     */
    protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        // Define the request
        $this->request = $request;
        // Define the response
        $this->response = $response;
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
     * Define route with 'post' method
     * @param $path
     * @param $callback
     */
    public function post($path, $callback)
    {
        // Add specified callback with specified path
        // to associative array into 'post' routes list
        $this->routes['post'][$path] = $callback;
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
        // If callback is not defined return 'Not found'
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        // Check if the callback is string; if true render a view
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        // Return the result of callback
        return $callback();
    }

    /**
     * Render specified view with layout
     * @param string $view
     */
    public function renderView(string $view)
    {
        // Get layout content
        $layoutContent = $this->layoutContent();
        // Get view content
        $viewContent = $this->renderOnlyView($view);
        // Replace the slot in layout by view content, then return
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Return the layout main.php as a string
     * @return false|string
     */
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    /**
     * Return the specified view as a string
     * @param string $view
     * @return false|string
     */
    protected function renderOnlyView(string $view)
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

    protected function renderContent(string $viewContent)
    {
        // Get layout content
        $layoutContent = $this->layoutContent();
        // Replace the slot in layout by view content, then return
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
}