<?php
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    // Add +1 bet on account
    if(isset($_POST['numberbets'])){
        if(!empty($_POST)){
            $numberbets = ($_SESSION['numberbets']) + 1;
            $id = $_SESSION['id'];
            $prepare = $pdo->prepare('UPDATE users SET numberbets = :numberbets WHERE id = :id');
            $prepare->bindValue(':numberbets', $numberbets);
            $prepare->bindValue(':id', $id);
            $prepare->execute();
            $_SESSION['numberbets'] = $numberbets;
        }
    }
    // Add +1 bet won on account    
    if(isset($_POST['numberbetswon'])){
        if(!empty($_POST)){
            $numberbetswon = ($_SESSION['numberbetswon']) + 1;
            $id = $_SESSION['id'];
            $prepare = $pdo->prepare('UPDATE users SET numberbetswon = :numberbetswon WHERE id = :id');
            $prepare->bindValue(':numberbetswon', $numberbetswon);
            $prepare->bindValue(':id', $id);
            $prepare->execute();
            $_SESSION['numberbetswon'] = $numberbetswon;
        }
    }
?>