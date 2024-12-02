<?php
require_once __DIR__ . '/../models/News.php';

class NewsController
{
  private $newsModel;

  public function __construct()
  {
    $this->newsModel = new News();
  }

  //-show các bài báo
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

  //-xóa 1 bài báo theo id gửi lên
  public function deleteNews($id)
  {
    // Kiểm tra id hợp lệ
    if (!is_numeric($id) || $id <= 0) {
      echo "ID không hợp lệ.";
      return;
    }

    try {
      // Gọi phương thức delete từ model
      if ($this->newsModel->deleteNews($id)) {
        // Nếu xóa thành công, thông báo và chuyển hướng về trang danh sách
        echo "Bài báo đã được xóa thành công.";
        // Redirect hoặc chuyển hướng về trang danh sách tin tức
        header("Location: /admin/news");
        exit;
      } else {
        // Nếu không xóa được, thông báo lỗi
        echo "Xóa bài báo thất bại.";
      }
    } catch (Exception $e) {
      // Xử lý lỗi nếu có
      echo "Có lỗi xảy ra: " . $e->getMessage();
    }
  }
}
