<?php
include_once '../../config/db.php';
include_once '../../model/news.model.php';
include_once '../layout/header.php';

$db = new Database();
$conn = $db->conn;

$newsList = getAllNews($conn);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tin tức thời trang</title>
    <link rel="stylesheet" href="/streetsoul_store1/public/style.css">
</head>
<body>
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
</body>
</html>

<?php include_once '../layout/footer.php'; ?>