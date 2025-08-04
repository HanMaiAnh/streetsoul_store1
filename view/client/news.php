<?php
include_once '../../config/db.php';
include_once '../../model/news.model.php';

$db = new Database();
$conn = $db->conn;

$newsList = getAllNews($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tin tức thời trang</title>
    <style>
        /* news css*/
.section-title {
  text-align: center;
  color: #e91e63;
  margin: 40px 0 20px;
  font-size: 28px;
}

/* Container cho danh sách 4 bài 1 dòng */
.news-row-5 {
  display: flex;
  flex-wrap: wrap; /* Cho phép xuống dòng */
  gap: 20px;
  justify-content: flex-start; /* Căn trái */
  padding: 20px;
}

/* Một bài viết */
.news-item {
  flex: 0 0 calc(25% - 15px); /* 4 bài trên 1 dòng */
  background: white;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  display: flex;
  flex-direction: column;
}

/* Ảnh đại diện */
.news-item img {
  width: 100%;
  height: 160px;
  object-fit: cover;
}

/* Tiêu đề */
.news-item h3 {
  padding: 10px;
  font-size: 16px;
  text-align: center;
  color: #333;
}

/* Nội dung rút gọn */
.news-item p {
  padding: 0 10px 10px;
  font-size: 14px;
  color: #555;
  text-align: justify;
}

/* Ngày đăng */
.news-item small {
  text-align: center;
  font-size: 12px;
  color: #888;
  margin-top: auto;
  padding: 0 10px 10px;
}
    </style>
</head> 
<body>
    <?php include_once '../layout/header.php'; ?>

   <div class="container">
    <h2 class="section-title">Tin tức thời trang Yamy Shop</h2>
    <div class="news-row-5">
        <?php foreach ($newsList as $news): ?>
            <div class="news-item">
                <h3><?= htmlspecialchars($news['title']) ?></h3>
                <?php if (!empty($news['image'])): ?>
                    <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                <?php endif; ?>
                <p><?= nl2br(htmlspecialchars(mb_substr($news['content'], 0, 150))) ?>...</p>
                <small>Đăng ngày: <?= $news['created_at'] ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once '../layout/footer.php'; ?>

</body>
</html>