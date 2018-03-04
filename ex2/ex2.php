<?php

function translation($oldString) {
    $newString = '';
    $count = 0;   //количество изменений
    foreach(str_split($oldString) as $key => $symbol) {
        switch ($symbol) {
            case "h":
                $newString .= '4';
                $count++;
                break;
            case "l":
                $newString .= '1';
                $count++;
                break;
            case "e":
                $newString .= '3';
                $count++;
                break;
            case "o":
                $newString .= '0';
                $count++;
                break;
            default:
                $newString .= $symbol;
                break;
        }
    }

    return [$newString, $count];

//    function gen($oldString)  {
//        $count = 0;
//        $length = strlen($oldString);      //длина введенной строки
//
//        for ($i = 0; $i < $length; $i++) {    //перебираем символы, если находим нужный - делаем замену и увеличиваем переменную count
//            switch ($oldString[$i]) {
//                case "h":
//                    yield "4";
//                    $count++;
//                    break;
//                case "l":
//                    yield "1";
//                    $count++;
//                    break;
//                case "e":
//                    yield "3";
//                    $count++;
//                    break;
//                case "o":
//                    yield "0";
//                    $count++;
//                    break;
//                default:
//                    yield $oldString[$i];
//                    break;
//            }
//        }
//        return $count;
//    }
//
//    $generator = gen($oldString);   //генератор
//
//    $newString = "";
//    foreach ($generator as $i) {         //составляем новую строку из символов
//        $newString = $newString . $i;
//    }
//    return $newString;

}

$input = "";
if (isset($_POST['text'])) {
    $input = $_POST['text'];
}

//echo "Новая строка: " . translation($input);

echo "Новая строка: ";
list($newString, $count) = translation($input);
var_export($newString);
echo "<br/> Число замен: ";
var_export($count);