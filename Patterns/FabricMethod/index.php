<?php

use Patterns\FabricMethod\Enum\ShippingRegion;
use Patterns\FabricMethod\Shippings\Creators\MeestExpressCalculator;
use Patterns\FabricMethod\Shippings\Creators\NovaPostCalculator;

function createOrder(ShippingCalculator $shippingCalculator, $region = ShippingRegion::EUROPE): float
{
    return $shippingCalculator->calculate($weight, $totalPrice);
}

$shippingType = match ($_GET['type']) {
    'NovaPost' => new NovaPostCalculator::class,
    'MeestExpress' => new MeestExpressCalculator::class,
    default => null
};

$deliveryZone = match ($_GET['type']) {
    'Europe' => ShippingRegion::EUROPE,
    default => ShippingRegion::UKRAINE
};