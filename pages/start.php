<?php
    session_start();
    if (!isset($_SESSION['pseudo'])){
        header("Location: ../pages/login.php");
        exit; // prevent further execution, should there be more code that follows
    };
    require '../require/bet.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fight</title>
</head>
<body>
    <a href="../index.php">
        <button>Index</button>
    </a>
    <a href="../pages/start.php">
        <button>Fight</button>
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


    <div>Ready to fight ?</div>
    <br>
    <form action="#" method="post">        
        <input type="submit" class="next-fight" name="next-fight" value="Next fight">
    </form>

</body>
</html>