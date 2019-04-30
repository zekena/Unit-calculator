<?php
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
  
  $to_value = convert_speed($from_value, $from_unit, $to_unit);
}

$speed_options = array(
  "feet per second",
  "miles per hour",
  "meters per second",
  "kilometers per hour",
);
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/simp.css"/>
 <title>Convert Speed</title>
 </head>
 <body>
    <!--This is the simpler version,
    supposed to have-
        >a top title
        >a side bar menu
        >calculator with input,output,reset button-->
    <div id="title">
        <h1>Speed</h1>
    </div>
    <!-- top---->
    <div class="calculator">
        <!--whole calculator outline-->
        <div class="calcb">
            <!--Calculator box -->
            <div  id = "sinput" class = "input">
                <form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
		  <?php
            foreach($speed_options as $unit) {
				$opt = optionize($unit);
				echo "<option value=\"{$opt}\"";
				if($from_unit == $opt) { echo " selected"; }
				echo ">{$unit}</option>";
				}
			?>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="to_value" value="<?php echo float_to_string($to_value); ?>" />&nbsp;
          <select name="to_unit">
            <?php
            foreach($speed_options as $unit) {
				$opt = optionize($unit);
				echo "<option value=\"{$opt}\"";
				if($from_unit == $opt) { echo " selected"; }
				echo ">{$unit}</option>";
				}
			?>
          </select>
          
        </div>
        
        <input type="submit" name="submit" value="Submit" />
      </form>

                </div>
            </div>
            
        </div>
    </div>    
 </body>
</html>