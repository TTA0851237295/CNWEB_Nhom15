<?php
session_start();
require_once __DIR__ . '/../../models/News.php';


// Lấy ID bài viết từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy chi tiết bài viết theo ID
$news = News::getById($id);

if (!$news) {
    // Nếu không tìm thấy bài viết, chuyển hướng về trang chủ
    header('Location: ../../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($news['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1><?= htmlspecialchars($news['title']) ?></h1>
        <p><small>Ngày đăng: <?= date('d/m/Y H:i', strtotime($news['created_at'])) ?></small></p>

        <!-- Hiển thị ảnh bài viết -->
        <img src="<?= htmlspecialchars($news['image']) ?>" alt="image" class="img-fluid mb-4">

        <!-- Hiển thị nội dung bài viết -->
        <div>
            <p><?= nl2br(htmlspecialchars($news['content'])) ?></p>
        </div>

        <!-- Quay lại trang danh sách tin tức -->
        <a href="index.php" class="btn btn-secondary">Quay lại danh sách tin tức</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
