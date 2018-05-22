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
    </a>
    <p>Winner : <?= $_SESSION['winner']?></p>
    <p>Winner : <?= $_SESSION['wallet']?></p>

    <form action="#" method="post">        
        <input type="submit" class="next-fight" name="next-fight" value="Next fight">
    </form>
    
</body>
</html>