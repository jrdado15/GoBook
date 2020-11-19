<?php 

//Defines database information
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','gobook_db');

//database connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die ("could not connect to database");
?>