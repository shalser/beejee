<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);


define('DBNAME', 'mailiq');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');



$data = [
    'name' => $_POST['name'],
    'mail' => $_POST['mail']
];

$db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
$sql = "INSERT INTO users (name, mail) VALUES (:name, :mail)";
$statement = $db->prepare($sql);
$statement -> execute($data);
$lastId = $db->lastInsertId();


$dataOne = [
    'one' => $_POST['one'],
    'two' => $_POST['two'],
    'three' => $_POST['three'],
    'user_id' => $lastId
];

$db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
$sql = "INSERT INTO polls (answer1, answer2, answer3, user_id) VALUES (:one, :two, :three, :user_id)";
$statement = $db->prepare($sql);
$statement -> execute($dataOne);




