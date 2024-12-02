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

  require_once __DIR__ . '/controllers/NewsController.php';
  $controller = new NewsController();
  $controller->deleteNews($id);

  // Route mặc định là ở trang dashboard.php(admin): sau sửa lại là ở trang login
} else {
  require_once 'views/admin/dashboard.php';
}

?>