<?php

/**
 * To test the code, open:
 * http://localhost:8082/hw-3
 */
class ValueObject
{
    private int $red;
    private int $green;
    private int $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function setRed(int $red): void
    {
        $this->validateColor($red, 'red');
        $this->red = $red;
    }

    public function setGreen(int $green): void
    {
        $this->validateColor($green, 'green');
        $this->green = $green;
    }

    public function setBlue(int $blue): void
    {
        $this->validateColor($blue, 'blue');
        $this->blue = $blue;
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    protected function validateColor(int $color, string $colorName): void
    {
        if ($color < 0 || $color > 255) {
            throw new InvalidArgumentException("Color '{$colorName}' must be between 0 and 255");
        }
    }

    public function equals(ValueObject $obj): bool
    {
        return $this->red === $obj->getRed() && $this->green === $obj->getGreen() && $this->blue === $obj->getBlue();
    }

    public function mix(ValueObject $obj): ValueObject
    {
        return new ValueObject(
            round(($this->red + $obj->getRed()) / 2),
            round(($this->green + $obj->getGreen()) / 2),
            round(($this->blue + $obj->getBlue()) / 2)
        );
    }

    public static function random(): ValueObject
    {
        return new ValueObject(
            rand(0, 255),
            rand(0, 255),
            rand(0, 255)
        );
    }

    public function __toString(): string
    {
        return "rgb({$this->red}, {$this->green}, {$this->blue})";
    }
}

$color1 = ValueObject::random();
$color2 = ValueObject::random();
$isColor1EqualsColor2 = $color1->equals($color2) ? 'Yes' : 'No';
$mixedColor1AndColor2 = $color1->mix($color2);

// 1. rundom ======================================
echo '<style> body { background-color: ' . ValueObject::random() . ' } </style>';

// 2. equals ======================================
echo "<h1>Color {$color1} is equal to {$color2} = {$isColor1EqualsColor2}</h1>";

echo "<br><br>";

// 3. mix ======================================
echo '
    <style>
        .square {
            width: 50px;
            height: 50px;
            margin: 0 10px;
        }
    </style>
    
    <div style="display: flex; align-items: center; font-size: 32px">
        <div>Mixed color: </div>
        <div class="square" style="background-color: ' . $color1 . '"></div> + 
        <div class="square" style="background-color: ' . $color2 . '"></div> = 
        <div class="square" style="background-color: ' . $mixedColor1AndColor2 . '"></div>
    </div>
';

