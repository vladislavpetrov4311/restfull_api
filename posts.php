<?php

header('Content-type: application/json');
require 'connect.php';
require 'function.php';

$type = $_GET['q'];

$params = explode('/' , $type);

$type = $params[0];
$id = $params[1];


if($type ==='posts')
{

    if($id!= NULL)
    {
        getpost($connect , $id);
    }
    else
    {
        getposts($connect);
    }

}



?>