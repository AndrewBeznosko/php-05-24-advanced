<?php
require_once __DIR__ . '/../../vendor/autoload.php';

class Contact
{
    private string $name;
    private string $surname;
    private string $email;
    private string $phone;
    private string $address;

    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function __call($name, $arguments)
    {
        if (property_exists($this, $name)) {
            $this->$name = $arguments[0];
            return $this;
        } else {
            throw new Exception("Method '$name' does not exist");
        }
    }

    public function build()
    {
        return $this;
    }
}

$contact = new Contact();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    // ->foo("bar") - this will throw an exception
    ->build();

// Output:
dd($newContact);

