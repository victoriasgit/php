<?php

session_set_cookie_params(360);
session_name("SID_42");
session_save_path(__DIR__ . "\SESSIONS");
session_start();

include "task.php";


