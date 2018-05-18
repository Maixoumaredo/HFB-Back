<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    require 'config.php';        
    $query = $pdo->query('SELECT * FROM users');
    $login = $query->fetchAll();

    $time = intval(date('s'));
    $userWallet = $_SESSION['wallet'];
    $userId = $_SESSION['id'];
    $userBet = 0;
    $userSide = '';
    $betRatingLeft = 3;
    $betRatingRight = 1.5;
    $betRating = 0;
    $reward = 0;
    $betmessageconfirm = '';

        // Send form
        if(!empty($_POST['bet-amount']) && $userWallet > 0)
        {
            if(isset($_POST['bet-left']))
            {
                $userBet = $_POST['bet-amount'];
                $userSide = 'left';
                $betRating = $betRatingLeft;
                $betmessageconfirm = 2;
            }
            else if(isset($_POST['bet-right']))
            {
                $userBet = $_POST['bet-amount'];
                $userSide = 'right';
                $betRating = $betRatingRight;
                $betmessageconfirm = 1;                
            }
            //Update wallet after bet
            $userWallet -= $userBet;

            // Reward
            $reward = $betRating * $userBet;
        }

        // Win ?
        if($_SESSION['winner'] == 1 && $userSide == 'left')
        {
            echo 'left';
            $userWallet += $reward;
        }
        else if($_SESSION['winner'] == 2 && $userSide == 'right')
        {
            echo 'right';
            $userWallet += $reward;
        }

        // Update wallet after win
        $_SESSION['wallet'] = $userWallet;

        $prepare = $pdo->prepare('
            UPDATE
                users
            SET
                wallet = :wallet
            WHERE 
                id = :id
        ');

        $prepare->bindValue('wallet', $userWallet);
        $prepare->bindValue('id', $userId);
        $prepare->execute();

        // Reset field
        $_POST['name'] = '';
        $_POST['bet-amount'] = '';
?>