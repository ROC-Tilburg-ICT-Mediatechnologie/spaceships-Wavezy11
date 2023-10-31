<?php
// Met Fighter als voorbeeld is kunnen de studenten als oefening het cargoship zelf proberen te maken. Met de andere
// classes en het design op papier als basis.

include_once 'Spaceship.php';

class DeathStar extends Spaceship
{
    private int $Lazerbeams;

    public function __construct($fuel = 100, $hitPoints = 1000, $Lazerbeams = 2, $cargo = 3)
    {
        parent::__construct($fuel, $hitPoints);
        $this->Lazerbeams = $Lazerbeams;
    }
    

    public function useLazerBeams($target)
    {
        $damage = 500;
        
        if ($this->Lazerbeams > 0) {
            // Check if the target has a hit method (assuming it's a spaceship with hit points).
            if (method_exists($target, 'hit')) {
                $target->hit($damage);
            }
            
            // Reduce the number of Lazerbeams.
            $this->Lazerbeams--;
        }
    }
    

    // Voor gemak is er gekozen om het zonder maximum te doen. Hier zou een opdracht van gegeven kunnen worden voor
    // de klas om deze functie en daarmee de class zo aan te passen dat het wel werkt met een maximum in de vorm van
    // een capacity.
    public function unloadCargo(int $cargo): void
    {
        if ($this->cargoSpace + $cargo <= 100)
        {
            $this->cargoSpace += $cargo;
        }
        else
        {
            $this->cargoSpace = 100;
        }
    }
}