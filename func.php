<?php
require_once 'autoload.php';
use db\DBConnection;

function t($email){
$connection = DBConnection::getInstance();

$selectId = "SELECT id_user, email FROM users WHERE email LIKE (?)";
$statement = $connection->prepare($selectId);
$statement->execute(array($email));
return $statement->fetchAll(PDO::FETCH_ASSOC);
}