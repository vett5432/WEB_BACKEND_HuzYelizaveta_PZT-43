<?php
namespace app\models;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $db;

    private function __construct() {
        try {
            $dbFile = __DIR__ . '/../../database/db.db';
            $this->db = new PDO('sqlite:' . $dbFile);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->db;
    }
}