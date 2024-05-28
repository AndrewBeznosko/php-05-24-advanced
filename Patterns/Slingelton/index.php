<?php

namespace Patterns\Slingelton;

class Db
{
    protected PDO|null $connection = null;

    static public function connect(): PDO
    {
        if (null === self::$connection) {
            self::$connection = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        }

        return self::$connection;
    }
}