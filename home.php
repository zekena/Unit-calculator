<?php
$name = '';
$email = '';
$message = '';
if ($_POST['submit']) {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    $message = "Thanks we will contact u soon";
    echo "<script type='text/javascript'>alert('$message');</script>";
}


$file_open = fopen("contact_data.csv", "a");
$no_rows = count(file("contact_data.csv"));
if ($no_rows > 1) {
    $no_rows = ($no_rows - 1) + 1;
}
$form_data = array(
    'sr_no'  => $no_rows,
    $name,
    $email,
    $message
);
fputcsv($file_open, $form_data);
$error = '<label class="text-success">Thank you for contacting us</label>';
$name = '';
$email = '';
$subject = '';
$message = '';

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
    <link rel="stylesheet" href="css/style.css" />
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
        window.onscroll = function() {
            scrollFunction()
        };

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
    <a class="navbar">
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
        <script src="js/frontSide.js"></script>
        <section id="banner">
            <div class="inner">
                <header>
                    <h1>Unit Calc.</h1>
                    <p> An interactive Unit Calculator for all your needs. </p>
                    <a href="#main" class="more">Choose Conversion</a>
                </header>
                <a class="log" href="/calc/login/login.php">login
                    <p>Restore your calculations</p></a>
            </div>
        </section>
        <div id="main">
            <div class="inner">
                <div id="items" class="box">

                    <div class="box">
                        <a href="" class="image fit"><img src="icons/length.png" width="400" height="355" alt="Length" /></a>
                        <div class="inner">
                            <h2>Length</h2>
                            <a href="categories/length.php" class="button style3 fit">Select</a>
                        </div>
                    </div>

                    <div class="box">
                        <a href="" class="image fit"><img src="icons/area.png" width="400" height="355" alt="Area" /></a>
                        <div class="inner">
                            <h2>Area</h2>
                            <a href="categories/area.php" class="button style3 fit">Select</a>
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

                    <div class="box">
                        <a href="" class="image fit"><img src="icons/speed.png" width="400" height="355" alt="speed" /></a>
                        <div class="inner">
                            <h2>Speed</h2>
                            <a href="categories/speed.php" class="button style3 fit">Select</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <footer id="footer">
            <div class="inner">
                <section>
                    <h3>Contact Us</h3>
                    <form id="Contact_form" method="POST" action="">
                        <div class="entry">
                            <input id="Input-name" class="Input-text" name="name" placeholder="Name" required>
                            <input id="Input-email" class="Input-text" type="email" name="email" placeholder="Email" required>
                            <input id="Input-message" class="Input-text" name="message" placeholder="Message" required>
                        </div>
                        <div class="registerSubmit">
                            <input type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                    <div id="results"></div>
                </section>
        </footer>
</body>

</html>