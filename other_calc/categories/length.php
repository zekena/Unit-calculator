<?php

//Add function files
require('options.php');
if (file_exists('../includes/functions.php')) {
  require_once('../includes/functions.php');
} else {
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

if ($_POST['submit']) {
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
  <link rel="stylesheet" href="../css/simp-length.css" />
  <title>Length</title>
  <script>
    //Alert message once script- By JavaScript Kit
    //Credit notice must stay intact for use
    //Visit http://javascriptkit.com for this script

    //specify message to alert
    var alertmessage = "Click Side button to calculate measurements in batch"

    ///No editing required beyond here/////

    //Alert only once per browser session (0=no, 1=yes)
    var once_per_session = 1


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
          returnvalue = unescape(document.cookie.substring(offset, end))
        }
      }
      return returnvalue;
    }

    function alertornot() {
      if (get_cookie('alerted') == '') {
        loadalert()
        document.cookie = "alerted=yes"
      }
    }

    function loadalert() {
      alert(alertmessage)
    }

    if (once_per_session == 0)
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
  <nav class="navbar">
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
          <path d="M0,5 30,5" stroke="#000" stroke-width="5" />
          <path d="M0,14 30,14" stroke="#000" stroke-width="5" />
          <path d="M0,23 30,23" stroke="#000" stroke-width="5" />
        </svg>
      </a>
    </span>
  </nav>
  <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="#">About Us</a>
    <a href=" length.php">Length</a>
    <a href=" temperature.php">Temperature</a>
    <a href=" area.php">Area</a>
    <a href=" volume.php">Volume</a>
    <a href=" weight.php">Weight</a>

    <a href=" speed.php">Speed</a>
    <a href="../login/index.html">Log in</a>
    <a href="../login/index.html">Sign up</a>

  </div>

  <script src="../js/frontSide.js"></script>
  <div id="title">
    <h1>Length</h1>
  </div>
  <!-- top---->
  <div class="calculator">
    <!--whole calculator outline-->
    <div class="calcb">
      <!--Calculator box -->
      <div id="sinput" class="input">
        <form id="io" action="" method="POST">
          <!-- calculator input and output-->
          <!--Add function to recieve number,
                    Be able to input number from either box.-->
          <input id="Input" class="Input-text" placeholder="Enter amount" name="from_value" value="<?php echo $from_value; ?>" />&nbsp; <label for="Input" class="Input-label">Your entry</label>
          <label for="input" class="Input-label">Your Entry</label>
          <select name="from_unit">
            <?php echo length_options(); ?>
          </select>
          <br>
          <input id="Input" class="Input-text" placeholder="Wait for it" name="to_value" value=" <?php echo $to_value; ?>" />&nbsp;
          <label for="input" class="input-label">Converted result</label>
          <select name="to_unit">
            <?php echo length_options(); ?>
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