<?php
require('../categories/dbconnect.php');
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <link rel="stylesheet" href="../css/login_style.css" media="screen" type="text/css" />

</head>

<body>
    <div class="container">

      <div id="login">

        <form action="" method="get">

          <fieldset class="clearfix">

            <p><input type="text" name="username" placeholder="             Username"></p> 
            <p><input type="text" name="email" placeholder="             Email"></p> 
            <p><input type="password"  name="password" placeholder="             Password"></p>
            <p><input type="submit"  type="submit" name="submit" value="Sign in"></p>
            <p><a href="signup.html">SIGN UP NOW</a></p>

          </fieldset>

        </form>
      </div> 

    </div>

  </body>

</html>
