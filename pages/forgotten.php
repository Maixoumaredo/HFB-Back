<?php
    session_start();
    if (isset($_SESSION['pseudo'])){
        header("Location: ../pages/stats.php");
        exit; // prevent further execution, should there be more code that follows
    }
    require '../require/config.php';
    require '../require/forgotten_form.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgotten Password</title>
</head>
<body>
<a href="../index.php">
        <button>Index</button>
    </a>
    <?php if(isset($_SESSION['pseudo'])): ?>
        <a href="../pages/fight-1v1.php">
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
    <!-- Create an account -->
    <h1>Forgotten password</h1>
    <form action="#" method="post" class="form">
        <input type="text" name="pseudo" placeholder="Your Pseudo">
        <br>
        <input type="text" name="email" placeholder="Your email">
        <br>        
        <input type="submit" name ="send" value="Send">
        <?php foreach($errorMessagesForgotten as $message): ?>
            <p><?= $message ?></p>
        <?php endforeach ?>
        <?php foreach($successMessagesForgotten as $message): ?>
            <p><?= $message ?></p>
        <?php endforeach ?>
    </form>
</body>
</html>