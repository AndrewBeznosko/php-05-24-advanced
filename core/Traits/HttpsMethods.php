<?php

namespace Core\Traits;

trait HttpsMethods
{
    public function get(string $uri): static
    {
        return static::setUri($uri)->setMethod('GET');
    }

    public function post(string $uri): static
    {
        return static::setUri($uri)->setMethod('POST');
    }

    public function put(string $uri): static
    {
        return static::setUri($uri)->setMethod('PUT');
    }

    public function delete(string $uri): static
    {
        return static::setUri($uri)->setMethod('DELETE');
    }

    public function patch(string $uri): static
    {
        return static::setUri($uri)->setMethod('PATCH');
    }

    public function options(string $uri): static
    {
        return static::setUri($uri)->setMethod('OPTIONS');
    }

    public function head(string $uri): static
    {
        return static::setUri($uri)->setMethod('HEAD');
    }

    public function any(string $uri): static
    {
        return static::setUri($uri)->setMethod('ANY');
    }
}