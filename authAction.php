<?php require_once 'config.php';

$user = $_POST['login'];
setcookie('user', $user, time()+999999, '/', '', false);


login($_POST);
