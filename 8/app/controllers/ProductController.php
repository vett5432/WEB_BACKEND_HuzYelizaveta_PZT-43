<?php
namespace app\controllers;

use app\models\Product;
use app\models\News;

class ProductController {
    public function index() {
        $page = (int)($_GET['page'] ?? 1);
        $sort = $_GET['sort'] ?? '';
        $category = $_GET['category'] ?? '';
        $search = trim($_GET['search'] ?? '');
        
        $productModel = new Product();
        $products = $productModel->getAll($page, $sort, $category, $search);
        $total = $productModel->getTotal($category, $search);
        $categories = $productModel->getCategories();
        
        $perPage = 6;
        $totalPages = ceil($total / $perPage);
        
        $newsModel = new News();
        $news = $newsModel->getLatest(3);
        
        include __DIR__ . '/../views/layout.php';
    }
}