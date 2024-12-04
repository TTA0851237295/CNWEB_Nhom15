<?php
require_once '../tlunews/models/News.php';

class HomeController {
    public function index() {
        $news = News::getAll();
        include '../tlunews/views/home/index.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? 0;
        $news = News::getById($id);
        include '../tlunews/views/news/detail.php';
    }
}
