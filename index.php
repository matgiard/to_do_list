<?php
session_start();
if(!$_SESSION['auth']){
    header('Location: login.php');
}
else{
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


    
    $result = $pdo->prepare("
            SELECT name, to_do_at, id_task
            FROM tasks
            WHERE id_user = ?
            ORDER BY to_do_at ASC");
    $result->execute([$user_info['id_user']]);

    $tasks = $result->fetchAll(PDO::FETCH_ASSOC);
    
    

    $user_name = $_SESSION['email'];
    
    
    unset($pdo);
}

unset($pdo);




   

require_once 'views/index.php';
?>