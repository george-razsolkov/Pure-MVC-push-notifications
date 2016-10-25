<?php

//var_dump($_POST);


session_start();

$postId = $_SESSION['postId'];

$array['state'] ='sucess';
$array['id'] = $postId;


echo json_encode($array);