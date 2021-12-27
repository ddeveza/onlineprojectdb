<?php

function Day($date){
	$day = strtotime($date);

	return round($day / 86400);
}

function MaxDate($date1, $date2)  
{ 
	// Calulating the difference in timestamps 
	$date1 = strtotime($date1);
	$date2 = strtotime($date2); 
	
	$maxdate = max($date1,$date2);
	// 1 day = 24 hours 
	// 24 * 60 * 60 = 86400 seconds 
	return round($maxdate / 86400); 
}

function MinDate($date1, $date2)  
{ 
	// Calulating the difference in timestamps 
	$date1 = strtotime($date1);
	$date2 = strtotime($date2); 
	
	$mindate = min($date1,$date2);
	// 1 day = 24 hours 
	// 24 * 60 * 60 = 86400 seconds 
	return round($mindate / 86400); 
}

 
function dateDiffInDays($date1, $date2)  
{ 
	// Calulating the difference in timestamps 
	$diff = strtotime($date2) - strtotime($date1); 
	
	// 1 day = 24 hours 
	// 24 * 60 * 60 = 86400 seconds 
	return round($diff / 86400); 
}


?>