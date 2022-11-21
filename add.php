<?php
session_start();
$user_name = $_SESSION['email'];
if(!$_SESSION['auth']){
    header('Location: login.php');
}
else{
    if(
        isset($_POST['name']) && isset($_POST['to_do_at'])
        && !empty($_POST['name']) && !empty($_POST['to_do_at'])
        ) 
    {
         // connexion bdd
         $pdo = new PDO(
            'mysql:host=localhost;dbname=to_do_list_db',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
            );

            $user_db = $pdo->prepare("SELECT * FROM users WHERE email_user = :email");
        $user_db->execute([
        'email' => $_SESSION['email']
    ]);

    $user_info = $user_db->fetch(PDO::FETCH_ASSOC);
    var_dump($user_info['id_user']);


            
            $sql_query = "INSERT INTO `tasks` (`name`, `to_do_at`, `id_user`) VALUES ('".$_POST['name']."', '".$_POST['to_do_at']."', '".$user_info['id_user']."')";
    
            $stmt = $pdo->query($sql_query);

            
            header('Location: index.php');

            unset($pdo);
            
         
    }
}

require_once 'views/add.php';
?>