
<?php
// AJAX
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

  if (isset($_POST['calculate'])) {
    $from_value = $_POST['from_value'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];


    $to_value = convert_length($from_value, $from_unit, $to_unit);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/simp-length.css" />
  <title>Length</title>

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
    <h1>Length</h1>
  </div>
  <!-- top---->
  <div class="calculator">
    <!--whole calculator outline-->
    <div class="calcb">
      <!--Calculator box -->
      <ul id="form-messages">
        <li>Generic Error#1</li>
      </ul>
      <div id="sinput" class="input">
        <form id="io" action="length.php" method="POST">
          <!-- calculator input and output-->
          <!--Add function to recieve number,
                    Be able to input number from either box.-->
          <input id="Input" class="Input-text" placeholder="Enter amount" name="from_value" value="<?php echo $from_value; ?>" />&nbsp; <label for="Input" class="Input-label">Your entry</label>
          <label for="input" class="Input-label">Your Entry</label>
          <select name="from_unit">
            <?php echo length_options(); ?>
          </select>
          <br>
          <input id="from_value" class="Input-text" placeholder="Wait for it" name="to_value" value=" <?php echo $to_value; ?>" />&nbsp;
          <label for="input" class="input-label">Converted result</label>
          <select name="to_unit">
            <?php echo length_options(); ?>
          </select>
          <div id="reset" class="button">
            <input type="submit" name="calculate" value="Submit" id="btn-submit"/>
          </div>
        </form>
      </div>
    </div>

  </div>
  </div>
  <script src="../js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#btn-submit").on('click',function(){
          var from_value = $("#from_value").val();
          var to_value = $("#to_value").val();
          if (from_value == "" || to_value == "")
            alert('Please check input');
          else{
            $.ajax(
            {
              url: 'length.php',
              method: 'POST',
              data: {
                fromvaluePHP : from_value,
                tovaluePHP : to_value
              },
              dataType: 'text'
            });
          }
        });
      });
    // const form = {
    //   from_value : document.getElementById('from_value'),
    //   to_value : document.getElementById('to_value'),
    //   submit: document.getElementById('btn-submit')
    // };
    // form.submit.addEventListener('click',() => {
    //   const request = new XMLHttpRequest();
    //   request.onload = () => {
    //     let responseObject = null;
    //     try{
    //       responseObject = JSON.parse(request.responseText);
    //     }
    //     console.log(request.responseText);
    //   }
    //   const requestData = 'from_value=${form.from_value.value}&to_value=${form.to_value.value}';
    //   request.open('post','length.php')
    //   request.setRequestHeader('Content-type','applications/x-www-form-urlencoded');
    //   request.send(requestData);
    // });
    // $(document).ready(function(){
    //   $(".calculate").submit(function(){
    //   alert("hello");
    // });

    // });
    // $(document).ready(function(){
    //   $(".button").on('click',function(){
    //     var from_value = $("#from_value").val();
    //     var to_value = $("#to_value").val();
  </script>
</body>

</html>