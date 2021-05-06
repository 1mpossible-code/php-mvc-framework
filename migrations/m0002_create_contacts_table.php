<?php

use app\core\Application;
use app\core\MigrationInterface;


/**
 * Create contacts table
 * Class m0001_create_users_table
 */
class m0002_create_contacts_table implements MigrationInterface
{
    /**
     * Create new 'contacts' table
     */
    public function up(): void
    {
        // Get database from Application
        $db = Application::$app->db;
        // Execute SQL statement that creates 'contacts'
        // table with all necessary columns
        $db->PDO->exec('CREATE TABLE contacts (
                id INT AUTO_INCREMENT PRIMARY KEY, 
                subject VARCHAR(255) NOT NULL , 
                email VARCHAR(255) NOT NULL , 
                body TEXT NOT NULL ,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
                ) ENGINE = InnoDB;');
    }

    /**
     * Destroy 'contacts' table
     */
    public function down(): void
    {
        // Get database from Application
        $db = Application::$app->db;
        // Execute SQL statement that
        // deletes 'contacts' table
        $db->PDO->exec('DROP TABLE contacts');
    }
}
