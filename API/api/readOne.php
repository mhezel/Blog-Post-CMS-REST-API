<?php 

//ALLOW HTTP REQUEST 

//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//Initialize API
include_once('../core/init.php');

//Instantiate class Posts
$post = new Post($db);

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//Query blog posts
$post->readOne();

    $post_arr = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name,
    );
    print_r(json_encode($post_arr));
?>