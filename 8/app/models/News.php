<?php
namespace app\models;

class News {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getLatest($limit = 3) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM news ORDER BY created_at DESC LIMIT :limit");
            $stmt->execute([':limit' => $limit]);
            $result = $stmt->fetchAll();
            error_log("News query result: " . print_r($result, true));
            return $result;
        } catch (\Exception $e) {
            error_log("News error: " . $e->getMessage());
            return [];
        }
    }
}