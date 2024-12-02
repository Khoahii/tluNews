<?php
require_once 'BaseModel.php'; // Kế thừa BaseModel

class Userr extends BaseModel
{
  public function getAllUsers()
  {
    $sql = "SELECT * FROM users";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(); // Trả về tất cả người dùng
  }
}
