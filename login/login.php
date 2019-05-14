<?php
require('db.php');
function protect($string){
  $string = mysql_real_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}
  session_start();
  if (isset($_SESSION['loggedIN'])){
    header('Location: ../home.php');
    exit();
  }
  if (isset($_POST['login'])){
    $username = $link->real_escape_string($_POST['usernamePHP']);
    $email = $link->real_escape_string($_POST['emailPHP']);
    $password = $link->real_escape_string($_POST['passwordPHP']);
    $data = $link->query("SELECT id FROM users WHERE username='$username' AND email='$email' AND password='$password'");
    if ($data->num_rows > 0){
      $_SESSION['loggedIN'] = '1';
      $_SESSION['username'] = $username;
      $_SESSION['email']= $email;
      $_SESSION['password']= $password;
      exit('Success..');

    } else{
      exit('failed');
    }
  }
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
        <form action="login.php" method="POST" >
            <p><input type="text" id="username" name="username" placeholder="Username"></p> 
            <p><input type="text" id="email" name="email" placeholder="Email"></p> 
            <p><input type="password"  id="password" name="password" placeholder="Password"></p>
            <p><input type="button" name="submit" value="Sign in" id="login"></p>
            <p><a href="signup.php">SIGN UP NOW</a></p>
            <p><button id="continue">Continue without Logging in</button></p>  
        </form>
        <p id="response"></p>
      </div> 

    </div>
  <script src="../js/jquery.js"></script>
  <script type="text/javascript">
    // document.getElementById("continue").onclick = function () {

    // };
    $(document).ready(function(){
      $("#continue").on('click',function(){
        window.location="../home.php";
      });
      $("#login").on('click',function(){
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        if (email.length == 0 || password.length == 0 || username.length == 0)
          alert('Please check input');
        else{
            $.ajax(
            {
              url: 'login.php',
              method: 'POST',
              data: {
                login: 1,
                emailPHP : email,
                usernamePHP : username,
                passwordPHP : password
              },
              success: function (response) {
                $("#response").html(response);
                if(response.indexOf('success')> -1){
                  window.location = '../home.php';
                }
              },
              dataType: 'text'
            }
          );
        }
      });
    });
  </script>
  </body>
</html>

