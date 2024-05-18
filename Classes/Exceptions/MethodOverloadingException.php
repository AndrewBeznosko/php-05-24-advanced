<?php

namespace Overload\Exceptions;

class MethodOverloadingException extends \Exception
{
    public function __construct(string $message = 'Desired method does not exist')
    {
        parent::__construct($message);
    }
}