<?php
if ($x_stop_lp == 0 ) {
 
   if (strpos($msgr, $ixz.'list') !== false)
    { 	
    	 	
require $cpath.'ReCodMod/functions/inc_functions2.php';
$i = 0;
foreach ($rconarray as $j => $e)
	{	
$colorb=$i%2>0? '^6':'^3';
$colora=$i%2>0? '^7':'^7';
++$i;  
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
 
if((empty($i_ip)) 
	|| (strpos($i_ip, '192.168') !== false)
    || (strpos($i_ip, '255.255') !== false)
	|| (strpos($i_ip, 'localhost') !== false)
	|| (strpos($i_ip, '127.0.0.1') !== false)
	)
$i_ip = '37.120.56.200';
	
$gi = geoip_open($cpath."ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat",GEOIP_STANDARD);
$record = geoip_record_by_addr($gi,$i_ip);
$xxxnw = ($record->country_name . ", ".$record->city."");
 
if (empty($stats_array[$conisq]['user_status'])) 
$statuszl = '^9Player';
else
	$statuszl = $stats_array[$conisq]['user_status'];
  
if (!preg_match("/^bot\d+$/",  $chistx, $tmp2n))
{	
		
if ((strpos($game_patch, 'cod1_1.1') !== false) || ($game_mod == 'codam')){	
rcon('say '.$colorb.'#Id:'.$colorb.'  '.$colora.$i_id.' '.$colorb.' '.$infoonick.': '.$colorb. $colora .$i_name.' '.$colorb.$infoostat.': ^4('.$statuszl.'^4) '.$colorb.' '.$infooip.': '. $colora .substr($i_ip, 0, 7).'** "'.$colorb.' '.$infoofrom.': ^4(^2'.$xxxnw.'^4)"', '');	
 } else{
		
		
rcon('tell '. $idnum .' '.$colorb.'#Id:'.$colorb.'  '.$colora.$i_id.' '.$colorb.' '.$infoonick.': '.$colorb. $colora .$i_name.' '.$colorb.$infoostat.': ^9('.$statuszl.'^9) '.$colorb.' '.$infooip.': '. $colora .$i_ip.' "'.$colorb.' '.$infoofrom.': ^9(^2'.$xxxnw.'^9)"', '');	
 }	
} 
	}
	AddToLogInfo("[".$datetime."] GEO: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: G+id");    	
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
   ++$x_stop_lp;    //return;	
}
  
	}		 
?>
 
