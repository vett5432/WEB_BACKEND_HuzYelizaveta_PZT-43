<?php
namespace app\models;

use PDO;

class Order {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($cart, $name, $phone, $address) {
        try {
            $this->db->beginTransaction();
            
            $productModel = new Product();
            $total = 0;
            
            foreach ($cart as $id => $qty) {
                $product = $productModel->getById($id);
                if ($product) {
                    $total += $product['price'] * $qty;
                }
            }
            
            // Исправленный запрос - добавил address
            $stmt = $this->db->prepare("
                INSERT INTO orders (customer_name, phone, address, total_price, status, created_at)
                VALUES (?, ?, ?, ?, 'new', datetime('now'))
            ");
            $stmt->execute([$name, $phone, $address, $total]);
            $orderId = $this->db->lastInsertId();
            
            $stmtItem = $this->db->prepare("
                INSERT INTO order_items (order_id, product_id, quantity)
                VALUES (?, ?, ?)
            ");
            
            foreach ($cart as $id => $qty) {
                $stmtItem->execute([$orderId, $id, $qty]);
            }
            
            $this->db->commit();
            return $orderId;
            
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Order creation error: " . $e->getMessage());
            return false;
        }
    }
}