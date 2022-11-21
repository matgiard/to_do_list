<?php

session_start();
$user_name = $_SESSION['email'];
if(!$_SESSION['auth']){
    header('Location: login.php');
}
else{

    $id_to_edit = $_GET['id'];

    $pdo = new PDO(
        'mysql:host=localhost;dbname=to_do_list_db',
        'root',
        '',
        [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );




    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=to_do_list_db',
            'root',
            '',
            [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );

        try {
            $stmt = $pdo->prepare("UPDATE tasks SET `name` = :new_name, `to_do_at`= :new_to_do_at WHERE id_task = :id");
            $stmt->execute([
                'new_name' => $_POST['name'],
                'new_to_do_at' => $_POST['to_do_at'],
                'id' => $id_to_edit
            ]);
            header('Location: index.php');
        } catch (\PDOException $th) {
            var_dump($th);
        }

    }

    $stmt = $pdo->query("SELECT `name`, `to_do_at`, `id_task` FROM `tasks` WHERE `id_task` = '".$_GET['id']."'");

    $tasks = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($pdo);
}
    




require_once 'views/edit.php';
?>