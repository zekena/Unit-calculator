<?php
//connection variables
define('DB_NAME','conversions');
define('DB_USER', 'root');
define('DB_PASSWORD','root');
define('DB_HOST','localhost');
$link =  mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error "); 

/*
if(mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno().')'.mysqli_connect_error());
}
*/

?>