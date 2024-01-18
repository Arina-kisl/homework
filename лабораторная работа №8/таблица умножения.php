<!DOCTYPE html> 
<html>
<head>
    <title>The multiplication table</title>
</head>
<?php
// Определяем размер таблицы умножения
$tableSize = 10;

// Выводим заголовок таблицы
echo "<table border='1'>";
echo "<tr><th>&nbsp;</th>";

for ($i = 1; $i <= $tableSize; $i++) {
    echo "<th>" . $i . "</th>";
}

echo "</tr>";

// Выводим строки таблицы
for ($i = 1; $i <= $tableSize; $i++) {
    echo "<tr><th>" . $i . "</th>";

    for ($j = 1; $j <= $tableSize; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

echo "</table>";
?>
    </body>
</html>