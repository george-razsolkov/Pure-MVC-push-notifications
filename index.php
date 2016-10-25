<?php

use View\ErrorView;
use Exceptions\ExceptionHandler;


require_once __DIR__ . '/autoload.php';



set_error_handler([ExceptionHandler::class, 'handleError']);
set_exception_handler([ExceptionHandler::class, 'handleException']);  

$fileNotFound = false;


$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$methodName = isset($_GET['action']) ? $_GET['action'] : 'showLoginForm';

$controllerClassName = '\Controller\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClassName))
{
	$contoller = new $controllerClassName();
	if (method_exists($contoller, $methodName)) {
		$contoller->$methodName();
	} else {
		//echo 'method not found';
		$fileNotFound = true;
	}
} else {
	//echo 'class not found';
	$fileNotFound = true;
}


if ($fileNotFound) {
	
	$errorView = new ErrorView();
	$errorView->render();
}
