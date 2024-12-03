<?php
require_once 'models/News.php';

class HomeController {
    // Hiển thị danh sách tin tức
    public function index() {
        $newsList = News::getAllNews(); // Lấy danh sách tin tức từ model
        require_once 'views/home/index.php'; // Hiển thị danh sách tin tức
    }

    // Hiển thị chi tiết tin tức
    public function detail($id) {
        $news = News::getNewsById($id); // Lấy thông tin chi tiết tin tức từ model
        require_once 'views/news/detail.php'; // Hiển thị thông tin tin tức
    }

    // Tìm kiếm tin tức
    public function search() {
        $keyword = $_GET['keyword'] ?? ''; // Lấy từ khóa từ người dùng nhập
        $newsList = News::searchNews($keyword); // Tìm kiếm tin tức trong database
        require_once 'views/home/index.php'; // Hiển thị danh sách kết quả
    }
}
?>
