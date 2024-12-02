<?php
require_once __DIR__ . '/../models/News.php';

class NewsController
{
  private $newsModel;

  public function __construct()
  {
    $this->newsModel = new News();
  }

  public function index()
  {
    try {
      // Lấy tất cả tin tức từ model
      $newsList = $this->newsModel->getAllNews();

      // Kiểm tra nếu không có dữ liệu
      if (empty($newsList)) {
        $newsList = []; // Đảm bảo $newsList là một mảng rỗng khi không có dữ liệu
      }

      // Đảm bảo đóng kết nối sau khi hoàn thành
      $this->newsModel->closeConnection();
    } catch (Exception $e) {
      // Xử lý lỗi nếu có
      $newsList = [];
      // Log lỗi (nếu cần)
      error_log($e->getMessage());
    }

    // Truyền dữ liệu vào view
    require __DIR__ . '/../views/admin/news/index.php';
  }
}
