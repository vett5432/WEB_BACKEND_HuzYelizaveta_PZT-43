<?php
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($login === "admin" && $password === "1234") {
    echo "<h2>Добро пожаловать, $login!</h2>";
} else {
    echo "<h2>Неверный логин или пароль</h2>";
}
?>