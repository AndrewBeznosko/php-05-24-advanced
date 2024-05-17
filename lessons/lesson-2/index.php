<?php

class Student
{
    public function __construct(
        public string $name,
        public int    $groupId,
        public string $type,
    )
    {

    }
}

$student = new Student('John Doe', 1, 'full-time');
echo $student->name; // John Doe


// =================================================================================================

class DB
{
    protected static PDO|null $pdo = null;

    static public function getInstance(): PDO
    {
        if (is_null(self::$pdo)) {
            self::$pdo = new PDO('mysql:host=localhost;dbname=database', 'root', '');
        }

        return self::$pdo;
    }
}

// =================================================================================================

class A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        self::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }
}

B::test(); // A

// =================================================================================================
// interfaces

interface Database
{
    public function select(array $columns = ['*']): Database;

    public function where(): Database;

    public function get(): array;
}

class MySQL implements Database
{
    public function select(array $columns = ['*']): Database
    {
        return $this;
    }

    public function where(): Database
    {
        return $this;
    }

    public function get(): array
    {
        return [];
    }
}

function workWithDB(Database $obj)
{
    $obj->select('name', 'surname')->where()->get();
}


// =================================================================================================
// abstract classes

abstract class Animal
{
    public function eat()
    {
        echo 'I am eating';
    }

    abstract public function makeSound();
}





















