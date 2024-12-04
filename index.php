<?php
session_start();

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
// Route: Thêm tin tức
elseif ($requestUri === '/admin/news/add') {
    require_once __DIR__ . '/controllers/NewsController.php';
    $controller = new NewsController();
    $controller->addNews();
}
// Route: Chỉnh sửa tin tức
elseif (preg_match('/^\/admin\/news\/edit\?id=(\d+)$/', $requestUri, $matches)) {
    $id = $matches[1]; // Lấy id từ route động
    require_once __DIR__ . '/controllers/NewsController.php';
    $controller = new NewsController();
    $controller->updateNews($id);
}
// Route mặc định
else {
    // Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến login
    if (!isset($_SESSION['admin'])) {
        require_once 'views/admin/login.php';
    } else {
        // Nếu đã đăng nhập, chuyển hướng tới trang dashboard
        require_once 'views/admin/dashboard.php';
    }
}
