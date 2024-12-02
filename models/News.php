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
}
