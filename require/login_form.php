
<?php
    $errorMessagesLogin = [];
    $successMessagesLogin = [];
    $logstate = [];
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    if(isset($_POST['submit'])){
        if(!empty($_POST)){
            $pseudo = trim($_POST['pseudo']);
            $email = trim($_POST['email']);            
            $password = trim($_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            if(empty(($pseudo || $email) and $password)){
                $errorMessagesLogin[] = 'Missing field';
            }else{
                foreach ($users as $_users){
                    if (($_POST['pseudo'] == $_users->pseudo || $_POST['email'] == $_users->email) and password_verify($password, $_users->hashed_password)){
                        $_POST['pseudo'] = $_users->pseudo;
                        $_SESSION['valid'] = true;
                        $_SESSION['pseudo'] = $_users->id;;
                        $_SESSION['id'] = $_users->id;              
                        $_SESSION['wallet'] = $_users->wallet;
                        $_SESSION['numberbets'] = $_users->numberbets;
                        $_SESSION['numberbetswon'] = $_users->numberbetswon;
                        $_SESSION['winner'] = '';
                        $_SESSION['image1'] = '';
                        $_SESSION['image2'] = '';
                        $_SESSION['hero1_winState'] = '';
                        $_SESSION['hero2_winState'] = '';
                        $_SESSION['hero1_id'] = '';
                        $_SESSION['hero2_id'] = '';
                        $_SESSION['hero_name1'] = '';
                        $_SESSION['hero_name2'] = '';
                        $_SESSION['betRatingLeft'] = '';
                        $_SESSION['betRatingRight'] = '';
                        $_SESSION['hero1_power'] = '';
                        $_SESSION['hero2_power'] = '';
                        $_SESSION['hero1_odd'] = '';
                        $_SESSION['hero2_odd'] = '';
                        $_SESSION[] = [];
                        $logstate = 'success';
                        setcookie('pseudo', $_POST['pseudo'], time() + 3600, null, null, false, true);
                        header("Location: ../pages/stats.php");
                    }
                }
                if ($logstate == 'success'){
                    $successMessagesLogin[] = 'You have logged in';
                }else{
                    $errorMessagesLogin[] = 'Wrong username or password';                    
                }
            }
        }
    }
?>