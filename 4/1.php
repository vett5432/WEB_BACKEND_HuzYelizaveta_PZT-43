<?php
session_start(); // Инициализация механизма сессий [cite: 5]

// Проверка наличия переменной в сессии и её инициализация [cite: 7]
if (!isset($_SESSION['page_views'])) {
    $_SESSION['page_views'] = 0; // [cite: 8]
}

$_SESSION['page_views']++; // Инкремент счётчика при каждом обновлении страницы [cite: 10]

// Для демонстрации также используется куки "последний визит" [cite: 11]
if (!isset($_COOKIE['last_visit'])) {
    // Установка cookie на 30 дней [cite: 13]
    setcookie('last_visit', date('Y-m-d H:i:s'), time() + 86400 * 30, '/', '', true, true);
}
$lastVisit = $_COOKIE['last_visit'] ?? 'первый раз'; // [cite: 15]
?>

<!DOCTYPE html>
<html>
<head><title>Счётчик посещений</title></head>
<body>
    <h3>Вы открыли эту страницу <?= $_SESSION['page_views'] ?> раз(а)</h3>
    <p>Предыдущий визит: <?= htmlspecialchars($lastVisit) ?></p>
    <a href="<?= $_SERVER['SCRIPT_NAME'] ?>">Обновить</a> </body>
</html>