<?php

require_once '_start_session.php';


if(isset($_SESSION['email']['auth']) && $_SESSION['email']['auth']){
    header('Location: index.php');
    exit;
}