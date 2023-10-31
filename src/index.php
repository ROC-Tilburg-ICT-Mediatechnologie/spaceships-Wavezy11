<?php
include 'Spaceship.php';
include 'fighter.php';

$spaceship = new Spaceship(1020,1020,1200);
$fighter = new Fighter(100,100,1020);
$deathStar = new DeathStar(200, 200, 300); // Hier geef je de gewenste waarden voor hitPoints, ammo, en maxfuel op
$jamn = new jamn(200,200,300);
$deathStar->setRandomValues();
$jamn->setRandomValues();
$fighter->setRandomValues();
?>
<?php 

echo "Deathstar has  " . $deathStar->hitPoints . "HP " . "" . "<br>" .  $fighter->ammo . "ammo in his inventory" .   "<br>";
echo "Galactic Republic has  " . $jamn->hitPoints . "HP " . "" . "<br>" .  $fighter->ammo . "ammo in his inventory" .   "<br>";
echo "<br" . "<br>" . "<br>";



$fighter->shoot();



?>