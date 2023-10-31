<?php 
class Startreckers extends Spaceship
{
    public int $cargoSpace; // Rename the property to cargoSpace

    public function __construct($fuel = 2000, $hitPoints = 5000, $cargoSpace = 1200)
    {
        parent::__construct($fuel, $hitPoints);
        $this->cargoSpace = $cargoSpace; // Initialize the cargoSpace property
    }

    private const MAX_CARGO_CAPACITY = 100;

    public function unloadCargo(int $cargo): void
    {
        if ($this->cargoSpace + $cargo <= self::MAX_CARGO_CAPACITY)
        {
            $this->cargoSpace += $cargo;
        }
        else
        {
            $this->cargoSpace = self::MAX_CARGO_CAPACITY;
        }
    }

    public function LoadStartreckers(int $cargo): void
    {
        if ($this->cargoSpace - $cargo >= 0)
        {
            $this->cargoSpace -= $cargo;
        }
        else
        {
            $this->cargoSpace = 0;
        }
    }

    // For simplicity, the maximum cargo capacity is set to 100. You can modify it as needed.
}
?>