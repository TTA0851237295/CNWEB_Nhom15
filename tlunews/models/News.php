<?php
require_once __DIR__ . '/Database.php';

class News{
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM news");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    // Hàm tìm kiếm tin tức theo từ khóa
    public static function search($searchTerm) {
        // Kết nối với cơ sở dữ liệu
        $db = Database::connect();
        
        // Truy vấn tìm kiếm tin tức có tiêu đề hoặc nội dung chứa từ khóa
        $stmt = $db->prepare("SELECT * FROM news WHERE title LIKE :searchTerm OR content LIKE :searchTerm");
        $stmt->execute(['searchTerm' => '%' . $searchTerm . '%']);
        
        // Trả về kết quả tìm kiếm
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
