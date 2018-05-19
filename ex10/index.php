<?php
require_once "Month.php";

$dayOfMonth = 17;                //dayOfMonth-numberOfMonth-year
$numberOfMonth = 4;
$year = 2018;

$month = new Month($numberOfMonth, $year);
$day = getNameOfDayOfTheWeek($month->getDayNumberOfWeek(new DateTime("$dayOfMonth-$numberOfMonth-$year")));   //номер дня по числу месяца

echo "Day: $day <br>";
echo "Month:<br>";
printMonth($month, $numberOfMonth, $year);
echo "<br>";

function printMonth(Month $month, $numberOfMonth, $year) {
    $numberOfDayOfTheWeek = $month->getDayNumberOfWeek(new DateTime("01-" . $numberOfMonth . "-" . $year));
    $spaces = "<table>". getSpace($numberOfDayOfTheWeek);
    foreach ($month as $item) {
        if ($item->format("d") == "01") {
            $spaces .= "</tr><tr>" . getSpace($numberOfDayOfTheWeek);
        }
        if ($numberOfDayOfTheWeek == 7) {
            $spaces .= "<td>" . $item->format("d") . "</td></tr><tr>";
            $numberOfDayOfTheWeek = 1;
        } else {
            $spaces .= "<td>" . $item->format("d") . "&nbsp" . "</td>";       //nbsp - чтобы пробелы не съедались
            $numberOfDayOfTheWeek++;
        }
    }
    echo $spaces . "</tr></table>" . getSpace($numberOfDayOfTheWeek);
}
function getSpace($time) {
    $s = "";
    if ($time > 1) {
        for ($i = 1; $i < $time; $i++) {
            $s .= "<td></td>";
        }
    }
    return $s;
}
function getNameOfDayOfTheWeek($day) {             //получить название дня недели
    $rusDaysOfWeek = [
        "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"
    ];
    return $rusDaysOfWeek[$day-1];
}