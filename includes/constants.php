<?php

date_default_timezone_set("AFRICA/Nairobi");

define('DBTYPE', 'PDO');
define('HOSTNAME', 'localhost');
define('DBPORT', '3306');
define('HOSTUSER', 'root');
define('HOSTPASS', '');
define('DBNAME', 'assignment_2');
$protocol = isset($_SERVER['HTTPS']) && 
$_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$base_url = $protocol . $_SERVER['HTTP_HOST'] . '/';
