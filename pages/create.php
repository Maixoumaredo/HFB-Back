<?php
    session_start();
    if (isset($_SESSION['pseudo'])){
        header("Location: ../pages/stats.php");
        exit; // prevent further execution, should there be more code that follows
    };
    require '../require/config.php';
    require '../require/create_form.php';
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
</head>
<body>
    <a href="../index.php">
        <button>Index</button>
    </a>
    <?php if(isset($_SESSION['pseudo'])): ?>
        <a href="../pages/fight.php">
            <button>Fight</button>
        </a>
    <?php endif ?>
        <a href="../pages/login.php">
            <button>Login</button>
        </a>
    <a href="../pages/create.php">
        <button>Create account</button>
    </a>
    <?php if(isset($_SESSION['pseudo'])): ?>
        <a href="../pages/stats.php">
            <button>Stats</button>
        </a>
    <?php endif ?>
    <?php if(isset($_SESSION['pseudo'])): ?>
        <a href="../pages/lougout.php">
            <button>Logout</button>
        </a>
    <?php endif ?>
    <h1>Create an account</h1>
        <form action="#" method="post" class="form">
            <input type="text" name="pseudo" placeholder="Your Pseudo">
            <br>
            <input type="text" name="email" placeholder="Your email">
            <br>        
            <input type="password" name="password" placeholder="Your Password">
            <input type="submit" name ="create" value="Create">
            <?php foreach($errorMessagesCreate as $message): ?>
                <p><?= $message ?></p>
            <?php endforeach ?>
            <?php foreach($successMessagesCreate as $message): ?>
                <p><?= $message ?></p>
            <?php endforeach ?>
        </form>
</body>
</html>