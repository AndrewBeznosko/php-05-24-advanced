<?php
require_once __DIR__ . '/vendor/autoload.php';

use Overload\User;

try {
    $user = new User('Andrew', 25, 'andrew@test.com');

    // This will show the user's information
    d($user->getAll());

    // This will throw an exception
    $user->getInfo();
} catch (Exception $e) {
    echo $e->getMessage();
}