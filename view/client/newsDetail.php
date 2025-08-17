<?php
include_once '../../config/db.php';
include_once '../../model/news.model.php';

$db = new Database();
$conn = $db->conn;

// Lấy ID từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy tin tức theo ID
$news = getNewsById($conn, $id);
$otherNews = getOtherNews($conn, $id);

if (!$news) {
    die("Bài viết không tồn tại!");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($news['title']) ?></title>

<style>
.news-detail {
    max-width: 90%;
    width: 90%;
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.news-detail img {
    width: 35%;
    max-width: 50%; /* hoặc 100% nếu muốn full */
    height: 35%; /* cố định chiều cao */
    object-fit: cover; /* cắt ảnh vừa khung */
    display: block;
    margin: 0 auto 20px;
    border-radius: 8px;
}
.news-detail h1 {
    color: #e91e63;
    margin-bottom: 10px;
}
.news-detail small {
    color: #888;
    display: block;
    margin-bottom: 20px;
}
.news-detail p {
    line-height: 1.6;
    text-align: justify;
}

/*css tin tức khác */
.other-news-title {
    max-width: 90%;
    margin: 20px auto;
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

.news-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    max-width: 90%;
    margin: 0 auto;
}

.news-card {
    width: calc(33.333% - 20px);
    border: 1px solid #eee;
    border-radius: 8px;
    overflow: hidden;
    background: #fff;
    transition: transform 0.3s, box-shadow 0.3s;
}

.news-card a {
    text-decoration: none;
    color: inherit;
    display: block;
}

.news-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
}

.news-card h3 {
    font-size: 16px;
    padding: 10px;
    margin: 0;
}

.news-card p {
    padding: 0 10px 10px;
    color: #777;
    margin: 0;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

</style>
</head>
<body>
    <?php include_once '../layout/header.php'; ?>

    <div class="news-detail">
        <h1><?= htmlspecialchars($news['title']) ?></h1>
        <small>Đăng ngày: <?= $news['created_at'] ?></small>
        <?php if (!empty($news['image'])): ?>
            <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
        <?php endif; ?>
        <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
        <p><?= nl2br(htmlspecialchars($news['address'])) ?></p>
        <p></h4><?= nl2br(htmlspecialchars($news['infor'])) ?></p>
    </div>
    
    <!-- Tin tức khác -->
<h2 class="other-news-title">Tin tức khác</h2>
<div class="news-list">
    <?php foreach ($otherNews as $item): ?>
        <div class="news-card">
            <a href="newsDetail.php?id=<?= $item['id'] ?>">
                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>">
                <h3><?= htmlspecialchars($item['title']) ?></h3>
            </a>
            <p>Đăng ngày: <?= $item['created_at'] ?></p>
        </div>
    <?php endforeach; ?>
</div>

    <?php include_once '../layout/footer.php'; ?>
</body>
</html>
