<?php
$name = $_GET['name'] ?? 'нет даннх';
$age = $_GET['age'] ?? 'нет данных';

echo "<h2>Полученные данные:</h2>";
echo "Имя: $name <br>";
echo "Возраст: $age <br>";
?>