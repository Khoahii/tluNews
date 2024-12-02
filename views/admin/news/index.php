<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Tin Tức</title>
  <link rel="stylesheet" href="#">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: white;
      padding: 15px 0;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-size: 16px;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .form-group textarea {
      height: 150px;
    }

    .btn-submit {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #0056b3;
    }

    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 15px;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
  </style>
</head>

<body>
  <header>
    <h1>Danh Sách Tin Tức</h1>
  </header>

  <div class="container">
    <h2>Quản Lý Tin Tức</h2>
    <a href="#" class="btn-submit">Thêm Tin Tức Mới</a>

    <table>
      <thead>
        <tr>
          <th>Tiêu Đề</th>
          <th>Danh Mục</th>
          <th>Ngày Tạo</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dữ liệu sẽ được lấy từ cơ sở dữ liệu -->
        <tr>
          <td>Tiêu đề bài viết 1</td>
          <td>Tin Tức</td>
          <td>01/12/2024</td>
          <td>
            <a href="edit.php?id=1">Chỉnh Sửa</a> |
            <a href="delete.php?id=1" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
          </td>
        </tr>
        <!-- Thêm các bài viết khác -->
      </tbody>
    </table>
  </div>

  <footer>
    <p>&copy; 2024 Trang web Quản trị Tin Tức - Tất cả quyền được bảo lưu.</p>
  </footer>
</body>

</html>