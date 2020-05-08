<?php require_once 'config.php';
$user = $_POST['login'];
setcookie('user', $user, time()+999999, '/', '', false);

if ((strlen($_POST['login']) <= 30) && ((strlen ($_POST['pass']))) <= 30) {//проверяем чтоб логин и пароль был меньше 30 символов
    $login = htmlspecialchars($_POST['login']); //убираем спецсимволы
    $pass = htmlspecialchars($_POST['pass']); //убираем спецсимволы
}

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));



if (preg_match("/([A-Za-z\d\-_]){3,12}/", $login)) {
    registration($_POST);
}else{
    setcookie('incorrect-login', 'Логин указан не правильно',time() +5, '/', '', false);
    header('Location: http://beejee/register.php');
}

if ($pass === '') {
    setcookie('incorrect-pass', 'Пароль указан не правильно',time() +5, '/', '', false);
    header('Location: http://beejee/register.php');
}else{
    registration($_POST);
}

