<?php

$count = 0 ;

function task($oldString, &$count) {

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
    $generator = gen($oldString, $count);
    foreach ($generator as $symbol) {         //составляем новую строку из символов
        $newString = $newString . $symbol;
    }
    return $newString;

}

$input = "";
if (isset($_POST['text'])) {
    $input = $_POST['text'];
}

echo "Старая строка: " . $input;
echo "<br/> Новая строка: " . task($input, $count);
echo "<br/> Число замен: " . $count;
//var_export($count);
