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

  //-thêm mới tin tức
  public function addNews()
  {
    // Đảm bảo thư mục images tồn tại
    $imageDir = __DIR__ . '/../images';
    if (!is_dir($imageDir)) {
      mkdir($imageDir, 0777, true); // Tạo thư mục nếu chưa có
    }

    // Kiểm tra xem có phải là POST request không
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Lấy dữ liệu từ form
      $title = $_POST['title'];
      $content = $_POST['content'];
      $category_id = $_POST['category_id'];

      // Kiểm tra lỗi tải lên ảnh
      if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        echo "Chưa chọn ảnh để tải lên!";
        exit();
      }

      // Tạo đường dẫn để lưu ảnh
      $imagePath = $imageDir . '/' . basename($_FILES['image']['name']);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        // Tạo đối tượng dữ liệu
        $data = new stdClass();
        $data->title = $title;
        $data->content = $content;
        $data->image = '../../../images/' . basename($_FILES['image']['name']);
        $data->category_id = $category_id;

        // Gọi hàm addNews để thêm tin tức
        $newsModel = new News();
        $newsModel->addNews($data);

        // Chuyển hướng về trang danh sách tin tức
        header("Location: /admin/news");
        exit();
      } else {
        echo "Lỗi khi di chuyển tệp tin!";
      }
    }
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
