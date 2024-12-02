<?php
require_once 'BaseModel.php'; // Kế thừa BaseModel

class News extends BaseModel
{
  public function getAllNews()
  {
    $sql = "SELECT * FROM news";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(); // Trả về tất cả người dùng
  }


  public function getNews($id)
  {
    $sql = "SELECT * FROM news WHERE id = :id"; // Sử dụng placeholder để bảo mật
    $stmt = $this->pdo->prepare($sql); // Chuẩn bị câu lệnh SQL
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Ràng buộc giá trị $id với kiểu INT
    $stmt->execute(); // Thực thi câu lệnh
    return $stmt->fetchAll();
  }
}
