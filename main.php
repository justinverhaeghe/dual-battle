<?php

require_once  __DIR__ . '/Hero.php';
require_once  __DIR__ . '/Orc.php';

$hero = new Hero(2000, 0, 'MasterSword', 250, 'Armure légendaire', 600);
$orc = new Orc(500, 0);
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Team Cap vs Team Iron Man</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8 glass-header m-4 pt-2">
                <h1 class="text-center"><img src="/public/assets/img/logoironman.png" alt="logo Iron man"
                        class="img-fluid">
                    VS <img src="/public/assets/img/logocaptain.png" alt="logo Iron man" class="img-fluid">
                </h1>
            </div>
            <?php
            while ($hero->getHealth() > 0 && $orc->getHealth() > 0) {

                $shieldValue = $hero->getShieldValue();
                $heroLife = $hero->getHealth();
                $orc->attack();
                $hero->attacked($orc->getDamage());
                $heroLifeAfter = $hero->getHealth();
                $orcDamage = $orc->getDamage();
                if ($orcDamage - $shieldValue > 0) {
                    $damageTaken = $orcDamage - $shieldValue;
                } else {
                    $damageTaken = 0;
                };
            ?>

            <div class="col-4 mb-3 glass logo">
                <h3 class="text-center pt-2"><img src="/public/assets/img/logoironman.png" alt="logo Iron man"
                        class="img-fluid"></h3>
                <ul>
                    <li>Points de vie : <?= $heroLife ?> // Rage : <?= $hero->getRage() ?></li>
                    <li>Le Shield de la Team Iron man a amorti <?= $hero->getShieldValue() ?> points de dégâts. </li>
                    <li>La Team Iron man a encaissé <?= $damageTaken ?> de dégâts. </li>
                    <li>Points de vie restants : <?= $heroLifeAfter ?></li>
                </ul>
            </div>
            <div class="col-2"></div>
            <div class="col-4 mb-3 glass logo">
                <h3 class="text-center pt-2"><img src="/public/assets/img/logocaptain.png" alt="logo Iron man"
                        class="img-fluid"></h3>
                <ul>
                    <li>Points de vie : <?= $orc->getHealth() ?></li>
                    <li><?php if ($hero->getRage() >= 100) {
                                $heroDamage = $hero->getWeaponDamage();
                                echo 'Subit une attaque de ' . $heroDamage . ' points de dégâts.';
                                $orc->setHealth($orc->getHealth() - $heroDamage);
                                $hero->setRage(0);
                            } ?>
                    </li>
                    <li>La Team Captain inflige <?= $orcDamage ?> points de dégats à la team Iron Man</li>
                </ul>
            </div>



            <?php
                if ($hero->getHealth() <= 0) { ?>
            <div class="col-6 glass-footer text-center mb-5">
                <h3>VAINQUEUR</h3>
                <p>La Team Captain gagne le combat.</p>
                <img src="/public/assets/img/teamcap.gif" alt="Team Captain America" class="img-fluid rounded mb-3">
            </div>
            <?php } else if ($orc->getHealth() <= 0) { ?>
            <div class="col-6 glass-footer text-center mb-5">
                <h3>VAINQUEUR</h3>
                <p>La Team Iron Man gagne le combat.</p>
                <img src="/public/assets/img/teamironman.gif" alt="Team Iron man" class="img-fluid rounded mb-3">
            </div>
            <?php } ?>

            <?php } ?>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center align-items-center" id="btnStartAgain">
        <button id="btn" class="btn btn-dark btn-lg mb-3"><a href="main.php" class="text-light">Start
                Fight Again</a></button>
    </div>

    <footer class="text-center bg-dark text-light pt-2 pb-1">
        <p><a href="index.php">Home</a> - By Forza &copy; 2023 - Réalisé dans le cadre d'un projet d'étude - La Manu</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>