<?php

$result = "";
$array = [];
$current = 0;
$param_pointer = 0;

$code = '';
$param = '';

if (isset($_POST['code']) and isset($_POST['param'])) {
    $code = $_POST['code'];
    $param = $_POST['param'];
}

for ($i = 0; $i < strlen($code); $i++) {
    switch ($code[$i]) {
        case '+':                            //увеличить значение в текущей ячейке на 1
            if ($array[$current] == 255) {
                $array[$current] = 0;
            }
            else {
                $array[$current]++;
            }
            break;
        case '-':                            //уменьшить значение текущей ячейки на 1
            if ($array[$current] == 0) {
                $array[$current] = 255;
            }
            else {
                $array[$current]--;
            }
            break;
        case '.':                                //напечатать значение из текущей ячейки
            $result .= chr($array[$current]);         //chr - ascii-символ по коду
            break;
        case ',':                                          //ввести извне значение и сохранить в текущей ячейке
            $array[$current] = ord($param[$param_pointer]);         //ord - ascii-код символа
            $param_pointer++;
            break;
        case '>':                                   //перейти к следующей ячейке
            $current++;
            if (!isset($array[$current])) {
                $array[$current] = 0;
            }
            break;
        case '<':                                     //перейти к предыдущей ячейки
            $current--;
            if (!isset($array[$current])) {
                $array[$current] = 0;
            }
            break;
        case '[':
            if ($array[$current] == 0) {             //если 0 - перейти вперед на ячейку, следующую за ]
                $brackets_number = 0;
                while (true) {
                    if ($code[$i] == '[') {
                        $brackets_number++;
                    } elseif ($code[$i] == ']') {
                        $brackets_number--;
                    }
                    $i++;
                    if ($brackets_number == 0) {
                        break;
                    }
                }
            }
            break;
        case ']':
            if ($array[$current] != 0) {               //если не 0 - перейти назад на символ [
                $brackets_number = 0;
                while (true) {
                    if ($code[$i] == ']') {
                        $brackets_number++;
                    } elseif ($code[$i] == '[') {
                        $brackets_number--;
                    }
                    $i--;
                    if ($brackets_number == 0) {
                        break;
                    }
                }
            }
            break;
    }
}


echo $result;