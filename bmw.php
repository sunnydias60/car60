
<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$carname = ""; 
$carname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
        // Prepare a select statement
		 $sql = "SELECT id FROM bmw WHERE carname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_carname);
            
            // Set parameters
            $param_carname = trim($_POST["carname"]);
            
            // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
		
            
                 
    			  $carname = trim($_POST["carname"]);
		      
			     mysqli_stmt_close($stmt);
             
		}   
         
        // Close statement
       
    }
	
	
    // Check input errors before inserting in database
    if(empty($carname_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO bmw (carname) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_carname);
            
            // Set parameters
            $param_carname = $carname;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
				// Redirect to login page
                header("location: bmw.php");
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
<h1>BMW</h1>
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
    <td><img src="images/bmw1.jpg" /><p><a href="https://www.bmw.in/en/all-models/m-series/m2-competition/2018/bmw-m2-competition-at-a-glance.html">M2-COMPETITION</a></p></td>
    <td><img src="images/bmw2.jpg" /><p><a href="https://www.bmw.in/en/all-models/5-series/sedan/2017/at-a-glance.html">5-SERIES SEDAN </a></p></td>
   
  </tr>
  <tr>
    <td><img src="images/bmw3.jpg" /><p><a href="https://www.bmw.in/en/all-models/m-series/x5-m/2014/at-a-glance.html"> M-SERIES X5-M  </a></p></td>
    <td><img src="images/bmw4.jpg" /><p><a href="https://www.bmw.in/en/all-models/x-series/X5/2013/at-a-glance.html"> X-SERIES X5 </a></p></td>
    
  </tr>
  <tr>
    <td><img src="images/bmw5.jpg" /><p><a href="https://www.bmw.in/en/all-models/x-series/X1/2015/at-a-glance.html "> X-SERIES X1 </a></p></td> 
    <td><img src="images/bmw6.jpg" /><p><a href="https://www.bmw.in/en/all-models/x-series/X3/2018/at-a-glance.html"> X-SERIES X3 </a></p></td>

  </tr>
  <tr>
    <td><img src="images/bmw7.jpg" /><p><a href="https://www.bmw.in/en/all-models/7-series/sedan/2015/at-a-glance.html">7-SERIES SEDAN  </a></p></td>
    <td><img src="images/bmw8.jpg" /><p><a href="https://www.bmw.in/en/all-models/7-series/sedan/2015/bmw-mperformance.html ">THE  M760 LI </a></p></td> 
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