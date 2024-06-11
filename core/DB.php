<?php

namespace Core;

use PDO;

class DB
{
    static protected PDO|null $instance = null;

    static public function connect(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('php_05_advanced'),
                getenv('DB_USER'),
                getenv('DB_PASSWORD')
            );
        }

        return self::$instance;
    }
}