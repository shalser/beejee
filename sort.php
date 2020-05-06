<?php
require_once 'config.php';

if(isset($_POST['name']) &&
    $_POST['name'] === 'name')
{
    echo 'Need wheelchair access.';
}
else
{
    echo 'Do not Need wheelchair access.';
}


