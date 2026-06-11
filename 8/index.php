<?php
session_start();

// Автозагрузка классов
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use app\controllers\ProductController;
use app\controllers\CartController;
use app\controllers\OrderController;

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        (new ProductController())->index();
        break;
    case 'add':
        (new CartController())->add();
        break;
    case 'remove':
        (new CartController())->remove();
        break;
    case 'update':
        (new CartController())->update();
        break;
    case 'cart':
        (new CartController())->view();
        break;
    case 'checkout':
        (new OrderController())->checkout();
        break;
    case 'place_order':
        (new OrderController())->placeOrder();
        break;
    case 'clear':
        (new CartController())->clear();
        break;
    default:
        http_response_code(404);
        echo "404 - Страница не найдена";
        break;
}