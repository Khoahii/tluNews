<?php

$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
//-start routes admin
  case '/admin/news':
    // Bao gồm controller NewsController
    require_once __DIR__ . '/controllers/NewsController.php';

    // Tạo đối tượng NewsController và gọi phương thức index
    $controller = new NewsController();
    $controller->index();
    break;

//-end routes admin

//-start routes client

//-end routes client

  default:
    require_once 'views/admin/dashboard.php';
    break;
}
