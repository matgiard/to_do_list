<?php 

if(isset($_POST['connexion']) ) {
    // vérifier si les champs sont remplis
    if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $pdo = new PDO(
                'mysql:host=localhost;dbname=to_do_list_db',
                'root',
                '',
                [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );         

            $query = $pdo->prepare("SELECT * FROM users WHERE email_user = ?");
            $query->execute([$_POST['email']]);
            $user = $query->fetch();

            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (($email == $user['email_user']) && ($password == $user['password_user'])) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['auth'] = true;
                header('Location: index.php');
            } else {
                echo "L'adresse ou le mot de passe saisi est incorrect";
            }

            

} else {
    echo "L'adresse ou le mot de passe saisi est incorrect";
}
};

require_once 'views/login.php';


  
 


?>