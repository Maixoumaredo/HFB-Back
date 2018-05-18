<?php
session_start();
echo '<pre>';
var_dump($_SESSION['pseudo']);
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <a href="index.php">
        <button>Index</button>
    </a>
    <a href="pages/fight.php">
        <button>Fight</button>
    </a>
    <a href="pages/login.php">
        <button>Login</button>
    </a>
    <a href="pages/create.php">
        <button>Create account</button>
    </a>
    <a href="pages/stats.php">
        <button>Stats</button>
    </a>
    <a href="pages/lougout.php">
        <button>Logout</button>
    </a>
    <h1>Godmode: Access to every page here</h1>
</body>
</html>