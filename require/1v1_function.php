<?php 
    require 'config.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    // FIGHT 1V1

    // Fetch heroes from sql database
    $query = $pdo->query('SELECT * FROM heroes');
    $heroes = $query->fetchAll();

    // Minimum Wallet
    if ($_SESSION['wallet'] <= 500){
        $_SESSION['wallet'] = 500;
    }

    // Define an url array
    $heroes_url = [];

    // Generate an API connection url for each hero 
    foreach($heroes as $_hero)
    {
        array_push($heroes_url, 'http://superheroapi.com/api/1836814349697165/'.$_hero->id);
    }

    // Decode 2 random heroes url
    $hero1 = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
    $hero2 = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));

    // Get name heroes
    $_SESSION['hero_name1']= $hero1->name;
    $_SESSION['hero_name2'] = $hero2->name;

    // Get image link
    $_SESSION['hero1_id'] = $hero1->id;
    $_SESSION['hero2_id'] = $hero2->id;

    // Get image link 1
    $query = $pdo->prepare('SELECT list_image_link FROM image WHERE list_id = :id');
    $query->bindParam(':id', $_SESSION['hero1_id']);
    $query->execute();
    $image1 = $query->fetch();
    $_SESSION['image1'] = $image1->list_image_link;

    // Get image link 2
    $query = $pdo->prepare('SELECT list_image_link FROM image WHERE list_id = :id');
    $query->bindParam(':id', $_SESSION['hero2_id']);
    $query->execute();
    $image2 = $query->fetch();
    $_SESSION['image2'] = $image2->list_image_link;

    // Calcul hero1 power
    $_SESSION['hero1_power'] = 0;
    foreach($hero1->powerstats as $_hero1_powerstat)
    {
        $_SESSION['hero1_power'] += $_hero1_powerstat;
    }

    // Calcul hero2 power
    $_SESSION['hero2_power'] = 0;
    foreach($hero2->powerstats as $_hero2_powerstat)
    {
        $_SESSION['hero2_power'] += $_hero2_powerstat;
    }

    // Calcul odds
    $greaterPower = 0;
    $lesserPower = 0;

    $_SESSION['hero1_probability'] = 0.5;
    $_SESSION['hero2_probability'] = 0.5;

    $_SESSION['hero1_odd'] = 0;
    $_SESSION['hero2_odd'] = 0;

    if ($_SESSION['hero1_power'] > $_SESSION['hero2_power'])
    {
        $greaterPower = $_SESSION['hero1_power'];
        $lesserPower = $_SESSION['hero2_power'];

        $differencePower = $greaterPower - $lesserPower;
        $_SESSION['hero1_probability']+= $differencePower * 0.00078;
        $_SESSION['hero2_probability'] -= $differencePower * 0.00078;

        $_SESSION['hero1_odd'] = round(1 / $_SESSION['hero1_probability'], 2);
        $_SESSION['hero2_odd'] = round(1 / $_SESSION['hero2_probability'], 2);

        // Determinate winner
        $rand = rand(0,100) / 100;
        $_SESSION['hero1_winState'] = '';
        $_SESSION['hero2_winState'] = '';

        if($rand <= $_SESSION['hero1_probability'])
        {
            $_SESSION['hero1_winState'] = 'win';
            $_SESSION['hero2_winState'] = 'loose';
        } 
        else 
        {
            $_SESSION['hero2_winState'] = 'loose';
            $_SESSION['hero1_winState'] = 'win';
        }
    }
    else
    {
        $greaterPower = $_SESSION['hero2_power'];
        $lesserPower = $_SESSION['hero1_power'];

        $differencePower = $greaterPower - $lesserPower;
        $_SESSION['hero1_probability'] -= $differencePower * 0.00078;
        $_SESSION['hero2_probability'] += $differencePower * 0.00078;

        $_SESSION['hero1_odd'] = round(1 / $_SESSION['hero1_probability'], 2);
        $_SESSION['hero2_odd'] = round(1 / $_SESSION['hero2_probability'], 2);
        
        $oddLeft = $_SESSION['hero1_odd'];
        $oddRight = $_SESSION['hero2_odd'];
        $rand = rand(0,100) / 100;
        $_SESSION['hero1_winState'] = '';
        $_SESSION['hero2_winState'] = '';

        if($rand <= $_SESSION['hero2_probability'])
        {
            $_SESSION['hero1_winState'] = 'loose';
            $_SESSION['hero2_winState'] = 'win';
        }
            else 
        {
            $_SESSION['hero1_winState'] = 'win';
            $_SESSION['hero2_winState'] = 'loose';
        }
    }

// BET FORM

$query = $pdo->query('SELECT * FROM users');
$users = $query->fetchAll();

$userWallet = $_SESSION['wallet'];
$pseudo = $_SESSION['pseudo'];
$userBet = 0;
$userSide = '';

// Send form
if(!empty($_POST['bet-amount']) && $userWallet > 0)
{
    if(isset($_POST['bet-left']))
    {
        $userBet = $_POST['bet-amount'];
        $userSide = 'left';
    }
    else if(isset($_POST['bet-right']))
    {
        $userBet = $_POST['bet-amount'];
        $userSide = 'right';
    }
    //Update wallet after bet
    $userWallet -= $userBet;

    // User win ?
    if($_SESSION['hero1_winState'] == 'win' && $userSide == 'left')
    {
        $userWallet += $userBet * $_SESSION['hero1_odd'];
        echo 'Gagné sur '.$_SESSION['hero_name1'].' !';
    }
    else if($_SESSION['hero2_winState'] == 'win' && $userSide == 'right')
    {
        $userWallet += $userBet * $_SESSION['hero2_odd'];
        echo 'Gagné sur '.$_SESSION['hero_name2'].' !';
    }
    else
    {
        echo 'Perdu';
    }

    // Update wallet after win
    $_SESSION['wallet'] = $userWallet;

    $prepare = $pdo->prepare('
        UPDATE
            users
        SET
            wallet = :wallet
        WHERE 
            pseudo = :pseudo
    ');

    $prepare->bindValue('wallet', $userWallet);
    $prepare->bindValue('pseudo', $pseudo);
    $prepare->execute();

    // Reset field
    $_POST['name'] = '';
    $_POST['bet-amount'] = '';
}

    echo '<pre>';
    var_dump($_SESSION['image1']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['image2']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero1_winState']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero2_winState']);
    echo '</pre>';
    
    echo '<pre>';
    var_dump($_SESSION['hero1_id']);
    echo '</pre>';
    var_dump($_SESSION['hero2_id']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero_name1']);
    echo '</pre>';

    echo '<pre‡>';
    var_dump($_SESSION['hero_name2']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero1_power']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero2_power']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero1_odd']);
    echo '</pre>';

    echo '<pre>';
    var_dump($_SESSION['hero2_odd']);
    echo '</pre>';
?>