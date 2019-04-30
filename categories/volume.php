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
  
  $to_value = convert_volume($from_value, $from_unit, $to_unit);
}
$volume_options = array(
  'cubic inches',
  'cubic feet',
  'Imperial gallons',
  'Imperial quarts',
  'Imperial pints',
  'Imperial cups',
  'Imperial ounces',
  'Imperial tablespoons',
  'Imperial teaspoons',
  'US gallons',
  'US quarts',
  'US pints',
  'US cups',
  'US ounces',
  'US tablespoons',
  'US teaspoons',
  'cubic centimeters',
  'cubic meters',
  'liters',
  'milliliters'
);
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/simp.css"/>
 <title>Convert Volume</title>
 <script>
   alert("If you want to calculate entries in batch click the side button");
 </script>
 </head>
 <body>
    <!--This is the simpler version,
    supposed to have-
        >a top title
        >a side bar menu
        >calculator with input,output,reset button-->
    <div id="title">
        <h1>Volume</h1>
    </div>
    <!-- top---->
    <div class="calculator">
        <!--whole calculator outline-->
        <div class="calcb">
            <!--Calculator box -->
            <div  id = "sinput" class = "input">
                <<form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
		  <?php
            foreach($volume_options as $unit) {
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
          <input type="text" name="to_value" value="<?php echo $to_value; ?>" />&nbsp;
          <select name="to_unit">
            <?php
            foreach($volume_options as $unit) {
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