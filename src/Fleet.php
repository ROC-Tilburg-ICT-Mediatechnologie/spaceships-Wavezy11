<?php 
// Include the Spaceship class if it's not already included
include_once 'Spaceship.php';

class Fleet
{
    private array $ships = [];

    public function addSpaceship(Spaceship $ship)
    {
        $this->ships[] = $ship;
    }

    public function getRandomFleet()
    {
        $names = ['DeathStar', 'Naboo Starfighter'];
        foreach ($names as $name) {
            $fuel = rand(100, 1000); // Random fuel between 100 and 1000
            $hitPoints = rand(100, 500); // Random hit points between 100 and 500
            $ammo = rand(10, 100); // Random ammo between 10 and 100

            $ship = new Spaceship($fuel, $hitPoints, $ammo);
            $this->addSpaceship($ship);
        }
    }

    public function getFleetStatus()
    {
        foreach ($this->ships as $ship) {
            echo $ship->getName() . " - Fuel: " . $ship->getFuel() . ", HitPoints: " . $ship->getHitPoints() . ", Ammo: " . $ship->getAmmo() . PHP_EOL;
        }
    }
}

$fleet = new Fleet();
$fleet->getRandomFleet();
$fleet->getFleetStatus();


?>