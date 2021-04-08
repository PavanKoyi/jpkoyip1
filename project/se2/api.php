<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['company']))
{
	$company=$_GET['company'];
	$salary = get_salary($company);
	
	if(empty($salary))
	{
		response(200,"Job Not Found",NULL);
	}
	else
	{
		response(200,"Job Found",$salary);
	}	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}

?>
