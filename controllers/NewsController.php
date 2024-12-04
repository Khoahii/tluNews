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

  // Cập nhật tin tức
  public function updateNews($id)
  {
    // Kiểm tra id hợp lệ
    if (!is_numeric($id) || $id <= 0) {
      echo "ID không hợp lệ.";
      return;
    }

    // Lấy thông tin bài báo cần cập nhật từ model
    $newModel = new News();
    $new = $newModel->getNews($id);

    // Kiểm tra xem bài báo có tồn tại không
    if (!$new) {
      echo "Bài báo không tồn tại.";
      return;
    }

    // Kiểm tra xem có phải là POST request không
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Lấy dữ liệu từ form
      $title = $_POST['title'];
      $content = $_POST['content'];
      $category_id = $_POST['category_id'];  // Giả sử có thêm category_id trong form

      // Giữ nguyên ảnh cũ nếu không có ảnh mới
      $imagePath = $new['image'];  // Giữ nguyên ảnh cũ mặc định

      if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
        // Nếu có ảnh mới, cập nhật ảnh
        $imageDir = __DIR__ . '/../images';
        if (!is_dir($imageDir)) {
          mkdir($imageDir, 0777, true); // Tạo thư mục nếu chưa có
        }

        // Tạo đường dẫn mới cho ảnh
        $imagePath = $imageDir . '/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
          // Cập nhật đường dẫn ảnh vào cơ sở dữ liệu
          $imagePath = '../../../images/' . basename($_FILES['image']['name']);
        } else {
          echo "Lỗi khi di chuyển tệp tin ảnh!";
          return;
        }
      }

      // Tạo đối tượng dữ liệu
      $data = new stdClass();
      $data->id = $id;
      $data->title = $title;
      $data->content = $content;
      $data->image = $imagePath; // Cập nhật ảnh mới hoặc giữ ảnh cũ
      $data->category_id = $category_id; // Cập nhật category_id nếu có

      // Gọi hàm updateNews từ model để cập nhật tin tức
      if ($newModel->updateNews($data)) {
        // Nếu cập nhật thành công, chuyển hướng về trang danh sách tin tức
        header("Location: /admin/news");
        exit();
      } else {
        echo "Cập nhật bài báo thất bại.";
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
