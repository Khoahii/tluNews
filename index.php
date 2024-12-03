<?php
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
