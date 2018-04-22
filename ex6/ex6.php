<?php

function rules($arr, $key, $line) {
    $line = substr($line, strlen($key));
    switch ($arr[$key]) {
        case "true":
            return first_rule_true ($arr, $key, $line);
        case "false":
            return first_rule_false($arr, $key, $line);
        case "+":
            return second_rule_plus ($arr, $key, $line);
        case "-":
            return second_rule_minus ($arr, $key, $line);
        default:
            return third_rule ($arr, $key, $line);
    }
}

function get_arg($string, $length): string {
    return substr($string, 0, $length);
}

function first_rule_true($arr, $key, $line){
    return strtoupper($line);
}

function first_rule_false($arr, $key, $line)
{
    return strtolower($line);
}

function second_rule_plus($arr, $key, $line)
{
    $new_line = str_split($line);
        for ($i = 0; $i < count($new_line); $i++) {
            if (is_numeric($new_line[$i])) {
                if ($new_line[$i] != 9) {
                    $new_line[$i]++;
                } else {
                    $new_line[$i] = 0;
                }
            }
        }
        return implode($new_line);
    }

function second_rule_minus($arr, $key, $line)
{
    $new_line = str_split($line);
        for ($i = 0; $i < count($new_line); $i++) {
            if (is_numeric($new_line[$i])) {
                if ($new_line[$i] != 0) {
                    $new_line[$i]--;
                } else {
                    $new_line[$i] = 9;
                }
            }
        }
        return implode($new_line);
}

function third_rule($arr, $key, $line)
{
    return str_replace($arr[$key], "", $line);
}

function operation($line, $arr) : string {                    //берем массив параметров (их значения и ключи)
    foreach ($arr as $key => $param) {
        if (get_arg($line, strlen($key)) == $key) {            //если параметр совпал с ключем - то выполняем операцию
            return rules($arr, $key, $line);
        }
    }
    return $line;
}

function get_ini_arr($ini): array {                        //вырезаем в таком формате, чтобы выходил массив из параметров
    $arr = [];
    foreach ($ini as $cut) {
        foreach ($cut as $element) {
            $key_main = array_search($element, $cut);
            if ($key_main == "example.txt") {
                $arr[$key_main] = reset($cut);
            } else {
                $key = reset($cut);
                $arr[$key] = $element;
            }
        }
    }
    return $arr;
}

function decode() : string {
    $result = "";
    $ini = parse_ini_file(realpath("index.ini"), true);    //считываем ini-файл
    $arr = get_ini_arr($ini);
    $lines = file($arr["example.txt"], FILE_IGNORE_NEW_LINES);         //из полученного массива достаем имя файла и считываем его
    foreach ($lines as $line) {                                           //записываем обработанные строки в новую строку
        $result .= operation($line, $arr) . "<br>";
    }
    return $result;
}

echo decode();