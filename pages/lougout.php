<?php
    session_start();
    if (!isset($_SESSION['pseudo'])){
        header("Location: ../pages/stats.php");
        exit; // prevent further execution, should there be more code that follows
    }
    require '../require/config.php';
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    // Initialisation de la session.
    // Si vous utilisez un autre nom
    // session_name("autrenom")

    // Détruit toutes les variables de session
    $_SESSION = array();

    // Si vous voulez détruire complètement la session, effacez également
    // le cookie de session.
    // Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 3600,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    // Finalement, on détruit la session.
    session_destroy();
    header("Location: ../pages/stats.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
</head>
<body>
    <a href="../index.php">
        <button>Index</button>
    </a>
    <a href="../pages/fight.php">
        <button>Fight</button>
    </a>
    <a href="../pages/login.php">
        <button>Login</button>
    </a>
    <a href="../pages/create.php">
        <button>Create account</button>
    </a>
    <a href="../pages/stats.php">
        <button>Stats</button>
    </a>
    <a href="../pages/lougout.php">
        <button>Logout</button>
    </a>
    <div>You have been disconnected</div>
</body>
</html>