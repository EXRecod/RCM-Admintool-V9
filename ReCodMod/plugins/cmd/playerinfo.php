<?php
if (empty($x_return)) {
	$ext = 1;
++$x_number;
if (strpos($msgr, ixz.'geo') !== false)
    { 
echo '-GEO';
if (strpos($msgr, ixz.'geo ') !== false)
 list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
else 
 $x_idn = '';
 
if ($x_idn=='')
{
 if (empty($stats_array[$conisq]['ip_adress'])){
    list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', (rconExplode($guidn)));	
	    $stats_array[$conisq]['ip_adress'] = $i_ip;
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
} 
 
$i_name = $nickr;

	
	if (strpos($game_patch, 'cod1') !== false){	
	rcon('say "^2'.$infolx.': ^6[^3'.$stats_array[$conisq]['city'].'^6]"', '');
}else{
	rcon('tell '. $idnum . ' "^2'.$infolx.': ^6[^3'.$stats_array[$conisq]['city'].' ^7'.$infooip.':^3'.$stats_array[$conisq]['ip_adress'].'^6]"', ''); 
 	
}
	AddToLogInfo("[".$datetime."] GEO: " . $stats_array[$conisq]['ip_adress'] . " (" . $nickr . ") (" . $msgr . ")");    
	++$x_number;
	
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
   ++$x_stop_lp;    //return;	
 }
else
{  
    list($num,$i_ping,$i_ip,$i_name,$i_guid,$xxccode) = explode(';', (rconExplodeIdnum($x_idn))); 	
	
	rcon('say   ^3'.$i_name. ' "^2from:^3 '.$xxccode.'"', '');
	AddToLogInfo("[".$datetime."] GEO: " . $i_ip . " (" . $x_name . ") (" . $msgr . ") reason: G+id");    
	++$x_number;
	
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
   ++$x_stop_lp;    //return;
	}}
 ///////////////////////////////////////////////////////////////////////////////////////////
if (strpos($msgr, ixz.'guid') !== false)
    { 
 

if (strpos($msgr, ixz.'guid ') !== false)
 list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
else 
 $x_idn = '';
 
if ($x_idn=='')
{ 
		if (strpos($game_patch, 'cod1') !== false)
		rcon('say ^7'.$i_name.' ^2'.$infooguid.': ^3'.$guidn.'', '');
		else
		rcon('tell '.$idnum.'  ^7'.$i_name.' ^2'.$infooguid.': ^3'.$guidn.'', ''); 	
 

	AddToLogInfo("[".$datetime."] GEO: " . $i_ip . " (" . $nickr . ") (" . $guidn . ") reason: G");    
	++$x_number;
	
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
  
}
else
{ 
 
list($num,$i_ping,$i_ip,$i_name,$i_guid,$xxccode) = explode(';', (rconExplodeIdnum($x_idn)));

////////////////////////////////////////////////////////////////////////////////////////////////////	
 
		if (strpos($game_patch, 'cod1') !== false)
		rcon('say  ^7'.$i_name.' ^2guid: ^3'.$i_guid.'', ''); 
    else
		rcon('tell '.$idnum.'  ^7'.$i_name.' ^2guid: ^3'.$i_guid.'', '');
	
	AddToLogInfo("[".$datetime."] anoth GUID: " . $i_ip . " (" . $x_name . ") (" . $guidn . ")");    
	++$x_number;
	
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
    }}
	
 
    if (strpos($msgr, ixz . 'ip') !== false) {
            
            if ((($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5')) && (!empty($guidn)))
                rcon('tell ' . $i_id . ' ^2My IP:^3 ' . $stats_array[$conisq]['ip_adress'] . ' ^2My GUID:^3 ' . $guidn, '');
            else if (strpos($game_patch, 'cod1_1.1') !== false)
                rcon('say ^2My IP:^3 ' . $stats_array[$conisq]['ip_adress'], '');
            else
                rcon('tell ' . $i_id . ' ^2My IP:^3 ' . $stats_array[$conisq]['ip_adress'], '');
            AddToLogInfo("[" . $datetime . "] IP: " . $stats_array[$conisq]['ip_adress'] . " (" . $nickr . ") (" . $msgr . ") reason: I");	
            echo '    ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
            ++$x_stop_lp; //return;	
    }




if ((strpos($msgr, ixz . 'next') !== false) && ($x_number != 1)) {
	   ++$x_stop_lp;    //return;
 

require $cpath.'ReCodMod/functions/getinfo/sv_mapRotation.php';
fclose($connx);	

 //$emaprun - current map
 //$mapsxc - current game type and map rotation.
 if(empty($emaprun)) {
$status = new COD4xServerStatus($server_ip, $server_port);
                if ($status->getServerStatus())
                 {
                  $status->parseServerData();
					$serverStatus = $status->returnServerData(); 				  
   if(empty($emaprun))               
echo $emaprun = $serverStatus['mapname'];
                 }
} 
 
if (preg_match('/\b'.$emaprun.'\b\s\b(.+)/iu', $mapsxc, $match)) {
	$mapnamekl = explode(trim($emaprun), $mapsxc);
        $mapnamekl[1] = preg_replace("/\b[a-z]{1,4}\b/iu", "", $mapnamekl[1]);
	$lll = preg_replace("/\W*\b/iu", "%%", $mapnamekl[1]);
        $emaprunln = explode('%%%%', $lll);
echo "  next map";
echo '---> '.$emaprunl = $emaprunln[1];}

if(empty($emaprunl))
	$emaprunl = 'Unknown';
 

rcon('say '.$infoomnxtt.' ^7'.$emaprunl.'', '');
++$x_number;	
++$x_return;
   
        ++$x_number;
        echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
   
		   
    }
////////////////////////////////////////////////////////////////////////////////////////////
 if ((strpos($msgr, ixz . 'time') !== false) && ($x_number != 1)) {
	    
        if (strpos($nickr, $x_nickx) !== false) {
 if (empty($stats_array[$conisq]['ip_adress'])){
    list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', (rconExplode($guid)));	
	    $stats_array[$conisq]['ip_adress'] = $i_ip;
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
}	
            $gi     = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
            $record = geoip_record_by_addr($gi, $stats_array[$conisq]['ip_adress']);
            $xxxnw  = ($record->country_name);
            //Calculate the timezone and local time
            try {
                //Create timezone
                $user_timezone        = new DateTimeZone(get_time_zone($record->country_code, ($record->region != '') ? $record->region : 0));
                //Create local time
                $user_localtime       = new DateTime("now", $user_timezone);
                $user_timezone_offset = $user_localtime->getOffset();
            }
            //Timezone and/or local time detection failed
            catch (Exception $e) {
                $user_timezone_offset = 7200;
                $user_localtime       = new DateTime("now");
            }
            echo 'User local time: ' . $user_localtime->format('H:i:s');
            //echo 'Timezone GMT offset: ' . $user_timezone_offset . '<br/>';
            $serverdate = date('M-d H:i:s');
            usleep($sleep_rcon * 2);
            rcon('say ^7' . $chistx . ' ^3Geo: ^7' . $xxxnw . ' ^3' . $infootime . ':^7 ' . $user_localtime->format('H:i:s') . ' ^3' . $sunnsett . ': ^7' . date_sunset(time(), SUNFUNCS_RET_STRING, $record->latitude, $record->longitude, ini_get("date.sunset_zenith"), ($user_timezone_offset / 3600)) . ' ^3' . $inforsun . ': ^7' . date_sunrise(time(), SUNFUNCS_RET_STRING, $record->latitude, $record->longitude, ini_get("date.sunrise_zenith"), ($user_timezone_offset / 3600)) . ' ^3' . $infoservv . ': ^7' . $serverdate, '');
            AddToLogInfo("[" . $datetime . "] Time: " . $stats_array[$conisq]['ip_adress'] . " (" . $nickr . ") (" . $msgr . ")");
            ++$x_number;
            //f//close($connect);	
            echo '  -time-  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
            ++$x_stop_lp; //return;	
        }
    }
$ext = 0;	
} 		 
?> 