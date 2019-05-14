<?php
    session_start();
    if(!isset($_SESSION['loggedIN'])){
        //header('Location: login/login.php');
        exit();
    }
?>

<!DOCTYPE html>
<!--
This is the front page of the unit calculator,
the user can choose between three themes:
Simple, Fancy and Currency conversion    
-->
<html lang="en">
  <head>
    <title>Unit Calc.</title>
    <meta charset="utf-8">
    <meta name="description" content="Unit Calc.">
    <meta name="author" content="Yusef,Zeyad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!--Browsing for Tablet or Phone dimensions-->
<link rel="stylesheet" href="css/style.css"/>
     <style>
            @import url('https://fonts.googleapis.com/css?family=Passion+One|Roboto+Slab');
            #myBtn {
              display: none;
              position: fixed;
              bottom: 20px;
              right: 30px;
              z-index: 99;
              font-size: 18px;
              border: none;
              outline: none;
              background-color: rgb(108, 53, 176);
              color: white;
              cursor: pointer;
              padding: 15px;
              border-radius: 4px;
            }
            
            #myBtn:hover {
              background-color: #555;
            }
     </style>
 </head>
 <body>
     <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
     <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
              } else {
                document.getElementById("myBtn").style.display = "none";
              }
            }
            
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
    </script>
     <nav class="navbar">
         <span class ="open-slide">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30">
                    <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                    <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                    <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
                </svg>
            </a>
            <a href="">Logout?</a>
         </span>
         
     </nav>
     <div id="side-menu" class="side-nav">
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
            <a href ="#">About Us</a>
            <a href="categories/length.php">Length</a>
            <a href="categories/temperature.php">Temperature</a>
            <a href="categories/area.php">Area</a>
            <a href="categories/volume.php">Volume</a>
            <a href="categories/weight.php">Weight</a>
            <a href="categories/speed.php">Speed</a>
            <a href="login">Log in</a>
            <a href="login/signup.php">Sign up</a>

     </div>
     
     <script src="js/frontSide.js"></script>
    
    <section id="banner">
        <div class="inner"> 
                <header>
                    <h1>Unit Calc.</h1>
                    <p> An interactive Unit Calculator for all your needs. </p>
                    <a href="#main" class="more">Choose Conversion</a>
                </header>
        </div>
    </section> 
    <div id="main">
        <div class="inner">
            <div class ="categories">

                    <div class="box">
                            <a href="" class="image fit"><img src="icons/length.png" width="400" height="355" alt="Length" /></a>
                            <div class="inner">
                                <h2>Length</h2>
                                <a href="categories/length.php" class="button fit" style="cursor: pointer;outline: 0px;background-color: #271010;color: black;">Select</a>
                            </div>
                        </div>

                    <div class="box">
                            <a href="" class="image fit"><img src="icons/area.png" width="400" height="355" alt="Area" /></a>
                            <div class="inner">
                                <h2>Area</h2>
                                <a href="categories/area.php" class="button style2 fit">Select</a>
                            </div>
                    </div>

                    <div class="box">
                            <a href="" class="image fit"><img src="icons/temperature.png" width="400" height="355" alt="Temperature" /></a>
                            <div class="inner">
                                <h2>Temperature</h2>
                                <a href="categories/temperature.php" class="button style3 fit">Select</a>
                            </div>
                    </div>
                    <div class="box">
                            <a href="" class="image fit"><img src="icons/volume.png" width="400" height="355" alt="Volume" /></a>
                            <div class="inner">
                                <h2>Volume</h2>
                                <a href="categories/volume.php" class="button style3 fit">Select</a>
                            </div>
                    </div>
                    
                    <div class="box">
                            <a href="" class="image fit"><img src="icons/weight.png" width="400" height="355" alt="Weight" /></a>
                            <div class="inner">
                              <h2>Weight</h2>
                                <a href="categories/weight.php" class="button style3 fit">Select</a>
                            </div>
                    </div>
            </div>
        </div>

    </div>
    <footer id="footer">
            <div class="inner">
                <section>
                    <h3>Contact Us</h3>
                    <form method="POST" action="">
                     <div class="entry">
                      <input  id="Input" class="Input-text" name="name" placeholder="Name"> 
                      <input  id="Input" class="Input-text" type="email" name="email" placeholder="Email">
                      <input  id="Input" class="Input-text" name="message" placeholder="Message">
                     </div>
                     <div class="registerSubmit">
                         <input type="submit" name="submit" value="Submit"> 
                     </div>
                    </form>

                </section>
    </footer>
 </body>

 </html>