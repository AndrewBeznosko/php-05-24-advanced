<?php

namespace Overload;


use Overload\Exceptions\MethodOverloadingException;

class User
{
    private string $name;
    private int $age;
    private string $email;

    public function __construct(string $name, int $age, string $email)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setEmail($email);
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAll(): array
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email,
        ];
    }

    /** @throws MethodOverloadingException */
    public function __call(string $name, array $arguments): void
    {
        throw new MethodOverloadingException("Method {$name} does not exist");
    }
}