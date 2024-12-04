<?php
require_once 'C:\xampp\htdocs\TH2_nhom15\tlunews\models\News.php';

class HomeController {
    public function index() {
        $news = News::getAll();
        include 'C:\xampp\htdocs\TH2_nhom15\tlunews\views\home\index.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? 0;
        $news = News::getById($id);
        include 'C:\xampp\htdocs\TH2_nhom15\tlunews\views\news\detail.php';
    }
}
