<?php

// config
//define('DB_HOST','localhost');
// define('DB_USER','mvc');
// define('DB_PASS','mvc123');
// define('DB_NAME','mvc');
// define('DB_CHARSET','utf8');
// // App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
// // URL Root
define('URL_ROOT', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']);
// // Site Name
// define('SITE_NAME', 'MVC/PHP');
// // App Version
// define('APP_VERSION', '1.0.1');
// define('APP_DATE', 'AUG 02, 2018');
// define('APP_DATE_TIME_FORMAT', 'd/m/Y H:i:s');


include_once APP_ROOT."/libs/Database.php";
include_once APP_ROOT."/models/Posts.php";
include_once APP_ROOT."/models/Comments.php";
include_once APP_ROOT."/controller/Home.php";
include_once APP_ROOT."/controller/Post.php";