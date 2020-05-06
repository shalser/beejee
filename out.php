<?php require_once 'config.php';

setcookie ('user', '', time() - 3600);
setcookie('out', 'Вы вышли', time()+5, '/', '', false);
header('Location: /');