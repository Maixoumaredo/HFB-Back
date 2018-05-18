<?php
    $errorMessagesCreate = [];
    $successMessagesCreate = [];
    $createstate = [];
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();

    if(isset($_POST['create'])){
        if(!empty($_POST)){
            $pseudo = trim($_POST['pseudo']);
            $password = trim($_POST['password']);
            $email = trim($_POST['email']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            if(empty($pseudo and $password and $email)){
                $errorMessagesCreate[] = 'Missing field';
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) and !empty($pseudo and $password and $email)){
                $errorMessagesCreate[] = 'Invalid mail';
            }
            if(strlen($pseudo) > 15 || strlen($pseudo) < 3){
                $errorMessagesCreate[] = 'Please enter a pseudo between 3 and 15 characters'; 
            }
            foreach ($users as $_users){
                if ($_POST['email'] == $_users->email){
                    $createstate = 'ErrorMail';                  
                }
            }
            if($createstate == 'ErrorMail'){
                $errorMessagesCreate[] = 'Already used email';
            }
            foreach ($users as $_users){
                if ($_POST['pseudo'] == $_users->pseudo){
                    $createstate = 'ErrorPseudo';                  
                }
            }
            if($createstate == 'ErrorPseudo'){
                $errorMessagesCreate[] = 'Already used Pseudo';
            }
            
            // Check if mail exists
            if(empty($errorMessagesCreate)){
                // set API Access Key
                $access_key = '328e2e8f70d933c6357ba812f1d3e421';
                        
                // Initialize CURL:
                $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$_POST['email'].'');  
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Store the data:
                $json = curl_exec($ch);
                curl_close($ch);

                // Decode JSON response:
                $validationResult = json_decode($json, true);
            
                // Access and use your preferred validation result objects
                $validationResult['format_valid'];
                $validationResult['smtp_check'];
                $validationResult['score'];
                if($validationResult['smtp_check'] == false){
                    $errorMessagesCreate[] = 'Use a valid mail';               
                }
            }
            if(empty($errorMessagesCreate)){
                $prepare = $pdo->prepare('INSERT INTO users (pseudo, email, hashed_password)
                VALUES (:pseudo, :email, :hashed_password)');
                $prepare->bindValue(':pseudo', $pseudo);
                $prepare->bindValue(':hashed_password', $hashed_password);
                $prepare->bindValue(':email', $email);
                $exec = $prepare->execute();
                $successMessagesCreate[] = 'New account created';
                $_POST['pseudo'] = '';
                $_POST['hashed_password'] = '';
                $_POST['email'] = '';
            }else{
                $_POST['pseudo'] = '';
                $_POST['hashed_password'] = '';                
                $_POST['email'] = '';
            }
        }
    }
?>