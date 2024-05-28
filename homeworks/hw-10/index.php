<?php

// HW 10. Dependency inversion
interface Adapter
{
    public function getData(): string;
}

class Mysql implements Adapter
{
    public function getData(): string
    {
        return 'some data from database';
    }
}

class Controller
{

    public function __construct(private Adapter $adapter)
    {
    }

    function getData()
    {
        $this->adapter->getData();
    }
}

$mysql = new Mysql();
$controller = new Controller($mysql);
echo $controller->getData();

