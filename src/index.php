<?php
    include 'Spaceship.php';
    include 'fighter.php';

    $spaceship = new Spaceship(1020, 1020, 1200);
    $fighter = new Fighter(100, 100, 1020);
    $deathStar = new DeathStar(200, 200, 300);
    $GalaticRepublic = new GalaticRepublic(200, 200, 300);
    $deathStar->setRandomValues();
    $GalaticRepublic->setRandomValues();
    $fighter->setRandomValues();


    ?>
    <?php

    echo "Deathstar has " . $deathStar->hitPoints . "HP<br>";
    echo $fighter->ammo . " ammo in his inventory<br>";
    echo "and has " . $deathStar->fuel . " Fuel left<br>";
    echo "And has " . $fighter->rockets . " rockets<br><br>";

    echo "Galactic Republic has " . $GalaticRepublic->hitPoints . "HP<br>";
    echo $fighter->ammo . " ammo in his inventory<br>";
    echo "and has " . $GalaticRepublic->fuel . " Fuel left<br>";
    echo "And has " . $fighter->rockets . " rockets<br><br>";

    echo "Lazarbeam damage is 250 damage " . "<br>";

    $fighter->useLazarbeam($deathStar->hitPoints);
    $fighter->useLazarbeam($GalaticRepublic->hitPoints);

    echo "Deathstar after getting hit with the lazarbeam " . $deathStar->hitPoints . "<br>";
    echo "Galactic Republic after getting hit with the lazarbeam " . $GalaticRepublic->hitPoints . "<br><br>";

    echo "Rocket damage is 350 damage" . "<br>" . "<br>";

    $fighter->useRockets($deathStar);
    $fighter->useRockets($GalaticRepublic);
    

    

    echo "Deathstar after getting hit with the rockets " . $deathStar->hitPoints . "<br>";
    echo "Galactic Republic after getting hit with the rockets " . $GalaticRepublic->hitPoints . "<br><br><br>";

    echo "Now we're using the remaining ammo to crown the winner" . "<br>";

    list($damageToDeathStar, $damageToGalaticRepublic) = $fighter->useAmmo($deathStar, $GalaticRepublic);
    
    echo  "<br>" . "Deathstar after getting hit with the remaining ammo "  .  $deathStar->hitPoints . "<br>";
    echo "Galatic Republic after getting hit with the remaining ammo "  . $GalaticRepublic->hitPoints . "<br>" . "<br>";
    
 
    if ($deathStar->hitPoints > $GalaticRepublic->hitPoints) {
        echo "DeathStar has won!";
    } elseif ($GalaticRepublic->hitPoints > $deathStar->hitPoints) {
        echo "Galactic Republic has won!";
    } else {
        echo "It's a draw! Both ships are still alive.";
    }
    
    	

    echo  "<br>" . "<br>"  . "Hieronder kan je de grafiek zien hoe de HitPoints daalt naarmate de afgevuurde rakketen toeneemt"
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaceship Battle Visualization</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="hitPointsChart" width="200" height="100"></canvas>

<script>
    // Simulating data based on the provided PHP code
    const initialHitPoints = {
        DeathStar: 1800,
        GalacticRepublic: 1800,
    };

    const damageToDeathStar = 350;
    const damageToGalaticRepublic = 350;

    let hitPointsData = {
        DeathStar: [initialHitPoints.DeathStar],
        GalacticRepublic: [initialHitPoints.GalacticRepublic],
    };

    // Simulating the battle over time
    for (let i = 1; i <= 5; i++) {
        hitPointsData.DeathStar.push(hitPointsData.DeathStar[i - 1] - damageToDeathStar);
        hitPointsData.GalacticRepublic.push(hitPointsData.GalacticRepublic[i - 1] - damageToGalaticRepublic);
    }

    // Creating a line chart
    var ctx = document.getElementById('hitPointsChart').getContext('2d');
    var hitPointsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Array.from({ length: hitPointsData.DeathStar.length }, (_, i) => i + 1),
            datasets: [
                
                {
                    label: 'DeathStar',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    data: hitPointsData.DeathStar,
                },
                {
                    label: 'GalacticRepublic',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    data: hitPointsData.GalacticRepublic,
                },
            ],
        },
        options: {
            scales: {
                x: {
                    type: 'linear',
                    position: 'bottom',
                },
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>

</body>
</html>
