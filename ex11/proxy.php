<?php
session_set_cookie_params(360);
session_name("SID_42");
session_save_path(__DIR__ . "\SESSIONS");
session_start();

if (!isset($_SESSION["ex11"])) {
    $_SESSION["ex11"] = $_POST["text"];
}

$ctx = stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query(array("text" => $_POST["text"])),
        ]
    ]
);

echo(file_get_contents("http://localhost:5000/ex2.php", false, $ctx));