<?php 

require_once 'partials/_check_is_not_auth.php';
require_once 'models/User.php';
require_once 'views/register.php';


if(isset($_POST['submit'])) {
    require_once 'partials/_start_session.php';

    if(empty($_POST['email_user']) || empty($_POST['password_user'])) {
        $_SESSION['errors'][] = "Veuillez remplir tous les champs.";
    }else {
        $secured_data = [
            'email' => htmlspecialchars($_POST['email_user']),
            'password' => htmlspecialchars($_POST['password_user'])
        ];
        
        try {
            $user = new User();
            $user->setEmail($secured_data['email']);
            $user->setPassword($secured_data['password']);
        } catch (Exception $e) {
            var_dump($e->getMessage()); die;
            $_SESSION['errors'] = $e->getMessage();
        }
        
        if(empty($_SESSION['errors']))    {
           
            if ($user->isExisted()) {
                $_SESSION['errors'][] = "cette adresse mail existe déjà";
            }
            
        }
    
        
        if(empty($_SESSION['errors']))    {
        
            $user->insert();
            header('Location: login.php');
            exit;
        }

    }


    

      
    }



?>