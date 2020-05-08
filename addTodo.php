<?php require_once 'config.php';

function xss_cleaner($array) {
    foreach($array as $num) {
        $array[$num] = strip_tags($num);
    }
    return $array;
}

$_POST = xss_cleaner($_POST);

addTODO($_POST);
