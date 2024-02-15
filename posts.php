<?php

header('Content-type: application/json');
require 'connect.php';

$type = $_GET['q'];

if($type ==='posts')
{
$sql = "SELECT * FROM `Q1`;";
$posts = mysqli_query($connect , $sql);

$postslist = [];

while ($post = mysqli_fetch_assoc($posts)) {

    $postslist[] = $post;

}

echo json_encode($postslist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}



?>