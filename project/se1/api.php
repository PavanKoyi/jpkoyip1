<?php
header("Content-Type:application");
require "data.php";

if(!empty($_GET['company']))
{
	$company=$_GET['company'];
	$salary = get_salary($company);
	
	if(empty($salary))
	{
		response(NULL);
	}
	else
	{
		response($salary);
	}	
}
else
{
	response(NULL);
}

function response($data)
{
	header("HTTP/1.1 ");
	
	echo $data;
}

?>
