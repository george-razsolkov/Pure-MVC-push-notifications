<?php
use Model\Post;
use Controller\PostController;

require_once 'Controller/PostController.php';

require_once 'autoload.php';

$post = new Post('sss', 'sss', 'sss', 'sss');

$postcontrol = new PostController();


var_dump($_POST);