<?php

function get_salary($company)
{
	$jobs = [
		"Vismano"=>100000,
		"FB"=>200000,
		"Google"=>150000			
	];
	
	foreach($jobs as $job=>$salary)
	{
		if($job==$company)
		{
			return $salary;
			break;
		}
	}
}

?>
