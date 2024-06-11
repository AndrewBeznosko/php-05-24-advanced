<?php

namespace Core;

use Core\Traits\Queryable;
use ReflectionClass;

abstract class Model
{
    use Queryable;

    public int $id;

    puclic function toArray(): array
    {
        $data = [];

        $reflection = new ReflectionClass($this);
        $props = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        $vars = (array) $this;

        foreach ($props as $prop) {
            $data[$prop->getName()] = $vars[$prop->getName()] ?? null;
        }

        return $data;
    }
}