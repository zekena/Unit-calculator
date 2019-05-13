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
    <a href="../login">Log in</a>
    <a href="../login/signup.php">Sign up</a>

  </div>

  <script src="../js/frontSide.js"></script>
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
              <?php
              foreach ($volume_options as $unit) {
                $opt = optionize($unit);
                echo "<option value=\"{$opt}\"";
                if ($from_unit == $opt) {
                  echo " selected";
                }
                echo ">{$unit}</option>";
              }
              ?>
            </select>
          </div>

          <div class="entry">
            <input id="Input" class="Input-text" placeholder="Wait for it" name="to_value" value=" <?php echo $to_value; ?>" />&nbsp;
            <label for="Input" class="input-label">Converted Result</label>
            <select name="to_unit">
              <?php
              foreach ($volume_options as $unit) {
                $opt = optionize($unit);
                echo "<option value=\"{$opt}\"";
                if ($from_unit == $opt) {
                  echo " selected";
                }
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