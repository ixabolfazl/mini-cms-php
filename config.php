<?php

//config
define("BASE_PATH", __dir__);
define("BASE_FOLDER", "cms");
define("BASE_URL", "http://localhost/cms");

define("DISPLAY_ERROR", true);
define("DB_HOST", 'localhost');
define("DB_NAME", 'blog');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", 'mysql');


//jwt
define("jwtSecret", 'abolfazl');
define("default_exp", 3600);
define("extended_exp", 3600 * 24 * 7);

//display error
if (DISPLAY_ERROR) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

