<?php
require_once 'BaseModel.php'; // Kế thừa BaseModel

class News extends BaseModel
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllNews()
  {
    $sql = "SELECT * FROM news";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(); // Trả về tất cả người dùng
  }


  public function getNews($id)
  {
    $sql = "SELECT * FROM news WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();  // Dùng fetch() thay vì fetchAll() nếu chỉ muốn lấy 1 bản ghi
  }

  //-them 1 baif baos
  public function addNews($data)
  {
    try {
      // Chuẩn bị câu truy vấn với các tham số
      $sql = "INSERT INTO news (title, content, image, created_at, category_id) 
                VALUES (:title, :content, :image, NOW(), :category_id)";

      $stmt = $this->conn->prepare($sql);

      // Liên kết các tham số
      $stmt->bindParam(':title', $data->title);
      $stmt->bindParam(':content', $data->content);
      $stmt->bindParam(':image', $data->image);
      $stmt->bindParam(':category_id', $data->category_id);

      // Thực thi câu lệnh
      if ($stmt->execute()) {
        return true; // Thêm thành công
      } else {
        return false; // Thêm thất bại
      }
    } catch (PDOException $e) {
      // Log lỗi hoặc hiển thị thông báo
      echo "Lỗi: " . $e->getMessage();
      return false;
    }
  }


  public function deleteNews($id)
  {
    try {
      $sql = "DELETE FROM news WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

      if ($stmt->execute()) {
        return true; // Xóa thành công
      } else {
        return false; // Xóa thất bại
      }
    } catch (PDOException $e) {
      // Log lỗi hoặc hiển thị thông báo
      echo "Lỗi: " . $e->getMessage();
      return false;
    }
  }

  public function updateNews($data)
  {
    try {
      // Chuẩn bị câu truy vấn để cập nhật tin tức
      $sql = "UPDATE news SET 
                title = :title, 
                content = :content, 
                image = :image, 
                category_id = :category_id 
                WHERE id = :id";

      $stmt = $this->conn->prepare($sql);

      // Liên kết các tham số
      $stmt->bindParam(':title', $data->title);
      $stmt->bindParam(':content', $data->content);
      $stmt->bindParam(':image', $data->image);
      $stmt->bindParam(':category_id', $data->category_id);
      $stmt->bindParam(':id', $data->id, PDO::PARAM_INT); // Cập nhật bằng id từ đối tượng $data

      // Thực thi câu lệnh
      if ($stmt->execute()) {
        return true; // Cập nhật thành công
      } else {
        return false; // Cập nhật thất bại
      }
    } catch (PDOException $e) {
      // Log lỗi hoặc hiển thị thông báo
      echo "Lỗi: " . $e->getMessage();
      return false;
    }
  }



}
