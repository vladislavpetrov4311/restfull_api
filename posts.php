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
else if($method ==='PATCH')
{

    if($type ==='posts')
    {
    
        if($id!= NULL)
        {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updatepost($connect , $data , $id);
        }
    }

}
else if($method ==='DELETE')
{

    if($type ==='posts')
    {
    
        if($id!= NULL)
        {
            deletepost($connect , $id);
        }
    }

}




?>