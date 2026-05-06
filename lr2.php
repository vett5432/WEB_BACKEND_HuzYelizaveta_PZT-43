<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Базовые переменные для всех заданий
    $integerVar = 77;
    $floatVar = 2.71828;
    $stringVar = "250 долларов";
    $boolVar = false;
    $nullVar = null;
    $name = "Александр Ковалев";
    $age = 28;
    $city = "Вильнюс";
    $price = 249.50;
    $discountPercent = 20;
    $counter = 12;
    $fruits = ["киви", "манго", "груша"];
    $user = ["login" => "maria", "role" => "editor", "active" => false];

    // Константы
    define("TAX_RATE", 0.18);
    CONST COMPANY = "ЧУП «Сириус»";

    // Дата
    $dateString = "2026-11-15";

    // операции
    echo $integerVar . "<br>";
    $integerVar = $integerVar + 10;
    echo $integerVar . "<br>";
    $integerVar = $integerVar - 7;
    echo $integerVar . "<br>";
    $integerVar = $integerVar * 3;
    echo $integerVar . "<br>";
    $integerVar = $integerVar / 5;
    echo $integerVar . "<br>";
    $integerVar--;
    echo $integerVar . "<br>";
    $integerVar++;
    echo $integerVar . "<br>";

    // операторы
    $a = (5 == "5");
    $b = (5 === "5");
    $a = (5 != "5");
    $b = (5 !== "5");
    $a = (10 <=> 10); // 0
    $b = (15 <=> 10); // 1
    $c = (8 <=> 12); // -1

    switch ($a) {
        case 0:
            echo "a = 10";
            break;
        case 1:
            echo "a > 10";
            break;
        case -1:
            echo "a < 10";
            break;
    }

    $int = 2;
    while ($int < 15){
        if ($int % 3 == 0) {
            echo $int . " ";
        }
        else {
            $int++;
            continue;
        }
        $int++;
    }

    echo "<br>";

    include("popit.php");
    echo $vitalik . "<br>";

    // функции
    function func($num)
    {
        $bonus = 777;
        return $num + $bonus;
    }

    $a = func($integerVar);
    echo $a . "<br>";

    // массивы
    $students = [
        ['name' => 'Кира', 'age' => 19, 'grade' => 4.8, 'city' => 'Минск'],
        ['name' => 'Даниил', 'age' => 21, 'grade' => 3.9, 'city' => 'Гомель'],
        ['name' => 'София', 'age' => 20, 'grade' => 4.6, 'city' => 'Могилёв'],
        ['name' => 'Максим', 'age' => 22, 'grade' => 4.2, 'city' => 'Витебск'],
        ['name' => 'Ольга', 'age' => 18, 'grade' => 4.9, 'city' => 'Гродно'],
        ['name' => 'Тимур', 'age' => 23, 'grade' => 3.7, 'city' => 'Минск']
    ];

    $colors = ['purple', 'orange', 'cyan', 'lime', 'gray', 'pink'];

    $capitals = [
        'Франция' => 'Париж',
        'Испания' => 'Мадрид',
        'Италия' => 'Рим',
        'Чехия' => 'Прага'
    ];

    foreach ($capitals as $key => $value)
        echo $key . " — " . $value . "<br>";

    foreach ($capitals as $key => $value) {
        $capitals[$key] = $value . " 2026";
        echo $capitals[$key] . "<br>";
    }

    foreach ($students as $q) {
        $q['age'] += 5;
        echo $q['age'] . "<br>";
    }

    print_r($colors);
    echo "<br>";

    shuffle($colors);
    print_r($colors);
    echo "<br>";

    echo sizeof($colors, COUNT_NORMAL) . "<br>";

    asort($colors);
    print_r($colors);
    echo "<br>";

    // строки
    $text1 = " PHP — популярный язык для веб‑разработки. ";
    $text2 = "Мне нравится изучать PHP. Этот язык гибкий и удобный.";
    $userComment = "<i>Хорошая работа!</i> <script>alert('XSS');</script>";
    $price = " 9 999,90 BYN ";
    $slugSource = "Добрый день, как настроение?";
    $csvLine = "Петров;Сергей;serg@mail.com;34;Гомель";

    echo "Описание: {$text1} А также {$text2}<br>";

    $text3 = explode(" ", $text2);
    foreach ($text3 as $q)
        echo $q . "|";

    echo "<br>";

    $text4 = implode("#", $text3);
    echo $text4 . "<br>";

    echo trim("     Лимонад Печенье Карамель     ") . "<br>";

    // математические функции
    echo pow(rand(5, 30), 3) . "<br>";
    echo round($floatVar, 3) . "<br>";

    // работа с датой
    $date = new DateTime("2010-05-20");
    $date->modify("+25 days");
    echo $date->format("Y-m-d") . "<br>";

    echo time();
    ?>
</body>

</html>
