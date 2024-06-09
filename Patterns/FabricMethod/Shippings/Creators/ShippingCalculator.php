<?php

use Patterns\FabricMethod\Contracts\ShippingRegion;

class ShippingCalculator implements ShippingRegion
{
    public function __construct()
    {

    }

    public function calculate(): float
    {
        return 0;
    }
}