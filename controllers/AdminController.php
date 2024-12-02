<?php
//- lay ra url
$action = $_GET['action'] ?? "";

//-action
switch ($action) {
  case 'add':
    # code...
    break;
  case 'update':
    # code...
    break;
  case 'delete':
    # code...
    break;
  
  default:
    
    $user = new Userr();
    $dataUser = $user->getUser(1);
    require_once '../views/admin/dashboard.php';
    break;
}
?>