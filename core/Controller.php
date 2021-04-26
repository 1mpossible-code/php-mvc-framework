<?php


namespace app\core;


/**
 * Base Controller Class
 * @package app\core
 */
class Controller
{
    /**
     * Layout variable
     * @var string
     */
    public string $layout = 'main';
    /**
     * Render specified view with specified params if available
     * @param string $view
     * @param array $params
     * @return array|false|string|string[]
     */
    public function render(string $view, array $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    /**
     * Changes the current layout to specified
     * @param string $layout
     */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

}