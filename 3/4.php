<?php
$name = $_POST['name'];
$size = $_POST['size'];
$sauce = $_POST['sauce'];
$toppings = $_POST['toppings'] ?? [];

echo "<h2>Ваш заказ:</h2>";
echo "Имя: $name <br>";
echo "Размер: $size <br>";
echo "Соус: $sauce <br>";

echo "Добавки: ";
if (count($toppings) > 0) {
    echo implode(", ", $toppings);
} else {
    echo "Нет";
}
?>