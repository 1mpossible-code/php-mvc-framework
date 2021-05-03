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
     * @param Response $response
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
    public function get($path, $callback): void
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
    public function post($path, $callback): void
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
        $method = $this->request->method();
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
        // Check if the callback is array; if true replace
        // the link to the controller by its instance in
        // callback array and set Application controller param
        if (is_array($callback)) {
            // Set applications controller parameter
            Application::$app->controller = new $callback[0]();
            // Replace link by its instance
            $callback[0] = Application::$app->controller;
        }
        // Return the result of callback
        return $callback($this->request, $this->response);
    }

    /**
     * Render specified view with layout, introduce parameters
     * @param string $view
     * @param array $params
     * @return array|false|string|string[]
     */
    public function renderView(string $view, array $params = [])
    {
        // Get layout content
        $layoutContent = $this->layoutContent();
        // Get view content
        $viewContent = $this->renderOnlyView($view, $params);
        // Replace the slot in layout by view content, then return
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * Write the controller's layout to buffer;
     * return the buffer
     * @return false|string
     */
    protected function layoutContent()
    {
        // Get layout from Application controller parameter
        $layout = Application::$app->controller->layout;
        // Start writing into buffer
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    /**
     * Return the specified view as a string,
     * create new variables from array $params
     * @param string $view
     * @param array $params
     * @return false|string
     */
    protected function renderOnlyView(string $view, array $params)
    {
        // For each element in array $params create a
        // variable with the name as a key of array and
        // value as a value
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        // Start buffering, render the view with the
        // specified name, then return buffer
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

    /**
     * Connect the view with the layout
     * @param string $viewContent
     * @return array|false|string|string[]
     */
    protected function renderContent(string $viewContent)
    {
        // Get layout content
        $layoutContent = $this->layoutContent();
        // Replace the slot in layout by view content, then return
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
}