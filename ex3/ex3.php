<?php

require "index.html";

function explodeStrings($strings)
{
    $array_of_strings = explode(PHP_EOL, $strings);  //разбиваем текст на строки
    
    $array_of_words = [];
    foreach ($array_of_strings as $string) {                                    //разбиваем строку на слова
        array_push($array_of_words, explode(' ', $string));
    }

    return $array_of_words;    //получаем текст из предложений, которые состоят из слов
}

function createNewStrings(&$array_of_words)
{
    $number_of_strings = count($array_of_words);
    for ($i = 0; $i < $number_of_strings; $i++) {
        array_push($array_of_words, $array_of_words[$i]);
        shuffle($array_of_words[$i]);                        //добавляем по 1 новой строке, перемешав в ней слова

    }
}

function sortBySecondWord($array_of_strings)           //сортируем по второму слову
{
    function cmp($str1, $str2)
    {
        return $str1[1] <=> $str2[1];         //космический корабль
    }

    usort($array_of_strings, "cmp");
    return $array_of_strings;
}

function array_print($new_array)                //выводим результат
{
    foreach ($new_array as $input) {
        foreach ($input as $output) {
            echo $output . ' ';
        }
        echo '<br/>';
    }
}

$input = "";
if (isset($_POST['text'])) {
    $input = explodeStrings($_POST['text']);
    createNewStrings($input);
    $output = sortBySecondWord($input);
    array_print($output);
}


