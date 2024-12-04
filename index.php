<?php
// <<<<<<< HEAD
require_once 'controllers/HomeController.php';
require_once 'models/News.php';

$controller = new HomeController();
$action = $_GET['action'] ?? 'index'; // Hành động mặc định là 'index'
$id = $_GET['id'] ?? null;

if ($action == 'index') {
    $controller->index(); // Hiển thị danh sách tin tức
} elseif ($action == 'detail' && $id) {
    $controller->detail($id); // Hiển thị chi tiết tin tức
} elseif ($action == 'search') {
    $controller->search(); // Tìm kiếm tin tức
} else {
    echo "404 Not Found"; // Xử lý lỗi nếu hành động không hợp lệ
}
?>
=======
$requestUri = $_SERVER['REQUEST_URI'];

// Route: Hiển thị danh sách tin tức
if ($requestUri === '/admin/news') {
  require_once __DIR__ . '/controllers/NewsController.php';
  $controller = new NewsController();
  $controller->index();

} 
// Route: Xóa tin tức với id
elseif (preg_match('/^\/admin\/news\/delete\?id=(\d+)$/', $requestUri, $matches)) {
  $id = $matches[1]; // Lấy id từ route động

  require_once __DIR__ . '/controllers/NewsController.php';
  $controller = new NewsController();
  $controller->deleteNews($id);

} 
//-route thêm
else if($requestUri === '/admin/news/add'){
  require_once __DIR__ . '/controllers/NewsController.php';
  $controller = new NewsController();
  $controller->addNews();
} 
//-route edit
elseif (preg_match('/^\/admin\/news\/edit\?id=(\d+)$/', $requestUri, $matches)) {
  $id = $matches[1]; // Lấy id từ route động
  require_once __DIR__ . '/controllers/NewsController.php';
  $controller = new NewsController();
  $controller->updateNews($id);
}

// Route mặc định là ở trang dashboard.php(admin): sau sửa lại là ở trang login
else {
  require_once 'views/admin/dashboard.php';
}

?>
>>>>>>> 19319ad4ade3c29509df0084f610f56d64b5c807
