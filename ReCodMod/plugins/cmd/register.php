<?php
if (strpos($msgr, ixz.'enter ') !== false){
//if (strpos($parseline, 'ChatCommand_say;') !== false){
	
if (empty($codoneprotected[$idnum][$nickr]['time']))		
          $codoneprotected[$idnum][$nickr]['time'] = time()+20;	
	   
if(time() - $codoneprotected[$idnum][$nickr]['time'] > 10)
{	
	$codoneprotected[$idnum][$nickr]['time'] = time();
	
if (strpos($msgr, ' ') !== false)
{	
   list($nt,$password) = explode(ixz.'enter', $msgr);
   $password = md5(md5(trim($password)));

    $date = date('Y-m-d H:i:s');
	
    if (!empty($stats_array[$conisq]['ip_adress']))
         $ip = $stats_array[$conisq]['ip_adress'];	
		else 
		{	 
$ip = '';
for ($i = 1;$i <= 3;$i++) {	
usleep(50000); 
$rconExplode = rconExplodeIdnuminfo($idk);
list($c_id,$i_ping,$ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', $rconExplode);
if(!empty($ip))
	$i = 3;
}	 	 $stats_array[$conisq]['ip_adress'] = $ip;
		 }
 
      $gi = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
      $record = geoip_record_by_addr($gi, $ip);
      if (!empty($record)) $xxccode = ($record->country_code);
      else $xxccode = '';	 

    usleep($sleep_rcon*2);
	$statt = 0;
$dj = dbSelectArray('', "SELECT guid,playername,password,geo FROM users WHERE password='" . $password . "' LIMIT 1");
    if (!empty($dj)) {

      foreach ($dj as $row) { 
        $enter_guid = $row['guid'];
        $enter_play = $row['playername']; 
		$enter_geo  = $row['geo'];
		$statt = 1;
 
//$sql = "UPDATE users SET playername = '" . $enter_play . "'  WHERE password='" . $password;
//dbSelectArray('', $sql);	
		
 if (empty($codoneprotected[$idnum][$nickr]['enter_guid']))		
           $codoneprotected[$idnum][$nickr]['enter_guid'] = $enter_guid;
 if (empty($codoneprotected[$idnum][$nickr]['enter_play']))		
           $codoneprotected[$idnum][$nickr]['enter_play'] = $originalz;
 if (empty($codoneprotected[$idnum][$nickr]['enter_geo']))		
           $codoneprotected[$idnum][$nickr]['enter_geo']  = $enter_geo;	   
	   
	rcon('say ^4['.$enter_geo.'] ^7'.$originalz.' ^2Password ok! ^3Your GUID:'.$enter_guid, '');
	rcon('say ^1!IMPORTANT ^6DO NOT CHANGE NICKNAME AFTER !enter ... ', '');
    rcon('say ^1After map restart use !enter .... ', '');	
	
	if(!empty($codoneprotectedalarm[$idnum]['enter_timer']))
	    unset($codoneprotectedalarm[$idnum]['enter_timer']);

	if(!empty($stats_error[$idnum])){ unset($stats_error[$idnum]); echo "\n CLEAR $idnum ";}
    if(!empty($connect_error[$idnum])){ unset($connect_error[$idnum]); echo "\n CLEAR $num ";}	       
	   
	   } 
       if ($statt == 0)
	   {
$dj = dbSelectArray('', "INSERT INTO `users` (`guid`, `playername`, `password`, `ip`, `geo`, `time`) 
VALUES ('$guidn','$nickr','$password','$ip','$xxccode','$date')"); 


if (!empty($dj)) {

	rcon('say ^4['.$xxccode.'] ^7'.$originalz.' ^2NEW Enter Success! ^3Your GUID:'.$guidn, '');
	rcon('say ^1!IMPORTANT ^6DO NOT CHANGE NICKNAME AFTER !enter ... ', '');
    rcon('say ^1After map restart use !enter .... ', '');	
		
 if (empty($codoneprotected[$idnum][$nickr]['enter_guid']))		
           $codoneprotected[$idnum][$nickr]['enter_guid'] = $guidn;
 if (empty($codoneprotected[$idnum][$nickr]['enter_play']))		
           $codoneprotected[$idnum][$nickr]['enter_play'] = $originalz;
 if (empty($codoneprotected[$idnum][$nickr]['enter_geo']))		
           $codoneprotected[$idnum][$nickr]['enter_geo']  = $xxccode;	
	   
	if(!empty($codoneprotectedalarm[$idnum]['enter_timer']))
	    unset($codoneprotectedalarm[$idnum]['enter_timer']);	   

	if(!empty($stats_error[$idnum])){ unset($stats_error[$idnum]); echo "\n CLEAR $idnum ";}
    if(!empty($connect_error[$idnum])){ unset($connect_error[$idnum]); echo "\n CLEAR $idnum ";}	
 }
else
{
rcon('say ^4['.$xxccode.'] ^7You registered '.$originalz.'! ^6ERROR!!! ^1YOUR PASSWORD IS INNCORECT!', '');		
} 
 
 
}
}
else
{
rcon('say ^4['.$xxccode.'] ^7'.$originalz.' ^6ERROR!!! ^1YOUR PASSWORD IS INNCORECT!', '');		
}
}}}
//}
 

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
if ((strpos($msgr, ixz.'register') !== false)||(strpos($msgr, ixz.'reg') !== false)){ 	

 if ((empty($stats_array[$conisq]['user_status']))|| $stats_array[$conisq]['user_status'] == 'guest'){ 
 $stats_array[$conisq]['user_status'] = 'registered';
  
//if (!empty($stats_array[$conisq]['admins']))
//  $guidn = $stats_array[$conisq]['admins']; 

 if (strpos($stats_array[$conisq]['user_status'], 'registered') !== false)	
    config_ini_set("_groups_database", 'registered','all_'.$guidn,$guidn);
  
usleep($sleep_rcon*2);

    $dbSelArray = dbSelectArray('', "SELECT * FROM x_db_admins WHERE s_guid='" . $guidn . "' LIMIT 1");
    if (is_array($dbSelArray)) {$statt = 0;
      foreach ($dbSelArray as $row) { 
        $adm_ip = $row['s_adm'];
        $a_grp = $row['s_group']; 
		$statt = 1; 
       } 
       if ($statt > 0)
	   {
		   if ($game_patch != 'cod1_1.1')
        xcon('tell ' . $idnum . ' ^6Status => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickr) , '');
	else
		xcon('say ^6Status => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickr) , '');
		$sql2 = "UPDATE x_db_admins SET s_group='".userStatus($stats_array[$conisq]['user_status'])."' WHERE s_guid='" . $guidn . "'";  
        dbInsert('', $sql2);
	   }		
       else {  
if (empty($stats_array[$conisq]['ip_adress'])){
    list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', (rconExplode($guidn)));	
	    $stats_array[$conisq]['ip_adress'] = $i_ip;
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
} 
if ($game_patch != 'cod1_1.1')
    xcon('tell '.$i_id.' ^3'.$loggistopk. ' => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickr) , '');
else
	xcon('say ^3'.$loggistopk. ' => ^1['.$stats_array[$conisq]['user_status'].']', '');	   
	 	 
         $date = date('Y-m-d H:i:s'); 
 $sql2 = "INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid) VALUES ('" . $stats_array[$conisq]['ip_adress'] . "', '" . $date . "', '".(int)(userStatus($stats_array[$conisq]['user_status']))."', '" . $guidn . "')";  
  dbInsert('', $sql2);
 
        } 
	 }  
}}
 
 
?>