
<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$carname = ""; 
$carname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
        // Prepare a select statement
		 $sql = "SELECT id FROM seat WHERE carname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_carname);
            
            // Set parameters
            $param_username = trim($_POST["carname"]);
            
            // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
              
                  $carname = trim($_POST["carname"]);
               // }
				 mysqli_stmt_close($stmt);
             
        }
         
        // Close statement
       
    }
    
    
    // Check input errors before inserting in database
    if(empty($carname_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO seat (carname) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_carname);
            
            // Set parameters
            $param_carname = $carname;
           // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: seat.php");
             mysqli_stmt_close($stmt);
		    }else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE>
<html>

<head>
<title> website </title>
 
<link rel="stylesheet" type="text/css" href="css/brand.css"/>


</head>

<body>
<div id="leftlogo">
<img src="images/headerlogo.png">
</div>


 
<div id="container">
<h1>SEAT</h1>
</div>

<div id="navigation">

<ul id="navmenu">
<li> <a href="../home.php"> home </a> </li>
<li> <a href="aboutus.html"> about us </a> </li>
<li> <a href="help.html"> help </a> </li>
<li> <a href="contact.html"> contact </a> </li>
<li> <a href="faq.html"> faq </a> </li>
</ul>

<div id="banner">
<br>
<br>
<br>
<h2>Select the car to know more</h2>
</div>

<table>
  <tr>
    <td><img src="images/seat1.jpg" /><p><a href="https://www.seat.com/carworlds/alhambra/overview.html"> ALHAMBRA </a></p></td>
    <td><img src="images/seat2.jpg" /><p><a href="https://www.seat.com/carworlds/suv-ateca/overview.html">SUV-ATECA </a></p></td>
   
  </tr>
  <tr>
    <td><img src="images/seat3.jpg" /><p><a href="https://www.seat.com/carworlds/arona/overview.html">ARONA  </a></p></td>
    <td><img src="images/seat4.jpg" /><p><a href="https://www.seat.com/carworlds/leon-cupra/r-limited-edition.html">LEON-CUPRA R  </a></p></td>
    
  </tr>
  <tr>
    <td><img src="images/seat5.jpg" /><p><a href="https://www.seat.com/carworlds/leon-cupra/overview.html "> LEON-CUPRA </a></p></td> 
    <td><img src="images/seat6.jpg" /><p><a href="https://www.seat.com/carworlds/leon-xperience/overview.html"> LEON-XPERIENCE </a></p></td>

  </tr>
  <tr>
    <td><img src="images/seat7.jpg" /><p><a href="https://www.seat.com/carworlds/leon-st/overview.htm"> LEON-ST </a></p></td>
    <td><img src="images/seat8.jpg" /><p><a href="https://www.seat.com/carworlds/leon-5d/overview.html"> LEON-5D </a></p></td> 
  </tr>
 
 
</table>

<div id="footer">
<h2>Please tell us about the car you liked the most!</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($carname_err)) ? 'has-error' : ''; ?>">
                <label>Car name</label>
                <input type="text" name="carname" class="form-control" value="<?php echo $carname; ?>">
                <span class="help-block"><?php echo $carname_err; ?></span>
            </div>    
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Thank you. <a href="home.php"> Go back</a>.</p>
        </form>

</div>
</body>
</html>