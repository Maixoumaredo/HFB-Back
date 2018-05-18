<?
    $successMessagesDelete = [];
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    if(isset($_POST['delete'])){
        if(!empty($_POST)){
            $id = ($_POST['delete']);
            $prepare = $pdo->prepare('
                DELETE FROM
                    users
                WHERE
                    id = :id
                ');
            $prepare->bindValue(':id', $id);
            $prepare->execute();
            $successMessagesDelete[] = 'Account deleted';
        }
    }
?>


