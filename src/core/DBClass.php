<?php

namespace Core;

use PDO;

require '../etc/config.php';

/**
 * Class DBClass
 * @package Core
 */
class DBClass
{
    /**
     * @var string $host Database host
     */
    private $host = DATABASE['host'];
    /**
     * @var string $user Database user
     */
    private $user = DATABASE['user'];
    /**
     * @var string $pass Database password
     */
    private $pass = DATABASE['password'];
    /**
     * @var string $dbName Database name
     */
    private $dbName = DATABASE['dbName'];

    /**
     * @var object $instance DBClass
     */
    private static $instance = null;
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * DBClass constructor.
     */
    public function __construct()
    {
        $this->connection = new PDO(
            "mysql:host={$this->host};dbname={$this->dbName}",
            $this->user,
            $this->pass
        );
    }

    /**
     * @return \Core\DBClass | null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DBClass();
        }

        return self::$instance;
    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $query
     *
     * @return false | \PDOStatement
     */
    public function query($query)
    {
        return self::getInstance()->getConnection()->query($query);
    }
}
