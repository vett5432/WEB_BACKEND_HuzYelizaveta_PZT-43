<?php
namespace app\controllers;

use app\models\Cart;
use app\models\Product;

class CartController {
    public function add() {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            Cart::add($id);
        }
        // Возвращаемся на ту же страницу
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    public function remove() {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            Cart::remove($id);
        }
        header('Location: index.php?action=cart');
        exit;
    }
    
    public function update() {
        $id = (int)($_GET['id'] ?? 0);
        $qty = (int)($_GET['qty'] ?? 0);
        if ($id > 0) {
            Cart::update($id, $qty);
        }
        header('Location: index.php?action=cart');
        exit;
    }
    
    public function view() {
        $cartItems = [];
        $total = 0;
        $productModel = new Product();
        
        $cart = Cart::getItems();
        
        foreach ($cart as $id => $qty) {
            $product = $productModel->getById($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'sum' => $product['price'] * $qty
                ];
                $total += $product['price'] * $qty;
            }
        }
        
        $GLOBALS['cartItems'] = $cartItems;
        $GLOBALS['total'] = $total;
        
        include __DIR__ . '/../views/layout.php';
    }
}