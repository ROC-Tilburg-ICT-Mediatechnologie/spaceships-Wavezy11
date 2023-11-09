    <?php



    // Allereerst, zorgen dat het bestand met daarin de base gevonden wordt.
    include_once 'Spaceship.php';

    // Door de code extends toe te voegen zeggen we tegen de code: Erf van Spaceship dat wat public of protected is.
    // Private wordt doorgegeven. Bedenk ook dat overerving alleen naar beneden in de hierarchie wordt doorgegeven. Het
    // vergelijk is hier te maken met ouders en kinderen, DNA gaat van opa en oma, naar ouder, naar kind, niet terug.
    // Je zou ook kunnen stellen dat extends zegt wat het belooft te doen, uitbreiden van Spaceship in dit geval.
    class Fighter extends Spaceship
    {
        // Fighter erft hier de rest van Spaceship en heeft alleen ammo nodig.
        public int $ammo;
        public int $rockets;
        // De constructor parameters bevatten hier wel ALLE properties, ook die van één of meerdere parents
        public function __construct($fuel = 100, $hitPoints = 100, $ammo = 100, $rockets = 5)
        {
            // Door de constructor aan te roepen van de parent kunnen de properties daarvan doorgegeven worden.
            parent::__construct($fuel, $hitPoints);
            // Hierna zetten we de properties van deze child class.
            $this->ammo = $ammo;
            $this->rockets = $rockets;
        }

        public function useAmmo($deathStar, $GalaticRepublic)
        {
            $damageToDeathStar = $this->ammo * 20; 
            $damageToGalaticRepublic = $this->ammo * 20; 
        
            $this->shoot($deathStar->hitPoints, $damageToDeathStar);
            $this->shoot($GalaticRepublic->hitPoints, $damageToGalaticRepublic);
        
            $this->ammo = 0; 
        
            return [$damageToDeathStar, $damageToGalaticRepublic];
        }
        
        public function shoot(&$targetHitPoints, $damage)
        {
            $shot = 1;
        
            if ($this->ammo - $shot >= 0) {
                $this->ammo -= $shot;
                $targetHitPoints -= $damage;
                
            }
        }

        
        // Deze functie kan vanuit een vorige versie gekopieerd worden. Hier is gekozen om de naam meteen te verbeteren
        public function reload(int $ammo): void
        {
            if ($ammo < 0) {
                $ammo = 0;
            }
            if ($ammo > 100) {
                $ammo = 100;
            }

            $this->ammo = $ammo;
        }

        // Deze functie kan vanuit een vorige versie gekopieerd worden.
        public function getAmmo(): int
        {
            return $this->ammo;
        }

        public function useLazarbeam(&$hitpoints) {
            $damage = 250;
            $lazarbeamdamage = $damage;
            if ($hitpoints - $lazarbeamdamage > 0) {
                $hitpoints -= $lazarbeamdamage;
         
            }
        }

        public function setRockets(int $rockets): void
{
    if ($rockets < 0) {
        $rockets = 0;
    }
    if ($rockets > 3) {
        $rockets = 3;
    }
    $this->rockets = $rockets;
}

public function useRockets(Spaceship &$target)
{
    $rocketDamage = 350;

    if ($this->rockets > 0) {
        $rocketCount = rand(1, $this->rockets); 
        $totalRocketDamage = $rocketCount * $rocketDamage;

        if ($totalRocketDamage > 0) {
            $target->hitPoints -= $totalRocketDamage;
       
            $this->rockets -= $rocketCount;
        }
    }
}






        public function setRandomValues()
        {
            
            $this->ammo = rand(50, 100);  
            $this->rockets = rand(1, 3);   
        }

        
        public function setRandomVal()
        {
            
            $this->ammo = rand(50, 100);  
            $this->rockets = rand(1, 3);   
        }

        


        
    }
