<!DOCTYPE html>
<html lang="vi">
<!-- <<<<<<< HEAD -->


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Tin Tức</title>
  <link rel="stylesheet" href="#">
  <style>
    body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
  background: linear-gradient(180deg, #f0f2f5, #ffffff);
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
  max-width: 900px;
  margin: 40px auto;
  padding: 20px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.news-detail {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.news-detail img {
  width: 100%;
  max-width: 800px;
  height: auto;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  margin-bottom: 20px;
}

.news-detail h1 {
  font-size: 36px;
  color: #4e54c8;
  text-align: center;
  margin-bottom: 20px;
  border-bottom: 3px solid #8f94fb;
  display: inline-block;
}

.news-detail p {
  font-size: 18px;
  color: #555;
  line-height: 1.8;
  text-align: justify;
  margin-bottom: 20px;
}

.news-detail .info {
  margin-top: 20px;
  font-size: 16px;
  color: #777;
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding-top: 20px;
  border-top: 1px solid #ddd;
}

.news-detail .info span {
  display: inline-block;
}

footer {
  background: linear-gradient(135deg, #8f94fb, #4e54c8);
  color: white;
  text-align: center;
  padding: 15px;
  position: fixed;
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
    <h1>Chi Tiết Tin Tức</h1>
    <nav>
      <a href="#">Trang chủ</a>
      <a href="#">Tin tức</a>
      <a href="#">Giới thiệu</a>
      <a href="#">Liên hệ</a>
    </nav>
  </header>

  <div class="content">
  <div class="content">
  <ul>
        <?php if (!empty($newsList)): ?>
            <?php foreach ($newsList as $news): ?>
                <li>
                    <a href="/?action=detail&id=<?php echo $news['id']; ?>">
                        <?php echo htmlspecialchars($news['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Không có tin tức nào!</li>
        <?php endif; ?>
    </ul>
  </div>

  </div>

  <footer>
    <p>&copy; 2024 Trang web Tin Tức - Tất cả quyền được bảo lưu.</p>
  </footer>
</body>

</html>
