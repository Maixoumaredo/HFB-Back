<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    require 'config.php';        
    $query1 = $pdo->query('SELECT * FROM users');
    $login = $query1->fetchAll();
    $query2 = $pdo->query('SELECT * FROM heroes');
    $heroes = $query2->fetchAll();


    // Define an url array
    $heroes_url = [];

    // Generate an API connection url for each hero 
    foreach($heroes as $_hero)
    {
        array_push($heroes_url, 'http://superheroapi.com/api/1836814349697165/'.$_hero->id);
    }

    // Decode 2 random heroes url
    $hero_left = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
    $hero_right = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));

    // Get name heroes
    $_SESSION['hero_name1']= $hero_left->name;
    $_SESSION['hero_name2'] = $hero_right->name;

    // Get image link
    $_SESSION['hero_left_id'] = $hero_left->id;
    $_SESSION['hero_right_id'] = $hero_right->id;

    // Get image link 1
    $query = $pdo->prepare('SELECT list_image_link FROM image WHERE list_id = :id');
    $query->bindParam(':id', $_SESSION['hero_left_id']);
    $query->execute();
    $image1 = $query->fetch();
    $_SESSION['image1'] = $image1->list_image_link;

    // Get image link 2
    $query = $pdo->prepare('SELECT list_image_link FROM image WHERE list_id = :id');
    $query->bindParam(':id', $_SESSION['hero_right_id']);
    $query->execute();
    $image2 = $query->fetch();
    $_SESSION['image2'] = $image2->list_image_link;

    // Calcul hero_left power
    $_SESSION['hero_left_power'] = 0;
    foreach($hero_left->powerstats as $_hero_left_powerstat)
    {
        $_SESSION['hero_left_power'] += $_hero_left_powerstat;
    }

    // Calcul hero_right power
    $_SESSION['hero_right_power'] = 0;
    foreach($hero_right->powerstats as $_hero_right_powerstat)
    {
        $_SESSION['hero_right_power'] += $_hero_right_powerstat;
    }

    // Determinate winner
    if($_SESSION['hero_left_power'] < $_SESSION['hero_right_power'])
    {
        $_SESSION['hero_left_winState'] = 2;
        $_SESSION['hero_right_winState'] = 1;
    }
    if($_SESSION['hero_left_power'] > $_SESSION['hero_right_power'])
    {
        $_SESSION['hero_left_winState'] = 1;
        $_SESSION['hero_right_winState'] = 2;
    }

    // Send form
    if(!empty($_POST['bet-amount'])){
        //determinate if the player won or lost the bet
        if(isset($_POST['bet-left'])){
            if($_SESSION['hero_left_winState'] === 1){
                $_SESSION['wallet'] += $_POST['bet-amount'] * 2;
                echo "Vous avez parié à gauche et gagné";
            }                           
            if($_SESSION['hero_left_winState'] === 2){
                echo "Vous avez parié à gauche et perdu";
            }
        }
        if(isset($_POST['bet-right'])){
            if($_SESSION['hero_right_winState'] === 1){
                $_SESSION['wallet'] += $_POST['bet-amount'] * 2;
                echo "Vous avez parié à droite et gagné";
            }                          
            if($_SESSION['hero_right_winState'] === 2){
                echo "Vous avez parié à droite et perdu";
            }
        }
        //Update wallet after bet      
        if(!empty($_POST['bet-amount'])){
            $_SESSION['wallet'] -= $_POST['bet-amount'];
            if($_SESSION['wallet'] <= 0){
                $_SESSION['wallet'] = 0;
            }
        }
    }
