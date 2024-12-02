<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Chủ</title>
  <link rel="stylesheet" href="#">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #333;
      color: white;
      padding: 15px 0;
      text-align: center;
    }

    nav {
      margin: 20px 0;
      text-align: center;
    }

    nav a {
      margin: 0 15px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    .content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
    }

    .news-item {
      display: flex;
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
    }

    .news-item img {
      width: 200px;
      height: 150px;
      object-fit: cover;
      margin-right: 20px;
    }

    .news-item h2 {
      font-size: 24px;
      color: #333;
    }

    .news-item p {
      font-size: 16px;
      color: #555;
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
    <h1>Trang Chủ</h1>
    <nav>
      <a href="#">Trang chủ</a>
      <a href="#">Tin tức</a>
      <a href="#">Giới thiệu</a>
      <a href="#">Liên hệ</a>
    </nav>
  </header>

  <div class="content">
    <h2>Tin Tức Mới Nhất</h2>

    <div class="news-item">
      <img src="#" alt="News Image 1">
      <div>
        <h2><a href="#">Tiêu đề bài viết 1</a></h2>
        <p>Đây là đoạn mô tả ngắn về bài viết đầu tiên. Nó cung cấp cái nhìn tổng quan về nội dung bài viết.</p>
      </div>
    </div>

    <div class="news-item">
      <img src="#" alt="News Image 2">
      <div>
        <h2><a href="#">Tiêu đề bài viết 2</a></h2>
        <p>Đoạn mô tả ngắn về bài viết thứ hai. Đây là thông tin về một tin tức khác rất hấp dẫn.</p>
      </div>
    </div>

    <div class="news-item">
      <img src="#" alt="News Image 3">
      <div>
        <h2><a href="#">Tiêu đề bài viết 3</a></h2>
        <p>Thông tin ngắn gọn về bài viết thứ ba, với nội dung mới nhất và cập nhật nhất.</p>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 Trang web Tin Tức - Tất cả quyền được bảo lưu.</p>
  </footer>
</body>

</html>