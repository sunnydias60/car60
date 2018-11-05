
<?php

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$carname = "";
$carname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
        // Prepare a select statement
		 $sql = "SELECT id FROM mercedes WHERE carname = ?";
        
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
               // }
				 mysqli_stmt_close($stmt);
             
        }
         
        // Close statement
       
    }
    
    
    // Check input errors before inserting in database
    if(empty($carname_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO mercedes (carname) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_carname);
            
            // Set parameters
            $param_carname = $carname;
           
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: mercedes.php");
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
<h1>MERCEDES</h1>
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
    <td><img src="images/mercedes1.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/s-class/s-class-cabriolet/explore.html"> S-CLASS CABRIOLET </a></p></td>
    <td><img src="images/mercedes2.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/gle/gle-suv/explore.html">GLE SUV </a></p></td>
   
  </tr>
  <tr>
    <td><img src="images/mercedes3.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/a-class/a-class-hatchback/explore.html">A-CLASS</a></p></td>
    <td><img src="images/mercedes4.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/b-class/b-class-hatchback/explore.html">B-CLASS  </a></p></td>
    
  </tr>
  <tr>
    <td><img src="images/mercedes5.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/cla/cla-coupe/explore/cla-highights.module.html"> CLA-COUPE </a></p></td> 
    <td><img src="images/mercedes6.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/c-class/c-class-cabriolet/explore/models.module.html"> C-CLASS-CABRIOLET </a></p></td>

  </tr>
  <tr>
    <td><img src="images/mercedes7.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/gla/gla-suv/explore/model-2.module.html">QLA-SUV  </a></p></td>
    <td><img src="images/mercedes8.jpeg" /><p><a href="https://www.mercedes-benz.co.in/passengercars/mercedes-benz-cars/models/e-class/e-class-saloon/explore/model.module.html"> E-CLASS-SALOON </a></p></td> 
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

</div>
</body>
</html>