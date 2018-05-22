<?php
    session_start();
    if (!isset($_SESSION['pseudo'])){
        header("Location: ../pages/login.php");
        exit; // prevent further execution, should there be more code that follows
    }
    require '../require/config.php';
    require '../require/stats_form.php';
    $query = $pdo->query('SELECT * FROM users ORDER BY wallet desc');
    $users = $query->fetchAll();

    $query1 = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $query1->bindParam(':id', $_SESSION['id']);
    $query1->execute();
    $user = $query1->fetchAll();
    echo '<pre>';
    var_dump($_SESSION['wallet']);
    echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stats</title>
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
    <!-- Display the Wallet -->
    <h1>Your Profile</h1>
    <table>
        <tr>
            <th>Pseudo :</th>
            <th>Wallet :</th>                   
            <th>Number of bets :</th>
            <th>Number of bets won :</th>
        </tr>
            <tr>
                <?php
                    foreach($user as $_user): ?>
                    <td><?= $_user->pseudo ?></td>
                    <td><?= $_user->wallet ?></td>
                    <td><?= $_user->numberbets ?></td>
                    <td><?= $_user->numberbetswon ?></td>
                <?php endforeach; ?>
            </tr>
    </table>
    <br>
    <!-- Increments +1 number of bets -->
    <h1>Increments number of bets</h1>
    <form action='#' method="post">
        <input type="submit" name ="numberbets" value="Number bets">
        <?
        echo '<pre>';
        var_dump($_SESSION['numberbets']);
        echo '</pre>';
        ?>
    </form>

        <!-- Increments +1 number of bets -->
        <h1>Increments number of bets won</h1>
    <form action='#' method="post">
        <input type="submit" name ="numberbetswon" value="Number bets won">
        <?
        echo '<pre>';
        var_dump($_SESSION['numberbetswon']);
        echo '</pre>';
        ?>
    </form>
    
    <!-- Display all the accounts -->
    <h1>List Accounts</h1>
    <table>
        <tr>
            <th>Pseudo :</th>
            <th>Wallet :</th>
            <th>Number of bets :</th>
            <th>Number of bets won :</th>
        </tr>
        <?php foreach($users as $_users): ?>
                <tr>
                    <td><?= $_users->pseudo ?></td>
                    <td><?= $_users->wallet ?></td> 
                    <td><?= $_users->numberbets ?></td>
                    <td><?= $_users->numberbetswon ?></td>
                </tr>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>