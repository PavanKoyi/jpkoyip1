<?php
/* Database credentials. */
define('DB_SERVER', 'us-cdbr-east-03.cleardb.com');
define('DB_USERNAME', 'b45059cd74e131');
define('DB_PASSWORD', '76624f61');
define('DB_NAME', 'heroku_422bace70db49be');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
