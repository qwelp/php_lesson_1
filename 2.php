<?php
// Задание #1
echo "<h2>Задание #1</h2>";

$name = "Владимир";
$age = 36;

echo "Меня зовут: $name<br>";

echo "Мне $age лет<br>";
echo "\"!\\/'\"\\";

// Задание #2
echo "<h2>Задание #2</h2>";

const FIGURES = 80;
const MARKER = 23;
const PENCIL = 40;

echo 80 - (PENCIL + MARKER);

// Задание #3
echo "<h2>Задание #3</h2>";

$age = 19;

if ($age >= 18 and $age <= 65) {
    echo "Вам еще работать и работать<br>";
} elseif ($age > 65) {
    echo "Вам пора на пенсию<br>";
} elseif ($age >= 1 and $age <= 17) {
    echo "“Вам ещё рано работать<br>";
}

// Задание #4
echo "<h2>Задание #4</h2>";

$day = 9;

switch ($day){
    case ($day >= 1 and $day <= 5):
        echo "Это рабочий день<br>";
        break;
    case ($day >= 6 and $day <= 7):
        echo "Это выходной день<br>";
        break;
    default:
        echo "Неизвестный день<br>";
        break;
}

// Задание #5
echo "<h2>Задание #5</h2>";

$bmw = [
    "a" => "X5",
    "b" => "120",
    "c" => "5",
    "d" => "2015"
];

echo "CAR bmw<br>".implode(" ", $bmw)."<br>";

// Задание #6
echo "<h2>Задание #6</h2>";

echo "<table border='1'>";
for ($i = 1; $i <= 10; $i++){
    echo "<tr>";
    for ($ii = 1; $ii <= 10; $ii++) {

        $int = $i*$ii;

        if(($i % 2) == 0 and ($ii % 2) == 0){
            echo "<td>($int)</td>";
        } elseif ($i & 1 and $ii & 1) {
            echo "<td>[$int]</td>";
        } else {
            echo "<td>$int</td>";
        }
    }
    echo "</tr>";
}

echo "</table>";