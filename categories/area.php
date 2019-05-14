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
                        <option value="square_inches" <?php if ($from_unit == 'square_inches') {
                                                            echo " selected";
                                                        } ?>>square inches</option>
                        <option value="square_feet" <?php if ($from_unit == 'square_feet') {
                                                        echo " selected";
                                                    } ?>>square feet</option>
                        <option value="square_yards" <?php if ($from_unit == 'square_yards') {
                                                            echo " selected";
                                                        } ?>>square yards</option>
                        <option value="square_miles" <?php if ($from_unit == 'square_miles') {
                                                            echo " selected";
                                                        } ?>>square miles</option>
                        <option value="square_millimeters" <?php if ($from_unit == 'square_millimeters') {
                                                                echo " selected";
                                                            } ?>>square millimeters</option>
                        <option value="square_centimeters" <?php if ($from_unit == 'square_centimeters') {
                                                                echo " selected";
                                                            } ?>>square centimeters</option>
                        <option value="square_meters" <?php if ($from_unit == 'square_meters') {
                                                            echo " selected";
                                                        } ?>>square meters</option>
                        <option value="square_kilometers" <?php if ($from_unit == 'square_kilometers') {
                                                                echo " selected";
                                                            } ?>>square kilometers</option>
                        <option value="acres" <?php if ($from_unit == 'acres') {
                                                    echo " selected";
                                                } ?>>acres</option>
                        <option value="hectares" <?php if ($from_unit == 'hectares') {
                                                        echo " selected";
                                                    } ?>>hectares</option>
                    </select>
                    <br>
                    <input readonly id="Input" class="Input-text" placeholder="Wait for it" name="to_value" value=" <?php echo $to_value; ?>" />&nbsp;
                    <label for="Input" class="input-label">Converted Result</label>
                    <select name="to_unit">
                        <option value="square_inches" <?php if ($to_unit == 'square_inches') {
                                                            echo " selected";
                                                        } ?>>square inches</option>
                        <option value="square_feet" <?php if ($to_unit == 'square_feet') {
                                                        echo " selected";
                                                    } ?>>square feet</option>
                        <option value="square_yards" <?php if ($to_unit == 'square_yards') {
                                                            echo " selected";
                                                        } ?>>square yards</option>
                        <option value="square_miles" <?php if ($to_unit == 'square_miles') {
                                                            echo " selected";
                                                        } ?>>square miles</option>
                        <option value="square_millimeters" <?php if ($to_unit == 'square_millimeters') {
                                                                echo " selected";
                                                            } ?>>square millimeters</option>
                        <option value="square_centimeters" <?php if ($to_unit == 'square_centimeters') {
                                                                echo " selected";
                                                            } ?>>square centimeters</option>
                        <option value="square_meters" <?php if ($to_unit == 'square_meters') {
                                                            echo " selected";
                                                        } ?>>square meters</option>
                        <option value="square_kilometers" <?php if ($to_unit == 'square_kilometers') {
                                                                echo " selected";
                                                            } ?>>square kilometers</option>
                        <option value="acres" <?php if ($to_unit == 'acres') {
                                                    echo " selected";
                                                } ?>>acres</option>
                        <option value="hectares" <?php if ($to_unit == 'hectares') {
                                                        echo " selected";
                                                    } ?>>hectares</option>
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