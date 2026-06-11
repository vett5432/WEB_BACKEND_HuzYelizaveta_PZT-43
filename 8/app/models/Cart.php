<?php
namespace app\models;

class Cart {
    
    // Добавление товара
    public static function add($productId) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]++;
        } else {
            $_SESSION['cart'][$productId] = 1;
        }
        
        error_log("Cart ADD: productId=$productId, cart=" . print_r($_SESSION['cart'], true));
    }
    
    // Получить все товары
    public static function getAll() {
        return $_SESSION['cart'] ?? [];
    }
    
    // Алиас для getAll()
    public static function getItems() {
        return self::getAll();
    }
    
    // Получить общее количество товаров (сумма всех quantity)
    public static function getCount() {
        $cart = self::getAll();
        $count = 0;
        foreach ($cart as $qty) {
            $count += $qty;
        }
        return $count;
    }
    
    // Очистить корзину
    public static function clear() {
        $_SESSION['cart'] = [];
    }
    
    // Удалить товар
    public static function remove($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }
    
    // Обновить количество
    public static function update($productId, $quantity) {
        if ($quantity <= 0) {
            self::remove($productId);
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }
}