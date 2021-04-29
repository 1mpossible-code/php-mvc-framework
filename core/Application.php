<?php


namespace app\core;


/**
 * Main class of application
 * @package app
 */
class Application
{
    /**
     * @var string
     */
    public static string $ROOT_DIR;
    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Response
     */
    public Response $response;
    /**
     * @var Controller
     */
    public Controller $controller;
    /**
     * Static property that is this class
     * @var Application
     */
    public static Application $app;
    /**
     * @var Database
     */
    public Database $db;

    /**
     * Application constructor.
     */
    public function __construct(string $rootPath, array $config)
    {
        // Root path defining
        self::$ROOT_DIR = $rootPath;
        // Define this as a static property
        self::$app = $this;
        // Create instances
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

        // Create database connection
        $this->db = new Database($config['db']);
    }

    /**
     * Main function of application that starts it
     */
    public function run(): void
    {
        // Router start resolving
        echo $this->router->resolve();
    }
}