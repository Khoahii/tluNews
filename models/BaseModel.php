<?php
require_once __DIR__ . '/../config/database.php'; // Trả về đối tượng $pdo

// Tạo class cha
class BaseModel
{
  protected $pdo;

  public function __construct()
  {
    // Gọi và gán đối tượng PDO trả về từ database.php
    $this->pdo = require __DIR__ . '/../config/database.php';
  }
}
