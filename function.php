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


?>