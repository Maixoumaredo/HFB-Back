<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    require '../require/bet.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/odd-bar.css">
</head>
<body>
    <a href="../index.php">
        <button>Index</button>
    </a>
    <a href="../pages/start.php">
        <button>Start</button>
    </a>
    <?php if(!isset($_SESSION['pseudo'])): ?>
        <a href="../pages/login.php">
            <button>Login</button>
        </a>
    <?php endif ?>
    <?php if(!isset($_SESSION['pseudo'])): ?>
        <a href="../pages/create.php">
            <button>Create account</button>
        </a>
    <?php endif ?>
    <a href="../pages/stats.php">
        <button>Stats</button>
    </a>
    <a href="../pages/lougout.php">
        <button>Logout</button>
    </a>
    <H1>FIGHT</H1>
    <H1>BET</H1>    
    <p>Your wallet : <?= $_SESSION['wallet'] ?></p>
    <p>Winner : <?= $_SESSION['winner'] ?></p>   
    <p>1 : <?= $_SESSION['hero_name1'] ?></p>   
    <p>2 : <?= $_SESSION['hero_name2'] ?></p>   

    <form action="#" method="post">
        <label for="bet-amount">Enter an amount to bet :</label>
        <input type="number" name="bet-amount" value="<? $_POST['bet-amount'] ?>">
        <br/>
        
        <input type="submit" class="bet bet-left" name="bet-left" value="Bet on the left">
        <input type="submit" class="bet bet-right" name="bet-right" value="Bet on the right">
    </form>

</body>
</html>