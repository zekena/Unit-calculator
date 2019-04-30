<?php

//Add function files
require('options.php');
if(file_exists('../includes/functions.php')){
  require_once('../includes/functions.php');
}
else{
  echo "Unsupported File";
}
//establish values
/*
Uses funct
*/
$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if($_POST['submit']) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
 
  $to_value = convert_length($from_value, $from_unit, $to_unit);
}
/*
function length_options(){
  $length_options = array(
    "inches" => 0.0254,
    "feet" => 0.3048,
    "yards" => 0.9144,
    "miles" => 1609.344,
    "millimeters" => 0.001,
    "centimeters" => 0.01,
    "meters" => 1,
    "kilometers" => 1000,
    "acres" => 63.614907234075,
    "hectares" => 100);
  $choice = '';
  while(list($k,$v)=each($length_options))
  {
    $choice.='<option value = "'.$k.'">'.$k.'</option>';
  }
  return $choice;
}
*/
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
        <h1>Length</h1>
    </div>
    <!-- top---->
    <div class="calculator">
        <!--whole calculator outline-->
        <div class="calcb">
            <!--Calculator box -->
            <div  id = "sinput" class = "input">
                <form id="io" action="" method="POST">
                    <!-- calculator input and output-->
                    <!--Add function to recieve number,
                    Be able to input number from either box.-->    
                        <input type="text" name="from_value" placeholder="Enter amount" value="<?php echo $from_value; ?>" selected />&nbsp;
                        <select name="from_unit">
                          <?php echo length_options(); ?>
                        </select>
                        <br>
                        <input type="text" name="to_value"  placeholder="Converted result" value="<?php echo $to_value; ?>" />&nbsp;
                        <select name="to_unit">
                            <?php echo length_options();?>
                        </select>
                       
                   
                    <div id="reset" class="button">
                    <input type="submit" name="submit" value="Submit"/>
                    </div>
                </form>
                </div>
            </div>
            
        </div>
    </div>       
 </body>
</html>