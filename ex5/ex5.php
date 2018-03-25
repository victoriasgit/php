<?php

function check(string $pass)
{
    $first_conditions = [
        "/(\S*[A-Z]+\S*){2,}/" => "менее двух латинских прописных букв",
        "/(\S*[a-z]+\S*){2,}/" => "менее двух латинских строчных букв",
        "/(\S*[0-9]+\S*){2,}/" => "менее двух цифр",
        "/(\S*[%$#_\\*]){2,}/" => "менее двух спец.символов",
    ];

    $second_conditions = [
        "/[A-Z]{4,}/" => "более трех латинских прописных букв подряд",
        "/[a-z]{4,}/" => "более трех латинских строчных букв подряд",
        "/[0-9]{4,}/" => "более трех цифр подряд",
        "/[%$#_\\*]{4,}/" => "более трех спец.символов подряд",
    ];

    if (strlen($pass) < 10) {
        echo "менее 10 символов" . "<br/>";
    }


    foreach ($first_conditions as $key => $item) {
        if (!preg_match($key, $pass)) {
            yield $item;
        }
    }

    foreach ($second_conditions as $key => $item) {
        if (preg_match($key, $pass)) {
            yield $item;
        }
    }
}

require "index.html";

$pass = "";
if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
    $check = check($pass);
    echo $pass . "<br/>";
    $count = 0;
    foreach ($check as $item) {
        if ($item != null){
            $count ++;
            echo $item . "<br/>";
        }
    }
    if ($count === 0) {
        echo "Вы ввели надежный пароль!";
    }
}



//    else {
//    echo "Надёжный пароль";


//if (!empty($check)) {
//    echo $pass . "<br/>";
//    echo "Нарушения в правилах: " . "<br/>";
//    foreach ($check as $item) {
//        echo $item . "<br/>";
//    }
//} else {
//    echo "Надёжный пароль";
//}