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
  
  $to_value = convert_temp($from_value, $from_unit, $to_unit);
}

$temp_options = array(
  "Celsius",
  "Fahrenheit",
  "Kelvin"
);
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="../css/simp.css"/>
 <title>Convert Temperature</title>
 <script>

//Alert message once script- By JavaScript Kit
//Credit notice must stay intact for use
//Visit http://javascriptkit.com for this script

//specify message to alert
var alertmessage="Click Side button to calculate measurements in batch"

///No editing required beyond here/////

//Alert only once per browser session (0=no, 1=yes)
var once_per_session=1


function get_cookie(Name) {
  var search = Name + "="
  var returnvalue = "";
  if (document.cookie.length > 0) {
    offset = document.cookie.indexOf(search)
    if (offset != -1) { // if cookie exists
      offset += search.length
      // set index of beginning of value
      end = document.cookie.indexOf(";", offset);
      // set index of end of cookie value
      if (end == -1)
         end = document.cookie.length;
      returnvalue=unescape(document.cookie.substring(offset, end))
      }
   }
  return returnvalue;
}

function alertornot(){
if (get_cookie('alerted')==''){
loadalert()
document.cookie="alerted=yes"
}
}

function loadalert(){
alert(alertmessage)
}

if (once_per_session==0)
loadalert()
else
alertornot()

</script>
 </head>
 <body>
    <!--This is the simpler version,
    supposed to have-
        >a top title
        >a side bar menu
        >calculator with input,output,reset button-->
    <div id="title">
        <h1>Temperature</h1>
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
            foreach($temp_options as $unit) {
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
            foreach($temp_options as $unit) {
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