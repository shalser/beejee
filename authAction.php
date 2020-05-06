<?php require_once 'config.php';

$user = $_POST['login'];
setcookie('user', $user, time()+999999, '/', '', false);
setcookie('auth', 'Вы авторизованы', time()+5, '/', '', false);

login($_POST);
