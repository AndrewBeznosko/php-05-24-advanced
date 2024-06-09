<?php

abstract class Delivery
{
    abstract public function getDeliveryCar(): DeliveryCar;

    public function showDeliveryInfo()
    {
        $deliveryCar = $this->getDeliveryCar();
        echo 'Delivery car model: ' . $deliveryCar->carModel() . PHP_EOL;
        echo 'Delivery price: ' . $deliveryCar->price() . PHP_EOL;
    }
}

class EconomyDelivery extends Delivery
{
    public function getDeliveryCar(): DeliveryCar
    {
        return new EconomyCar();
    }
}

class RegularDelivery extends Delivery
{
    public function getDeliveryCar(): DeliveryCar
    {
        return new RegularCar();
    }
}

class LuxuryDelivery extends Delivery
{
    public function getDeliveryCar(): DeliveryCar
    {
        return new LuxuryCar();
    }
}

interface DeliveryCar
{
    public function price(): int;

    public function carModel(): string;
}

class EconomyCar implements DeliveryCar
{
    public function price(): int
    {
        return 100;
    }

    public function carModel(): string
    {
        return 'Economy car';
    }
}

class RegularCar implements DeliveryCar
{
    public function price(): int
    {
        return 200;
    }

    public function carModel(): string
    {
        return 'Regular car';
    }
}

class LuxuryCar implements DeliveryCar
{
    public function price(): int
    {
        return 300;
    }

    public function carModel(): string
    {
        return 'Luxury car';
    }
}

// Output:
echo 'Economy delivery info:' . PHP_EOL;
$economyDelivery = new EconomyDelivery();
$economyDelivery->showDeliveryInfo();
