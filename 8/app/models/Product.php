<?php
namespace app\models;

use PDO;

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll($page = 1, $sort = '', $category = '', $search = '', $perPage = 6) {
        $offset = ($page - 1) * $perPage;
        $params = [];
        
        $sql = "SELECT * FROM products WHERE 1=1";
        
        if (!empty($category)) {
            $sql .= " AND category = ?";
            $params[] = $category;
        }
        if (!empty($search)) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }
        
        if ($sort === 'price_asc') {
            $sql .= " ORDER BY price ASC";
        } elseif ($sort === 'price_desc') {
            $sql .= " ORDER BY price DESC";
        } elseif ($sort === 'name_asc') {
            $sql .= " ORDER BY name ASC";
        } else {
            $sql .= " ORDER BY id ASC";
        }
        
        $sql .= " LIMIT $perPage OFFSET $offset";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function getTotal($category = '', $search = '') {
        $params = [];
        $sql = "SELECT COUNT(*) as total FROM products WHERE 1=1";
        if (!empty($category)) {
            $sql .= " AND category = ?";
            $params[] = $category;
        }
        if (!empty($search)) {
            $sql .= " AND name LIKE ?";
            $params[] = "%$search%";
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch();
        return $result['total'];
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getCategories() {
        $stmt = $this->db->query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}