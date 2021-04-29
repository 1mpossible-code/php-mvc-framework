<?php

use app\core\Application;
use app\core\MigrationInterface;


/**
 * Create users table
 * Class m0001_create_users_table
 */
class m0001_create_users_table implements MigrationInterface
{
    /**
     * Create new 'users' table
     */
    public function up(): void
    {
        // Get database from Application
        $db = Application::$app->db;
        // Execute SQL statement that creates 'users'
        // table with all necessary columns
        $db->PDO->exec('CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY, 
                email VARCHAR(255) NOT NULL , 
                name VARCHAR(255) NOT NULL , 
                password VARCHAR(512) NOT NULL ,
                status TINYINT NOT NULL DEFAULT 0 , 
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                ) ENGINE = InnoDB;');
    }

    /**
     * Destroy 'users' table
     */
    public function down(): void
    {
        // Get database from Application
        $db = Application::$app->db;
        // Execute SQL statement that
        // deletes 'users' table
        $db->PDO->exec('DROP TABLE users');
    }
}
