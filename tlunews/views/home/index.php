<?php
session_start();
require_once 'C:/xampp/TH2_nhom15/tlunews/models/News.php';
require_once 'C:/xampp/TH2_nhom15/tlunews/models/Category.php';

// Kiểm tra xem có tìm kiếm không
$searchTerm = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

// Lấy danh sách tin tức nếu có từ khóa tìm kiếm
if ($searchTerm) {
    $newsList = News::search($searchTerm); // Hàm tìm kiếm theo từ khóa
} else {
    $newsList = News::getAll(); // Lấy tất cả tin tức nếu không có từ khóa
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Báo Điện Tử</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trang Báo Điện Tử</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thế Giới</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thể Thao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giải Trí</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4">Tin tức mới nhất</h1>
            <p class="lead">Cập nhật những tin tức nóng hổi mỗi ngày!</p>
        </div>
    </div>

    <!-- Tìm kiếm và danh sách tin -->
    <div class="container my-5">
        <!-- Tìm kiếm -->
        <form action="index.php" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tin tức..."
                    value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <!-- Danh sách tin -->
        <?php if (count($newsList) > 0): ?>
            <div class="row">
                <?php foreach ($newsList as $news): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?= htmlspecialchars($news['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($news['title']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($news['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars(substr($news['content'], 0, 100)) ?>...</p>
                                <a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Không có tin tức nào để hiển thị.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">© 2024 Trang tin tức</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
