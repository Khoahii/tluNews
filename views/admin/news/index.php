<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Tin Tức</title>
  <link rel="stylesheet" href="#">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      margin: 0;
      padding: 0;
      color: #333;
    }

    header {
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: white;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    header h1 {
      font-size: 36px;
      margin: 0;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 30px;
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    h2 {
      font-size: 30px;
      margin-bottom: 20px;
      color: #333;
    }

    .btn-submit {
      display: inline-block;
      padding: 12px 25px;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      text-decoration: none;
      transition: transform 0.3s, background 0.3s;
    }

    .btn-submit:hover {
      background: linear-gradient(to right, #2575fc, #6a11cb);
      transform: scale(1.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table thead {
      background: #6a11cb;
      color: white;
    }

    table th,
    table td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table th {
      font-size: 18px;
      font-weight: bold;
    }

    table tbody tr:hover {
      background-color: #f9f9f9;
    }

    table img {
      border-radius: 8px;
      transition: transform 0.3s;
    }

    table img:hover {
      transform: scale(1.1);
    }

    table a {
      color: #6a11cb;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    table a:hover {
      color: #2575fc;
    }

    footer {
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: white;
      text-align: center;
      padding: 20px;
      position: fixed;
      width: 100%;
      bottom: 0;
      box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }

    footer p {
      margin: 0;
      font-size: 16px;
    }
  </style>

</head>

<body>
  <header>
    <h1>Danh Sách Tin Tức</h1>
  </header>

  <div class="container">
    <h2>Quản Lý Tin Tức</h2>
    <a href="/views/admin/news/add.php" class="btn-submit">Thêm Tin Tức Mới</a>

    <table>
      <thead>
        <tr>
          <th>Tiêu Đề</th>
          <th>Nội Dung</th>
          <th>Hình Ảnh</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody>
        <!-- Kiểm tra xem $newsList có phải là mảng không trước khi lặp qua -->
        <?php if (is_array($newsList) && !empty($newsList)): ?>
          <?php foreach ($newsList as $news): ?>
            <tr>
              <td><?php echo htmlspecialchars($news['title']); ?></td>
              <td><?php echo htmlspecialchars($news['content']); ?></td>
              <td><img src="<?php echo htmlspecialchars($news['image']); ?>" alt="Hình ảnh tin tức" style="width: 100px; height: auto;" /></td>
              <td>
                <a href="edit.php?id=<?php echo $news['id']; ?>">Chỉnh Sửa</a> |
                <a href="delete.php?id=<?php echo $news['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4">Không có dữ liệu.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <footer>
    <p>&copy; 2024 Trang web Quản trị Tin Tức - Tất cả quyền được bảo lưu.</p>
  </footer>
</body>

</html>