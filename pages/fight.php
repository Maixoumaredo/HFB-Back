<?php
    session_start();
    if (!isset($_SESSION['pseudo'])){
        header("Location: ../pages/login.php");
        exit; // prevent further execution, should there be more code that follows
    };
    require '../require/config.php';
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
    <a href="../pages/fight.php">
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

    <h1>1V1</h1>
    <a href="fight/fight-1v1.php">
        <button>1V1</button>
    </a>

</body>
</html>