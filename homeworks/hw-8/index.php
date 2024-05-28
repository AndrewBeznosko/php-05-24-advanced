<?php

// HW 8. Interface segregation
interface Animal
{
    public function eat();
}

interface Bird
{
    public function fly();
}

class Swallow implements Animal, Bird
{
    public function eat()
    {
    }

    public function fly()
    {
    }
}

class Ostrich implements Animal
{
    public function eat()
    {
    }
}
