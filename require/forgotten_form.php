<?php
    $errorMessagesForgotten = [];
    $successMessagesForgotten = [];
    $sendState = '0';
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    //send state 1 = forgotten done by mail
    //send state 2 = forgotten done by pseudo
    if(isset($_POST['send'])){
        if(!empty($_POST)){
            $pseudo = trim($_POST['pseudo']);
            $email = trim($_POST['email']);
            if(empty($pseudo || $email)){
                $errorMessagesForgotten[] = 'Missing field';
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) and !empty($email)){
                $errorMessagesForgotten[] = 'Invalid mail';
            }
            foreach ($users as $_users){
                if ($_POST['email'] == $_users->email || $_POST['pseudo'] == $_users->pseudo){
                    $sendState = '1';
                    $email = $_users->email;
                    $pseudo = $_users->pseudo;
                }
            }
            if($sendState == '1'){
                $successMessagesForgotten[] = 'Request sent. Check your mail !';

                // generate random password
                function rand_string( $length ) {
                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    return substr(str_shuffle($chars),0,$length);
                }
                $new_password = rand_string(8);

                // hash the new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                echo '<pre>';
                var_dump($hashed_new_password);
                echo '</pre>';
                echo '<pre>';
                var_dump($email);
                echo '</pre>';

                // send hash to database and replace password
                $prepare = $pdo->prepare('UPDATE users SET hashed_password = :hashed_new_password WHERE pseudo = :pseudo');
                $prepare->bindValue(':pseudo', $pseudo);
                $prepare->bindValue(':hashed_new_password', $hashed_new_password);
                $exec = $prepare->execute();

                //Send email
                $to = $email;
                $subject = 'HFB (HeroFightBet) - Password Request';
                $message = 
                'Hello '.$pseudo.' Your new password is '.$new_password.
                'Have fun ! - The HeroFightBet team';
                $headers =
                'From: maximexp2@hotmail.fr'.
                'Reply-To: maximexp2@hotmail.fr'; 
                mail($to, $subject, $message, $headers);
                echo '<pre>';
                var_dump($new_password);
                echo '</pre>';
            }else{
                $errorMessagesForgotten[] = 'Invalid mail or pseudo';
            }
        }
    }
?>