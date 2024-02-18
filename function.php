<?php

function getposts($connect)
{
    $sql = "SELECT * FROM `Q1`;";
    $posts = mysqli_query($connect , $sql);
    
    $postslist = [];
    
    while ($post = mysqli_fetch_assoc($posts)) {
    
        $postslist[] = $post;
    
    }
    
    echo json_encode($postslist, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}


function getpost($connect , $id)
{

    $sql = "SELECT * FROM `Q1` WHERE `id` = $id;";
    $post = mysqli_query($connect , $sql);
    
    $post_id = mysqli_fetch_assoc($post);
    
    echo json_encode($post_id, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}



function addpost($connect , $data)
{
   
    $id = $data['id'];
    $tittle = $data['tittle'];
    $body = $data['body'];

    $sql = "INSERT INTO `Q1` (`id` , `tittle` , `body`) VALUES ($id, '$tittle', '$body');";
    $post = mysqli_query($connect , $sql);
    
}


function updatepost($connect , $data, $id)
{
   $tittle = $data['tittle'];
   $body = $data['body'];

   $sql = "UPDATE `Q1` SET `tittle` = '$tittle', `body` = '$body' WHERE `id` = $id;";
   $post = mysqli_query($connect , $sql);

}


?>