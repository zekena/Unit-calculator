<?php

// Definitions 
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
    $to_value = convert_area($from_value, $from_unit, $to_unit);
    //$mysqli = new mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    // mysql_query("INSERT INTO area_entry (from_unit,to_unit,from_value,to_value) VALUES ()");
    $sql = "INSERT INTO area_entry(from_unit,to_unit,from_value,to_value) VALUES ('$from_unit','$to_unit','$from_value','$to_value');";
    if (!mysqli_query($link, $sql)) {
        die('An error occurred when submitting your review.');
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


function area_options()
{
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
        "hectares" => 100
    );
    $choice = '';
    while (list($k, $v) = each($area_options)) {
        $choice .= '<option value = "' . $k . '">' . $k . '</option>';
    }
    return $choice;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/simp-Area.css" />
    <title>Area</title>
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
    <h1>Area</h1>
  </div>
    <!-- top---->
    <div class="calculator">
        <!--whole calculator outline-->
        <div class="calcb">
            <!--Calculator box -->
            <div id="sinput" class="input">
                <form id="io" method="POST">
                    <!-- calculator input and output-->
                    <!--Add function to recieve number,
                    Be able to input number from either box.-->
                    <input id="Input" class="Input-text" placeholder="Enter amount" name="from_value" value="<?php echo $from_value; ?>" />&nbsp; <label for="Input" class="Input-label">Your entry</label>
                    <select name="from_unit">
                        <?php echo area_options(); ?>
                    </select>
                    <br>
                    <input id="Input" class="Input-text" placeholder="Wait for it" name="to_value" value=" <?php echo $to_value; ?>" />&nbsp;
                    <label for="Input" class="input-label">Converted Result</label>
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