<?php

$count = 0 ;

function translation($oldString, &$count) : string {

    function gen($oldString, &$count)  {

        $length = strlen($oldString);      //длина введенной строки

        for ($i = 0; $i < $length; $i++) {    //перебираем символы, если находим нужный - делаем замену и увеличиваем переменную count
            switch ($oldString[$i]) {
                case "h":
                    yield "4";
                    $count++;
                    break;
                case "l":
                    yield "1";
                    $count++;
                    break;
                case "e":
                    yield "3";
                    $count++;
                    break;
                case "o":
                    yield "0";
                    $count++;
                    break;
                default:
                    yield $oldString[$i];
                    break;
            }
        }
        return [$oldString, $count];
    }

    $newString = "";
    foreach (gen($oldString, $count) as $i) {         //составляем новую строку из символов
        $newString = $newString . $i;
    }
    return $newString;

}

$input = "";
if (isset($_POST['text'])) {
    $input = $_POST['text'];
}

echo "Новая строка: " . translation($input, $count);
echo "<br/> Число замен: ";
var_export($count);
