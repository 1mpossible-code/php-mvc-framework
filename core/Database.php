<?php


namespace app\core;


use PDO;

/**
 * Class Database
 * @package app\core
 */
class Database
{
    public PDO $PDO;

    /**
     * Database constructor.
     */
    public function __construct(array $config)
    {
        // Get dsn, user and password from config file
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        // Create new PDO connection
        $this->PDO = new PDO($dsn, $user, $password);
        // Set error mode to exceptions
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}