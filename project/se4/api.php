<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['company']) and !empty($_GET['salary']))
{
	$company=$_GET['company'];
	$salary=$_GET['salary'];

	$r = get_salary($company,$salary);
	
	if(empty($r))
	{
		response(200,"Job Not Found",NULL);
	}
	else
	{
		response(200,"Job Found",$r);
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
	$response['data is correct']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>