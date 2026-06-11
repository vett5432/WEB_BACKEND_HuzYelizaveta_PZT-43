<?php
namespace app\controllers;

use app\models\Cart;
use app\models\Order;

class OrderController {
    
    public function checkout() {
        if (Cart::getCount() == 0) {
            header('Location: index.php?action=cart');
            exit;
        }
        
        // Передаем данные в глобальные переменные для view
        $cartItems = $this->getCartItems();
        $total = $this->getCartTotal();
        
        $GLOBALS['cartItems'] = $cartItems;
        $GLOBALS['total'] = $total;
        
        include __DIR__ . '/../views/layout.php';
    }
    
    public function placeOrder() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=cart');
            exit;
        }
        
        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        
        if (empty($name) || empty($phone) || empty($address)) {
            header('Location: index.php?action=checkout&error=1');
            exit;
        }
        
        $cartItems = Cart::getItems();
        
        if (empty($cartItems)) {
            header('Location: index.php?action=cart');
            exit;
        }
        
        $orderModel = new Order();
        $orderId = $orderModel->create($cartItems, $name, $phone, $address);
        
        if ($orderId) {
            Cart::clear();
            $_SESSION['order_success'] = true;
            header('Location: index.php?action=cart');
        } else {
            header('Location: index.php?action=checkout&error=1');
        }
        exit;
    }
    
    private function getCartItems() {
        $items = [];
        $productModel = new \app\models\Product();
        $cart = Cart::getItems();
        
        foreach ($cart as $id => $qty) {
            $product = $productModel->getById($id);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $qty,
                    'sum' => $product['price'] * $qty
                ];
            }
        }
        return $items;
    }
    
    private function getCartTotal() {
        $total = 0;
        $productModel = new \app\models\Product();
        $cart = Cart::getItems();
        
        foreach ($cart as $id => $qty) {
            $product = $productModel->getById($id);
            if ($product) {
                $total += $product['price'] * $qty;
            }
        }
        return $total;
    }
}