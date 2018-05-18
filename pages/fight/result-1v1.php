<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    echo '<pre>';
    var_dump($_SESSION['hero_name1']);
    echo '</pre>';

    echo '<pre>';    
    var_dump($_SESSION['hero_name2']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero1_winState']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero2_winState']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero2_power']);
    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../styles/health-bar.css">  
    <title>Document</title>
</head>
<body>

    <p><?= $_SESSION['hero_name1'] ?> with a power of <?= $_SESSION['hero1_power'] ?></p>
    <p>VS</p>
    <p><?= $_SESSION['hero_name2'] ?> with a power of <?=  $_SESSION['hero2_power']   ?></p>
    <p>Hero 1 odd : <?= $_SESSION['hero1_odd'] ?></p>
    <p>Hero 2 odd : <?= $_SESSION['hero2_odd'] ?></p>

    <div class="health-bar-left js-health-bar-left" data-winstate="<?= $_SESSION['hero1_winstate'] ?>">
        <div class="health-bar-left_fill js-health-bar-left_fill"></div>
    </div>
    <div class="health-bar-right js-health-bar-right" data-winstate="<?= $_SESSION['hero2_winstate'] ?>">
        <div class="health-bar-right_fill js-health-bar-right_fill"></div>
    </div>

    <p>Your wallet : <?= $_SESSION['wallet'] ?></p>

    <form action="fight-1v1.php">
        <input type="submit" value = 'Rejouer'>
    </form>

    <script src="../../scripts/health-bar.js"></script>
</body>
</html>
    