<?php
require_once '../autoload.php';
use Controller\DeviceController;

$deviceController = new DeviceController();
$device = $deviceController->getDevices();

echo json_encode($device);