<?php
// Thông tin cấu hình cơ sở dữ liệu
$host = 'localhost';
$dbname = 'tintuc';
$username = 'root';
$password = '123456';

try {
  // Kết nối cơ sở dữ liệu với PDO
  $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

  // Tạo đối tượng kết nối
  $pdo = new PDO($dsn, $username, $password);

  // Thiết lập chế độ lỗi để phát hiện lỗi
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Dữ liệu truy vấn mặc định trả về dạng mảng kết hợp
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  // Xử lý lỗi khi không kết nối được
  die("Kết nối thất bại: " . $e->getMessage());
}

// Trả về đối tượng PDO
return $pdo;
