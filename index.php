<?php
$requestUri = $_SERVER['REQUEST_URI'];

// Route: Hiển thị danh sách tin tức
if (preg_match('/^\/admin\/news$/', $requestUri)) {
  require_once __DIR__ . '/controllers/NewsController.php';
  $controller = new NewsController();
  $controller->index();

  // Route: Xóa tin tức với id
} elseif (preg_match('/^\/admin\/news\/delete\?id=(\d+)$/', $requestUri, $matches)) {
  $id = $matches[1]; // Lấy id từ route động
  echo "<h1>Haha</h1>";

  // Gọi Controller (nếu cần)
  // require_once __DIR__ . '/controllers/NewsController.php';
  // $controller = new NewsController();
  // $controller->delete($id);

  // Route mặc định
} else {
  require_once 'views/admin/dashboard.php';
}

?>