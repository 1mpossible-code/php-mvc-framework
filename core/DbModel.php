<?php


namespace app\core;


use PDOStatement;

/**
 * Class DbModel
 * @package app\core
 */
abstract class DbModel extends Model
{
    /**
     * Name of the table related to this model
     * @return string
     */
    abstract public function tableName(): string;

    /**
     * Attributes that have
     * to be saved to database
     * @return array
     */
    abstract public function attributes(): array;

    /**
     * Save the model data to database
     * @return bool
     */
    public function save(): bool
    {
        // Get table name
        $tableName = $this->tableName();
        // Get attributes that
        // will be saved to database
        $attributes = $this->attributes();
        // Prepare attribute parameters for saving into database
        $params = array_map(static fn($attr) => ":$attr", $attributes);
        // Prepare SQL statement with attributes and their params
        $statement = self::prepare(
            "INSERT INTO $tableName (" . implode(",", $attributes) . ") 
            VALUES (" . implode(",", $params) . ")"
        );
        // Bind attribute values to statement
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        // Execute prepared statement
        $statement->execute();
        // If no errors return true
        return true;
    }

    /**
     * Helping method that prepares
     * PDO SQL statements
     * @param $SQL
     * @return false|PDOStatement
     */
    public static function prepare($SQL)
    {
        // Use Application database PDO
        // to prepare SQL statement
        return Application::$app->db->PDO->prepare($SQL);
    }
}