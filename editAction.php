<?php require_once 'config.php';

$data = [
    'id' => $_GET['id'],
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'text' => $_POST['add']
];



updateTODO($data);


