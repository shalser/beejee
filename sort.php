<?php
require_once 'config.php';


if(isset($_POST['name']) &&
   $_POST['name'] === 'name')
{
    $data = sortBy($_POST['name']);
}
else
{
    echo '2';
}








