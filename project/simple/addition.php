<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$company = $salary = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   // Get company & salary
       $company = trim($_POST["company"]);
       $salary = trim($_POST["salary"]);  
       
   // Prepare an insert statement
   $sql = "INSERT INTO jobs (job, salary) VALUES (?, ?)";
       
       // Use DB info in $link from config.php to construct MySQL message/command
       if($stmt = mysqli_prepare($link, $sql)){
 
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "ss", $param_company, $param_salary);
           
           // Set parameters
           $param_company = $company;
           $param_salary = $salary;
           
           // Attempt to EXECUTE the prepared statement
           mysqli_stmt_execute($stmt);            
 
           // Close statement
           mysqli_stmt_close($stmt);
           $message = "Congratulations! You Have Successfully Added a new JOB!";
 
       } else {
                $message = "Problems with inserting to Database";            
       }
 
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>AddJOB</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>