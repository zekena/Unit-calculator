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

  $to_value = convert_mass($from_value, $from_unit, $to_unit);
  $sql = "INSERT INTO weight_entry(from_unit,to_unit,from_value,to_value) VALUES ('$from_unit','$to_unit','$from_value','$to_value');";
  if (!mysqli_query($link, $sql)) {
      die('An error occurred when submitting your review.');
  }
}

$mass_options = array(
  "ounces",
  "pounds",
  "stones",
  "long tons",
  "short tons",
  "milligrams",
  "grams",
  "kilograms",
  "metric tonnes"
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/simp-weight.css" />
  <title>Convert Weight</title>
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
    <a href="../login">Log in</a>
    <a href="../login/signup.php">Sign up</a>

  </div>

  <script src="../js/slide.js"></script>
  <div id="title">
    <h1>Weight</h1>
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
              <option value="ounces"<?php if($from_unit == 'ounces') { echo " selected"; } ?>>ounces</option>
              <option value="pounds"<?php if($from_unit == 'pounds') { echo " selected"; } ?>>pounds</option>
              <option value="stones"<?php if($from_unit == 'stones') { echo " selected"; } ?>>stones</option>
              <option value="long_tons"<?php if($from_unit == 'long_tons') { echo " selected"; } ?>>long tons</option>
              <option value="short_tons"<?php if($from_unit == 'short_tons') { echo " selected"; } ?>>short tons</option>
              <option value="milligrams"<?php if($from_unit == 'milligrams') { echo " selected"; } ?>>milligrams</option>
              <option value="grams"<?php if($from_unit == 'grams') { echo " selected"; } ?>>grams</option>
              <option value="kilograms"<?php if($from_unit == 'kilograms') { echo " selected"; } ?>>kilograms</option>
              <option value="metric_tonnes"<?php if($from_unit == 'metric_tonnes') { echo " selected"; } ?>>metric tonnes</option>
            </select>
          </div>

          <div class="entry">
            <input readonly id="Input" class="Input-text" placeholder="Wait for it" name="to_value" value="<?php echo float_to_string($to_value); ?>" />&nbsp;
            <label for="Input" class="input-label">Converted Result</label>
            <select name="to_unit">
              <option value="ounces"<?php if($to_unit == 'ounces') { echo " selected"; } ?>>ounces</option>
              <option value="pounds"<?php if($to_unit == 'pounds') { echo " selected"; } ?>>pounds</option>
              <option value="stones"<?php if($to_unit == 'stones') { echo " selected"; } ?>>stones</option>
              <option value="long_tons"<?php if($to_unit == 'long_tons') { echo " selected"; } ?>>long tons/option>
              <option value="short_tons"<?php if($to_unit == 'short_tons') { echo " selected"; } ?>>short tons</option>
              <option value="milligrams"<?php if($to_unit == 'milligrams') { echo " selected"; } ?>>milligrams</option>
              <option value="grams"<?php if($to_unit == 'grams') { echo " selected"; } ?>>grams</option>
              <option value="kilograms"<?php if($to_unit == 'kilograms') { echo " selected"; } ?>>kilograms</option>
              <option value="metric_tonnes"<?php if($to_unit == 'metric_tonnes') { echo " selected"; } ?>>metric tonnes</option>
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