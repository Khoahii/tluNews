<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Tin Tức</title>
</head>
<body>
    <?php if (!empty($news)): ?>
        <h1><?php echo htmlspecialchars($news['title']); ?></h1>
        <p><?php echo htmlspecialchars($news['content']); ?></p>
        <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="Hình ảnh tin tức">
    <?php else: ?>
        <p>Không tìm thấy tin tức!</p>
    <?php endif; ?>
    <a href="/">Quay lại danh sách</a>
</body>
</html>
