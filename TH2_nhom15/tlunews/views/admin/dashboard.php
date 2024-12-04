<?php
// Kiểm tra xem người dùng đã đăng nhập hay chưa và có quyền admin không
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar a {
            color: #fff !important;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .list-group-item {
            background-color: #fff;
            border: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .container {
            max-width: 900px;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card .card-body {
            padding: 30px;
        }

        .dashboard-card h2 {
            color: #343a40;
        }

        .greeting {
            font-size: 1.2rem;
            color: #555;
        }

        .dashboard-card a {
            text-decoration: none;
        }

        .list-group-item-action {
            color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trang Quản Trị</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tin Tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Danh Mục</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="dashboard-card">
            <div class="card-header text-center">
                <h1>Admin Dashboard</h1>
            </div>

            <div class="card-body">
                <p class="greeting">Chào mừng, <?= $_SESSION['user']['username'] ?>!</p>
                <a href="logout.php" class="btn btn-danger mb-4">Đăng xuất</a>

                <h2>Quản lý</h2>
                <div class="list-group mt-3">
                    <a href="../../index.php?controller=admin&action=manageNews" class="list-group-item list-group-item-action">Quản lý Tin tức</a>
                    <a href="../../index.php?controller=admin&action=manageCategories" class="list-group-item list-group-item-action">Quản lý Danh mục</a>
                    <a href="../../index.php?controller=admin&action=manageUsers" class="list-group-item list-group-item-action">Quản lý Người dùng</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

