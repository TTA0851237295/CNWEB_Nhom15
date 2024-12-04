<?php
require_once "Database.php"; // Include file Database.php

class Category {
    // Lấy tất cả danh mục
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy danh mục theo ID
    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
