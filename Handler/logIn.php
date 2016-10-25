<?php

require_once '../autoload.php';

use Controller\LoginController;

$loginController = new LoginController();
return $loginController->login();