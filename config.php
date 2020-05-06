<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);


define('DBNAME', 'beejee');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');



function getAllTODO() {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
    $sql = "SELECT * FROM todo";
    $statement = $db->prepare($sql);
    $statement -> execute();
    $info = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $info;
}


function addTODO($data) {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
    $sql = 'INSERT INTO todo (name, email, text) VALUES (:name, :email, :text)';
    $statement = $db->prepare($sql);
    $statement->bindValue(':name', $_POST['name']);
    $statement->bindValue(':email', $_POST['email']);
    $statement->bindValue(':text', $_POST['add']);
    $statement -> execute();
    setcookie('ok', 'Задача сохранена',time() +5, '/', '', false);
    header('Location: /');
    exit();
}

function showTODO($id) {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
    $sql = "SELECT * FROM todo WHERE id=:id";
    $statement = $db ->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $info = $statement->fetch(PDO::FETCH_ASSOC);
    return $info;
}

function deleteTODO($id) {

    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER,PASS);
    $sql = "DELETE FROM todo WHERE id=:id";
    $statement = $db->prepare($sql);
    $statement->bindValue(":id", $id);
    $statement->execute();

    header('Location: /');
    exit();
}

function updateTODO($data) {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
    $sql = 'UPDATE todo SET name=:name, email=:email, text=:text WHERE id=:id';
    $statement = $db->prepare($sql);
    $statement->execute($data);
    header('Location: /');
    exit();
}

function registration($data) {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
    $sql = 'INSERT INTO users (login, password) VALUES (:login, :pass)';
    $statement = $db->prepare($sql);
    $statement->execute($data);
    header('Location: /');
    exit();
}

function login($data) {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
    $sql = 'SELECT * FROM users WHERE login=:login AND password=:pass';
    $statement = $db->prepare($sql);
    $statement->bindvalue(':login', $_POST['login']);	//Заполняем данные
    $statement->bindvalue(':pass', $_POST['pass']);
    $statement->execute();
    $statement = $statement->fetchAll();
    if (count($statement)>0) {//Если база вернула 1 значение, значит и логин и пароль совпали. отлично
//    echo '<meta charset="UTF-8">Ура! Мы авторизировались!';
//        $_SESSION['user'] = '[0]';//сохраняем обьект пользователя в сессии
        $url = '/';
        header('Location: '. $url);

    } else {
        echo '<meta charset="UTF-8">Логин или пароль не верный или пользователь не существует';
    }
}