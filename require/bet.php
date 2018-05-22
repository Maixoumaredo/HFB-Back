<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    require 'config.php';        


    if(isset($_POST['next-fight'])){

        $query = $pdo->query('SELECT * FROM heroes');
        $heroes = $query->fetchAll();
    
        // Define an url array
        $heroes_url = [];

        // Generate an API connection url for each hero 
        foreach($heroes as $_hero)
        {
            array_push($heroes_url, 'http://superheroapi.com/api/1836814349697165/'.$_hero->id);
        }

        // Decode 2 random heroes url
        $_SESSION['hero_left'] = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
        $_SESSION['hero_right'] = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
        header("Location: ./fight-1v1.php");       

        // Get name heroes
        $_SESSION['hero_name1']= $_SESSION['hero_left']->name;
        $_SESSION['hero_name2'] = $_SESSION['hero_right']->name;

        // Get image link
        $_SESSION['hero_left_id'] = $_SESSION['hero_left']->id;
        $_SESSION['hero_right_id'] = $_SESSION['hero_right']->id;

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
        foreach($_SESSION['hero_left']->powerstats as $_hero_left_powerstat)
        {
            $_SESSION['hero_left_power'] += $_hero_left_powerstat;
        }

        // Calcul hero_right power
        $_SESSION['hero_right_power'] = 0;
        foreach($_SESSION['hero_right']->powerstats as $_hero_right_powerstat)
        {
            $_SESSION['hero_right_power'] += $_hero_right_powerstat;
        }

        // Determinate winner
        if($_SESSION['hero_left_power'] < $_SESSION['hero_right_power'])
        {
            $_SESSION['hero_left_winState'] = 2;
            $_SESSION['hero_right_winState'] = 1;
            $_SESSION['winner'] = $_SESSION['hero_name1'];
        }
        if($_SESSION['hero_left_power'] > $_SESSION['hero_right_power'])
        {
            $_SESSION['hero_left_winState'] = 1;
            $_SESSION['hero_right_winState'] = 2;
            $_SESSION['winner'] = $_SESSION['hero_name2'];
        }
    }
    // Send form
    if(!empty($_POST['bet-amount']) && $_POST['bet-amount'] >= 0 ){
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
                $_SESSION['wallet'] = 500;
            }
        }

        $query = $pdo->query('SELECT * FROM users');
        $login = $query->fetchAll();
        $prepare = $pdo->prepare('INSERT INTO users (pseudo, email, hashed_password)
        VALUES (:pseudo, :email, :hashed_password)');
        $prepare->bindValue(':pseudo', $pseudo);
        $prepare->bindValue(':hashed_password', $hashed_password);
        $prepare->bindValue(':email', $email);
        $exec = $prepare->execute();
        
        header("Location: ./result-1v1.php");        
    }
