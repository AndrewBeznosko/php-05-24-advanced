<?php

// HW 11. Factory Method
// http://localhost:8082/homeworks/hw-11
abstract class TaxiFactory
{
    abstract public function getTaxi(): Taxi;

    public function showTaxiInfo(): void
    {
        $taxi = $this->getTaxi();
        echo 'Taxi model: <b>' . $taxi->carModel() . '</b><br>';
        echo 'Taxi price: <b>' . $taxi->price() . '</b><br>';
    }
}

class EconomyTaxiFactory extends TaxiFactory
{
    public function getTaxi(): Taxi
    {
        return new EconomyTaxi();
    }
}

class RegularTaxiFactory extends TaxiFactory
{
    public function getTaxi(): Taxi
    {
        return new RegularTaxi();
    }
}

class LuxuryTaxiFactory extends TaxiFactory
{
    public function getTaxi(): Taxi
    {
        return new LuxuryTaxi();
    }
}

interface Taxi
{
    public function price(): int;

    public function carModel(): string;
}

class EconomyTaxi implements Taxi
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

class RegularTaxi implements Taxi
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

class LuxuryTaxi implements Taxi
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
echo 'Economy taxi info:' . '<br>';
$economyTaxi = new EconomyTaxiFactory();
$economyTaxi->showTaxiInfo();
