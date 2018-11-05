<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");

    exit;
}
?>

<!DOCTYPE >
<html>

<head>
<title> website </title>
 
<link rel="stylesheet" type="text/css" href="css/home2.css"/>


</head>

<body>
<div id="leftlogo">
<img src="images/headerlogo.png">
</div>

<div id="rightlogo">

<p><a href="logout.php"> Logout here</a> </p>
 </div>
 
<div id="container">
<h1 style="color: #eee;">CAR60 PVT LTD</h1>
</div>
   
<div id="navigation">

<ul id="navmenu">
<li> <a href="../home.php"> home </a> </li>
<li> <a href="aboutus.html"> about us </a> </li>
<!--<li> <a href="help.html"> help </a> </li>-->
<li> <a href="contact.html"> contact </a> </li>
<li> <a href="faq.html"> faq </a> </li>
</ul>

<div id="banner">
<br>
<br>
<br>
<h2>Choose a Brand</h2>
</div>

<br>
<br>
<br>

<div id="content_area">
<div class="row">

<div class="column">
<a href="mercedes.php"><img src="images/mercedes.jpg"></a>
<br>
<br>
<a href="bmw.php"><img src="images/bmw.jpg"></a>
</div>
<div class ="column">
<a href="audi.php"><img src="images/audi.jpg"></a>
<br>
<br>
<a href="seat.php"><img src="images/seat.jpg"></a>
</div>




<div id="footer">
<p> copyright 2018 . All rights reserved</p>
</div>

</body>
</html>