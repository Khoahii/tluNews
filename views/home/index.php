<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Chủ</title>
  <link rel="stylesheet" href="#">
  <style>
    body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f2f5;
  color: #333;
}

header {
  background: linear-gradient(135deg, #4e54c8, #8f94fb);
  color: white;
  padding: 20px 0;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

header h1 {
  font-size: 36px;
  margin: 0;
}

nav {
  margin-top: 10px;
}

nav a {
  color: white;
  text-decoration: none;
  margin: 0 20px;
  font-weight: 500;
  font-size: 18px;
  transition: color 0.3s ease;
}

nav a:hover {
  color: #ffe600;
}

.content {
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.content h2 {
  font-size: 28px;
  color: #4e54c8;
  margin-bottom: 20px;
  border-left: 5px solid #8f94fb;
  padding-left: 10px;
}

.news-item {
  display: flex;
  margin-bottom: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid #ddd;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.news-item img {
  width: 200px;
  height: 150px;
  object-fit: cover;
  border-radius: 10px;
  margin-right: 20px;
}

.news-item h2 a {
  font-size: 22px;
  color: #4e54c8;
  text-decoration: none;
  transition: color 0.3s ease;
}

.news-item h2 a:hover {
  color: #8f94fb;
}

.news-item p {
  font-size: 16px;
  color: #666;
}

footer {
  background: linear-gradient(135deg, #8f94fb, #4e54c8);
  color: white;
  text-align: center;
  padding: 16px;
  width: 100%;
  bottom: 0;
  box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

footer p {
  margin: 0;
  font-size: 14px;
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