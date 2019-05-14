<?php
if (file_exists('dbconnect.php')) {
  require('dbconnect.php');
  if (mysqli_connect_error()) {
      die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
  }
}
//Add function file
if (file_exists('../includes/functions.php')) {
  require_once('../includes/functions.php');
} else {
  echo "Unsupported File";
}

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if ($_POST['submit']) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];

  $to_value = convert_volume($from_value, $from_unit, $to_unit);
  $sql = "INSERT INTO volume_entry(from_unit,to_unit,from_value,to_value) VALUES ('$from_unit','$to_unit','$from_value','$to_value');";
  if (!mysqli_query($link, $sql)) {
      die('An error occurred when submitting your review.');
  } 
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
  <link rel="stylesheet" href="../css/simp-Volume.css" />
  <title>Convert Volume</title>
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
    <a href="categories/length.php">Length</a>
            <a href="categories/temperature.php">Temperature</a>
            <a href="categories/area.php">Area</a>
            <a href="categories/volume.php">Volume</a>
            <a href="categories/weight.php">Weight</a>
            <a href="categories/speed.php">Speed</a>
            <a href="login/login.php">Log in</a>

  </div>

  <script src="../js/slide.js"></script>
  <div id="title">
    <h1>Volume</h1>
  </div>
  <!-- top---->
  <div class="calculator">
    <!--whole calculator outline-->
    <div class="calcb">
      <!--Calculator box -->
      <div id="sinput" class="input">
        <form action="" method="post">

          <div class="entry">
            <input id="Input" class="Input-text" placeholder="Enter amount" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
            <label for="Input" class="Input-label">Your entry</label>
            <select name="from_unit">
              <option value="cubic_inches"<?php if($from_unit == 'cubic_inches') { echo " selected"; } ?>>cubic inches</option>
              <option value="cubic_feet"<?php if($from_unit == 'cubic_feet') { echo " selected"; } ?>>cubic feet</option>
              <option value="cubic_meters"<?php if($from_unit == 'cubic_meters') { echo " selected"; } ?>>cubic meters</option>
              <option value="cubic_centimeres"<?php if($from_unit == 'cubic_centimeters') { echo " selected"; } ?>>cubic centimeters</option>
              <option value="imperial_gallons"<?php if($from_unit == 'imperial_gallons') { echo " selected"; } ?>>imperial gallons</option>
              <option value="imperial_quarts"<?php if($from_unit == 'imperial_quarts') { echo " selected"; } ?>>imperial quarts</option>
              <option value="imperial_pints"<?php if($from_unit == 'imperial_pints') { echo " selected"; } ?>>imperial pints</option>
              <option value="imperial_cups"<?php if($from_unit == 'imperial_cups') { echo " selected"; } ?>>imperial cups</option>
              <option value="imperial_ounces"<?php if($from_unit == 'imperial_ounces') { echo " selected"; } ?>>imperial ounces</option>
              <option value="imperial_tablespoons"<?php if($from_unit == 'imperial_tablespoons') { echo " selected"; } ?>>imperial tablespoons</option>
              <option value="us_gallons"<?php if($from_unit == 'us_gallons') { echo " selected"; } ?>>US gallons</option>
              <option value="us_quarts"<?php if($from_unit == 'imperial_quarts') { echo " selected"; } ?>>imperial quarts</option>
              <option value="us_pints"<?php if($from_unit == 'imperial_pints') { echo " selected"; } ?>>imperial pints</option>
              <option value="us_cups"<?php if($from_unit == 'us_cups') { echo " selected"; } ?>>US cups</option>
              <option value="us_ounces"<?php if($from_unit == 'us_ounces') { echo " selected"; } ?>>US ounces</option>
              <option value="us_tablespoons"<?php if($from_unit == 'us_tablespoons') { echo " selected"; } ?>>US tablespoons</option>
              <option value="us_gallons"<?php if($from_unit == 'us_gallons') { echo " selected"; } ?>>US gallons</option>
              <option value="liters"<?php if($from_unit == 'liters') { echo " selected"; } ?>>liters</option>
              <option value="millimeters"<?php if($from_unit == 'millimeters') { echo " selected"; } ?>>millimeters</option>
            </select>
          </div>

          <div class="entry">
            <input readonly id="Input" class="Input-text" placeholder="Wait for it" name="to_value" value=" <?php echo $to_value; ?>" />&nbsp;
            <label for="Input" class="input-label">Converted Result</label>
            <select name="to_unit">
              <option value="cubic_inches"<?php if($to_unit == 'cubic_inches') { echo " selected"; } ?>>cubic inches</option>
              <option value="cubic_feet"<?php if($to_unit == 'cubic_feet') { echo " selected"; } ?>>cubic feet</option>
              <option value="cubic_meters"<?php if($tounit == 'cubic_meters') { echo " selected"; } ?>>cubic meters</option>
              <option value="cubic_centimeres"<?php if($to_unit == 'cubic_centimeters') { echo " selected"; } ?>>cubic centimeters</option>
              <option value="imperial_gallons"<?php if($to_unit == 'imperial_gallons') { echo " selected"; } ?>>imperial gallons</option>
              <option value="imperial_quarts"<?php if($to_unit == 'imperial_quarts') { echo " selected"; } ?>>imperial quarts</option>
              <option value="imperial_pints"<?php if($to_unit == 'imperial_pints') { echo " selected"; } ?>>imperial pints</option>
              <option value="imperial_cups"<?php if($to_unit == 'imperial_cups') { echo " selected"; } ?>>imperial cups</option>
              <option value="imperial_ounces"<?php if($to_unit == 'imperial_ounces') { echo " selected"; } ?>>imperial ounces</option>
              <option value="imperial_tablespoons"<?php if($to_unit == 'imperial_tablespoons') { echo " selected"; } ?>>imperial tablespoons</option>
              <option value="us_gallons"<?php if($to_unit == 'us_gallons') { echo " selected"; } ?>>US gallons</option>
              <option value="us_quarts"<?php if($to_unit == 'imperial_quarts') { echo " selected"; } ?>>imperial quarts</option>
              <option value="us_pints"<?php if($to_unit == 'imperial_pints') { echo " selected"; } ?>>imperial pints</option>
              <option value="us_cups"<?php if($to_unit == 'us_cups') { echo " selected"; } ?>>US cups</option>
              <option value="us_ounces"<?php if($to_unit == 'us_ounces') { echo " selected"; } ?>>US ounces</option>
              <option value="us_tablespoons"<?php if($to_unit == 'us_tablespoons') { echo " selected"; } ?>>US tablespoons</option>
              <option value="us_gallons"<?php if($to_unit == 'us_gallons') { echo " selected"; } ?>>US gallons</option>
              <option value="liters"<?php if($to_unit == 'liters') { echo " selected"; } ?>>liters</option>
              <option value="millimeters"<?php if($to_unit == 'millimeters') { echo " selected"; } ?>>millimeters</option>
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