<?php
//connection variables
define('DB_NAME','loginsystem');
define('DB_USER', 'root');
define('DB_PASSWORD','root');
define('DB_HOST','localhost');
$link = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error " . mysqli_error($link)); 
/*
if(mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno().')'.mysqli_connect_error());
}
*/

?>