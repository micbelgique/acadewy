<?php

function getAge($birthday)
{  
	$birth = new DateTime($birthday); 
	$today = new DateTime(); 
	$diff = $birth->diff($today); 
	return $diff->format('%y');
}
