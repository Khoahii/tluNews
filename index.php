<?php
//- connect database
require_once "config/database.php";

//- lay ra url
$controller = $_GET['controller'] ?? "";

echo $controller;

//-check admin hay client
switch ($controller) {
  case 'admin':
    require_once 'views/admin/dashboard.php';
    break;
  
  default:
    require_once 'views/admin/dashboard.php';
    break;
}
?>
