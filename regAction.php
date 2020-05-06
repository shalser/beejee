<?php require_once 'config.php';
$user = $_POST['login'];
setcookie('user', $user, time()+999999, '/', '', false);


registration($_POST);
