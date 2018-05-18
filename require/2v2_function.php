<?php
    // Fetch heroes from sql database
    $query = $pdo->query('SELECT * FROM heroes');
    $heroes = $query->fetchAll();

    // Define an url array
    $heroes_url = [];

    // Generate an API connection url for each hero 
    foreach($heroes as $_hero)
    {
        array_push($heroes_url, 'http://superheroapi.com/api/1836814349697165/'.$_hero->id);
    }

    // Decode 4 random heroes url
    $hero1 = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
    $hero2 = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
    $hero3 = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));
    $hero4 = json_decode(file_get_contents($heroes_url[array_rand($heroes_url)]));

    // Calcul team1 power
    $team1_power = 0;
    foreach($hero1->powerstats as $_hero1_powerstat)
    {
        $team1_power += $_hero1_powerstat;
    }
    foreach($hero2->powerstats as $_hero2_powerstat)
    {
        $team1_power += $_hero2_powerstat;
    }

     // Calcul team2 power
    $team2_power = 0;
    foreach($hero3->powerstats as $_hero3_powerstat)
    {
        $team2_power += $_hero3_powerstat;
    }
    foreach($hero4->powerstats as $_hero4_powerstat)
    {
        $team2_power += $_hero4_powerstat;
    }

    // Calcul odds
    $greaterPower = 0;
    $lesserPower = 0;

    $team1_probability = 0.5;
    $team2_probability = 0.5;

    $team1_odd = 0;
    $team2_odd = 0;

    if ($team1_power > $team2_power)
    {
        $greaterPower = $team1_power / 2;
        $lesserPower = $team2_power / 2;

        $differencePower = $greaterPower - $lesserPower;
        $team1_probability += $differencePower * 0.00078;
        $team2_probability -= $differencePower * 0.00078;

        $team1_odd = round(1 / $team1_probability, 2);
        $team2_odd = round(1 / $team2_probability, 2);

        // Determinate winner
        $rand = rand(0,100) / 100;

        if($rand <= $team1_probability)
        {
            echo 'Team 1 win';
        } 
        else 
        {
            echo 'Team 2 win';
        }
    }
    else
    {
        $greaterPower = $team2_power / 2;
        $lesserPower = $team1_power / 2;

        $differencePower = $greaterPower - $lesserPower;
        $team1_probability -= $differencePower * 0.00078;
        $team2_probability += $differencePower * 0.00078;

        $team1_odd = round(1 / $team1_probability, 2);
        $team2_odd = round(1 / $team2_probability, 2);

        // Determinate winner
        $rand = rand(0,100) / 100;

        if($rand <= $team2_probability)
        {
            echo 'Team 2 win';
        }
            else 
        {
            echo 'Team 1 win';
        }
    }
?>