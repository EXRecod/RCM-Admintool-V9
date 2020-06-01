<?php
if (strpos($msgr, $ixz.'gt ') !== false){
////////////////////////////////////Change gametype 
 list($x_cmd, $x_gametype) = explode(' ', $msgr);   // !gt sd 
$x_gt = gtt($x_gametype);
	
	rcon('say ^3'.$infoogtxx.' '.$x_gt, '');
	sleep(1);	 	
	rcon('set g_gametype '.$x_gt.'', '');
	AddToLog("[".$datetime."] Gametype CHANGE: (" . $i_ipn . ") (" . $i_id . ") BY: (" . $x_nickx . ") ");		  
}       
////////////////////////////////////Change gametype
?>
 
