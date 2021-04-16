<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$company = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
       $company = trim($_POST["company"]);
    //    $password = trim($_POST["salary"]);
 
   // Validate credentials
 
       // Prepare a select statement
       $sql = "SELECT job, salary FROM jobs WHERE job = ?";
       
       if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "s", $param_company);
           
           // Set parameters
           $param_company = $company;
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               // Store result
               mysqli_stmt_store_result($stmt);
               
               // Check if company exists, if yes then verify salary
               if(mysqli_stmt_num_rows($stmt) == 1){                    
                   // Bind result variables
                   mysqli_stmt_bind_result($stmt, $job, $salary);
                   if(mysqli_stmt_fetch($stmt)){
                    $message = "Welcome Back!" .$salary;
                   }
               } else{
                   // Display an error message if company doesn't exist
                   $message = "No Job found with that Company.";
               }          
           }
 
           // Close statement
           mysqli_stmt_close($stmt);
       }
   
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>Login</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>
