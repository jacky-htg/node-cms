<?php

//session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept");

// Sets the default timezone used by all date/time. Adjust to your location
date_default_timezone_set('Asia/Jakarta');

// You can adjust this following constants if necessary.
define('DOMAIN', 'http://aji-backend.local.192.168.33.10.xip.io/');
define('NAME_APPS', 'AJI');

define('THEMES', '/themes_fl/');
define('THEMES_PATH', '/public/themes/fl/');
define('AJAX_PATH', '/public/ajax/');

// The APP constant is where your application folder located.
define('APP', dirname(__FILE__) . '/app/');
define('AJAX', dirname(__FILE__) . '/app/script/');

// The INDEX_FILE constant is this default file name.
define('INDEX_FILE', basename(__FILE__));

// And the GEAR constant is where panada folder located.
define('GEAR', 'panada/');

require_once GEAR.'Gear.php';

// To sets which PHP errors are reported just like documented in this page
// http://php.net/manual/en/function.error-reporting.php
// You can pass a parameter into the Gear class.

// Turn off all errors reporting - production use.
// new Gear(0);

// By default all errors will displayed - development use.
new Gear;
