<?php

// DB params

define('DB_HOST', 'localhost');
define('DB_USER','_YOUR_USERNAME_');
define('DB_PASS', '_YOUR_PASSWORD_');
define('DB_NAME', '_YOUR_DATABASE_');

//App root
define('APPROOT',  dirname(dirname(__FILE__)));
// Url root
define('URLROOT', '_YOUR_ROOT_');
// Site name
define('SITENAME', 'SharePosts');
// App version
define('APPVERSION', '1.0.0');
// get URL end
define('SUBURL', ' - ' . ucfirst(substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/') + 1)));


