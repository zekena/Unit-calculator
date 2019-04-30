<?php
require('dbconnect.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Definitions 
if (file_exists('dbconnect.php')){
    require('dbconnect.php');
    if(mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno().')'.mysqli_connect_error());
    }
}
//Add function file
if(file_exists('../includes/functions.php')){
  require_once('../includes/functions.php');
}
else{
  echo "Unsupported File";
}

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if($_POST['submit']) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  $to_value = convert_area($from_value, $from_unit, $to_unit);
  //$mysqli = new mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
 // mysql_query("INSERT INTO area_entry (from_unit,to_unit,from_value,to_value) VALUES ()");
  $sql = "INSERT INTO area_entry(from_unit,to_unit,from_value,to_value) VALUES ('$from_unit','$to_unit','$from_value','$to_value');";
  echo $sql;
  if (!mysqli_query($link, $sql)) {
    die('An error occurred when submitting your review.');
} else {
  echo "Thanks for your review.";
}
/*
  if($link->query($sql)){
      echo "Record Added";
  }
  else{
      die(mysql_error($sql));
  }
  */
  

mysqli_close($link);
}


function area_options(){
    $area_options = array(
        "square_inches" => 0.0254,
        "square_feet" => 0.3048,
        "square_yards" => 0.9144,
        "square_miles" => 1609.344,
        "square_millimeters" => 0.001,
        "square_centimeters" => 0.01,
        "square_meters" => 1,
        "square_kilometers" => 1000,
        "acres" => 63.614907234075,
        "hectares" => 100);
    $choice = '';
    while(list($k,$v)=each($area_options))
    {
      $choice.='<option value = "'.$k.'">'.$k.'</option>';
    }
    return $choice;
  }

 
?>

<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/simp.css"/>
 <title>Simple</title>
 </head>
 <body>
    <!--This is the simpler version,
    supposed to have-
        >a top title
        >a side bar menu
        >calculator with input,output,reset button-->
    <div id="title">
        <h1>Area</h1>
    </div>
    <!-- top---->
    <div class="calculator">
        <!--whole calculator outline-->
        <div class="calcb">
            <!--Calculator box -->
            <div  id = "sinput" class = "input">
                <form id="io"  method="POST">
                    <!-- calculator input and output-->
                    <!--Add function to recieve number,
                    Be able to input number from either box.-->    
                        <input type="text" name="from_value" placeholder="Enter amount" value="<?php echo $from_value; ?>" />&nbsp;
                        <select name="from_unit">
                            <?php echo area_options(); ?>
                        </select>
                        <br>
                        <input type="text" name="to_value"  placeholder="Converted result" value="<?php echo $to_value; ?>" />&nbsp;
                        <select name="to_unit">
                            <?php echo area_options(); ?>
                        </select>
                   
                    <div id="reset" class="button">
                    <input type="submit" name="submit" value="Submit" />
                    </div>
                </form>
                </div>
            </div>   
        </div>

    </div>    
 </body>
</html>