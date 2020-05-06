<?php require_once 'config.php';

setcookie ('user', '', time() - 3600);

header('Location: /');