<?php
  define('DB_NAME','conversions');
  define('DB_USER', 'root');
  define('DB_PASSWORD','root');
  define('DB_HOST','localhost');
  $link =  mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Error"); 
  $sql = mysql_query("SELECT id,name FROM LENGTH_TO_METER");

  if (mysql_num_rows($sql)){
    $data = array();
    while($row=mysql_fetch_array($sql)){
        $data[]= array(
          'id' => $row['id'],
          'name' => $row['name']
        );
        header('Content-type: application/json');
        echo json_encode($data);
    }
  }
  else{
    echo "hello";
  }


?>