<?php


header('Content-type: application/json');
require 'connect.php';
require 'function.php';

$method = $_SERVER['REQUEST_METHOD'];


$q = $_GET['q'];

$params = explode('/' , $q);

$type = $params[0];
$id = $params[1];


if($method ==='GET')
{

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

}
else if($method ==='POST')
{
    if($type === 'posts')
    {
        addpost($connect , $_POST);
    }


}





?>