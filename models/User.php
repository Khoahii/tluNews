<?php
require_once 'BaseModel.php'; // Kế thừa BaseModel

class Userr extends BaseModel
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllUsers()
  {
    $sql = "SELECT * FROM users";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(); // Trả về tất cả người dùng
  }


  public function getUser($id)
  {
    $sql = "SELECT * FROM users WHERE id = :id"; // Sử dụng placeholder để bảo mật
    $stmt = $this->conn->prepare($sql); // Chuẩn bị câu lệnh SQL
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Ràng buộc giá trị $id với kiểu INT
    $stmt->execute(); // Thực thi câu lệnh
    return $stmt->fetch();
  }

  
}
