<?php
    $products = [
        ["name" => "iPhone 15", "cat" => "phone"],
        ["name" => "Samsung Galaxy", "cat" => "phone"],
        ["name" => "MacBook Pro", "cat" => "laptop"],
        ["name" => "Dell XPS", "cat" => "laptop"],
        ["name" => "LG OLED", "cat" => "tv"],
    ];

    $category = $_GET['category'] ?? '';

    echo "<h3>Результаты:</h3>";

    foreach ($products as $p) {
        if ($category === '' || $category === $p['cat']) {
            echo $p['name'] . "<br>";
        }
    }
?>