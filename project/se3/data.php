<?php

function get_salary($company)
{
        /* Database INFO */
	$servername = "localhost";
	$username = "koyip1";
	$password = "s4ewab";
	$dbname = "koyip1_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT salary FROM jobs WHERE job = '$company'";
       $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                      $salary = $row["salary"];
      }
    } else {
                     $salary = null;
        }

    $conn->close();

    return $salary;
}

?>





