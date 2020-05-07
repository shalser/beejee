<?php
require_once 'config.php';

$data = [
    'name' => $_POST['name']
];


//var_dump($data);
//die();
if(isset($_POST['name']) &&
    $_POST['name'] === 'name')
{
    $a = sortBy($_POST['name']);
    print_r($a);
//    echo '1';
}
else
{
    echo '2';
}


