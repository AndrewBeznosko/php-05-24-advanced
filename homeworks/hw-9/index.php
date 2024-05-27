<?php

// HW 8. Open/Closed Principle
interface Delivery
{
    public function deliver(string $format): void;
}

class EmailDelivery implements Delivery
{
    public function deliver(string $format): void
    {
        echo "Вывод формата ({$format}) по имейл";
    }
}

class SmsDelivery implements Delivery
{
    public function deliver(string $format): void
    {
        echo "Вывод формата ({$format}) в смс";
    }
}

class ConsoleDelivery implements Delivery
{
    public function deliver(string $format): void
    {
        echo "Вывод формата ({$format}) в консоль";
    }
}

interface Formatter
{
    public function format(string $string): string;
}

class RawFormatter implements Formatter
{
    public function format(string $string): string
    {
        return $string;
    }
}

class WithDateFormatter implements Formatter
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

class WithDateAndDetailsFormatter implements Formatter
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}

class Logger
{
    public function __construct(private readonly Formatter $formatter, private readonly Delivery $delivery)
    {
    }

    public function log(string $string): void
    {
        $this->deliver($this->format($string));
    }

    private function format(string $string): string
    {
        return $this->formatter->format($string);
    }

    private function deliver(string $string): void
    {
        $this->delivery->deliver($string);
    }

}

$emailDelivery = new EmailDelivery();
$rawFormatter = new RawFormatter();
$logger = new Logger($rawFormatter, $emailDelivery);
$logger->log('Emergency error! Please fix me!');
