<?php
////////rcon need too faked
//echo $game_patch;
if (strpos($parseline, ' K;') !== false) {
	$rconstatus = 1;
    list($num, $idnumb, $vv4, $death_player_name, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parseline);
    $go = 0;
    if (empty($player_geoip_ctrl)) $player_geoip_ctrl[][][][] = array();
    if (!empty($player_geoip_ctrl)) {
        foreach ($player_geoip_ctrl as $oid => $r) {
            foreach ($r as $oguid => $k) {
                foreach ($k as $onick => $o) {
                    foreach ($o as $oip => $z) {
                        if ($go < 1) {
                            if (!empty($oguid)) {
                                if (($oguid != fakeguid(trim($killer_player_name))) && ($oid == $idkill)) {
                                    $go = 1;
                                    if ((rand(5, 15) < 7)) 
										rcon('say ' . $i_name . ' ^7(' . $killer_player_name . ') ^1Forbidden to change nicknames or so many symbols (^)!.', '');
                                    //usleep(980000);
                                    //xcon('clientkick ' . $idk, '');
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
    }
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

 //if (!empty($codoneprotected[$idnum][$enter_guid]))		
 //          $codoneprotected[$idnum][$enter_guid] = $originalz;



////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $plarid = $idkill;
				if (empty($stats_error[$plarid]['name']))
				{					
					$stats_error[$plarid]['name'] = trim($killer_player_name);
				}
                else if(!empty($stats_error[$plarid]['name']))
				{
					if(($stats_error[$plarid]['name']) != trim($killer_player_name))
					  {
						  
				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();	  
						  
			          if(time() - $stats_error[$plarid]['no_nickname_change_timer'] > 50)
						  {
							$stats_error[$plarid]['no_nickname_change_timer'] = time(); 
							usleep(20000);
							rcon('say ^3FAKE => ^1['.$killer_player_name.'] ^7Your nick: ^7'.$stats_error[$plarid]['no_nickname_change'].' ^1STATS BLOCKED!', '');	
						  $killer_player_name = 'nickname_faker';
						  //$death_player_name = 'nickname_faker';
						  }
						  $killer_player_name = 'nickname_faker';
						  //$death_player_name = 'nickname_faker';
					  } 		
				}
				
                $plarid = $idnumb;
				if (empty($stats_error[$plarid]['name']))
				{					
					$stats_error[$plarid]['name'] = trim($death_player_name);
				}
                else if (!empty($stats_error[$plarid]['name']))
				{

				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();					

					if(($stats_error[$plarid]['name']) != trim($death_player_name))
					  {
			          if(time() - $stats_error[$plarid]['no_nickname_change_timer'] > 50)
						  {
							$stats_error[$plarid]['no_nickname_change_timer'] = time(); 
							usleep(20000);
							rcon('say ^3FAKE => ^1['.$death_player_name.']' . ' ^7Your nick: ^7'.$stats_error[$plarid]['no_nickname_change'].' ^1STATS BLOCKED!', '');	
						  //$killer_player_name = 'nickname_faker';
						  $death_player_name = 'nickname_faker'; 
						  }		
					  	  //$killer_player_name = 'nickname_faker';
						  $death_player_name = 'nickname_faker';
					  } 
				}

	if(!empty($connect_error[$idnumb]['nickname_change']))
	{
						  //$killer_player_name = 'nickname_faker';
						  $death_player_name = 'nickname_faker'; 
						  
					  if(!empty($connect_error[$idnumb]['nickname_timers']))
	                      {
			          if(time() - $connect_error[$idnumb]['nickname_timers'] > 50)
						  {
							$connect_error[$idnumb]['nickname_timers'] = time(); 
							usleep(20000);
							rcon('say ^3CHANGE NICKNAME: ^7'.$connect_error[$idnumb]['nickname_change'].' ^3AND RECONNECT ^1STATS BLOCKED!(NICKNAME USED)', '');	
						  }							
						  }
	}
	
 	if(!empty($connect_error[$idkill]['nickname_change'])) 
	{
						  $killer_player_name = 'nickname_faker';
						  //$death_player_name = 'nickname_faker'; 
					  if(!empty($connect_error[$idkill]['nickname_timers']))
	                      {
			          if(time() - $connect_error[$idkill]['nickname_timers'] > 50)
						  {
							$connect_error[$idkill]['nickname_timers'] = time(); 
							usleep(20000);
							rcon('say ^3CHANGE NICKNAME: ^7'.$connect_error[$idkill]['nickname_change'].' ^3AND RECONNECT ^1STATS BLOCKED!(NICKNAME USED)', '');	
						  }							
						  }
						  
	}		
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
    if ($go == 1) 
		$parseline = $num . ';' . fakeguid(trim($death_player_name)) . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';0;' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
    else 
		$parseline = $num . ';' . fakeguid(trim($death_player_name)) . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';' . fakeguid(trim($killer_player_name)) . ';' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
		
}
else if (strpos($parseline, ' D;') !== false) {
	$rconstatus = 1;
	
    list($num, $idnumb, $vv4, $death_player_name, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parseline);	
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $plarid = $idkill;
				if (empty($stats_error[$plarid]['name']))
				{					
					$stats_error[$plarid]['name'] = trim($killer_player_name);
				}
                else if(!empty($stats_error[$plarid]['name']))
				{
					if(($stats_error[$plarid]['name']) != trim($killer_player_name))
					  {
						  
				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();	  
						  
			          if(time() - $stats_error[$plarid]['no_nickname_change_timer'] > 50)
						  {
							$stats_error[$plarid]['no_nickname_change_timer'] = time(); 
							usleep(20000);
							rcon('say ^3FAKE => ^1['.$killer_player_name.'] ^7Your nick: ^7'.$stats_error[$plarid]['no_nickname_change'].' ^1STATS BLOCKED!', '');	
							$killer_player_name = 'nickname_faker'; 
						  }		
					  } 		
				}
				
                $plarid = $idnumb;
				if (empty($stats_error[$plarid]['name']))
				{					
					$stats_error[$plarid]['name'] = trim($death_player_name);
				}
                else if (!empty($stats_error[$plarid]['name']))
				{

				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();					

					if(($stats_error[$plarid]['name']) != trim($death_player_name))
					  {
			          if(time() - $stats_error[$plarid]['no_nickname_change_timer'] > 50)
						  {
							$stats_error[$plarid]['no_nickname_change_timer'] = time(); 
							usleep(20000);
							rcon('say ^3FAKE => ^1['.$death_player_name.'] ^7Your nick: ^7'.$stats_error[$plarid]['no_nickname_change'].' ^1STATS BLOCKED!', '');	
							$death_player_name = 'nickname_faker'; 
						  }		
					  } 		
				}


	if(!empty($connect_error[$idnumb]['nickname_change']))
	{
						  $killer_player_name = 'nickname_faker';
						  $death_player_name = 'nickname_faker'; 
						  
					  if(!empty($connect_error[$idnumb]['nickname_timers']))
	                      {
			          if(time() - $connect_error[$idnumb]['nickname_timers'] > 50)
						  {
							$connect_error[$idnumb]['nickname_timers'] = time(); 
							usleep(20000);
							rcon('say ^3CHANGE NICKNAME: ^7'.$connect_error[$idnumb]['nickname_change'].' ^3AND RECONNECT ^1STATS BLOCKED!(NICKNAME USED)', '');	
						  }							
						  }
	}
	
 	if(!empty($connect_error[$idkill]['nickname_change'])) 
	{
						  $killer_player_name = 'nickname_faker';
						  $death_player_name = 'nickname_faker'; 
					  if(!empty($connect_error[$idkill]['nickname_timers']))
	                      {
			          if(time() - $connect_error[$idkill]['nickname_timers'] > 50)
						  {
							$connect_error[$idkill]['nickname_timers'] = time(); 
							usleep(20000);
							rcon('say ^3CHANGE NICKNAME: ^7'.$connect_error[$idkill]['nickname_change'].' ^3AND RECONNECT ^1STATS BLOCKED!(NICKNAME USED)', '');	
						  }							
						  }
						  
	}				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
    $parseline = $num . ';' . fakeguid(trim($death_player_name)) . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';' . fakeguid(trim($killer_player_name)) . ';' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
}
else if (strpos($parseline, ' J;') !== false) {
	$rconstatus = 1;
    list($num, $nm, $player_name) = explode(';', $parseline);
    $parseline = $num . ';' . fakeguid(trim($player_name)) . ';' . $nm . ';' . $player_name;

	if(!empty($stats_error[$nm])){ unset($stats_error[$nm]); echo "\n CLEAR $num ";}
    if(!empty($connect_error[$nm])){ unset($connect_error[$nm]); echo "\n CLEAR $num ";}	

}
else if (strpos($parseline, ' Q;') !== false) {
	$rconstatus = 1;
    list($num, $nm, $player_name) = explode(';', $parseline);
    $parseline = $num . ';' . fakeguid(trim($player_name)) . ';' . $nm . ';' . $player_name;
    if (empty($player_geoip_ctrl)) $player_geoip_ctrl[][][][] = array();
    unset($player_geoip_ctrl['' . $nm . '']);
	
	if(!empty($stats_error[$nm])){ unset($stats_error[$nm]); echo "\n CLEAR $num ";}
    if(!empty($connect_error[$nm])){ unset($connect_error[$nm]); echo "\n CLEAR $num ";}
	
}
else if ((strpos($parseline, ' say;') !== false) || (strpos($parseline, ' sayteam;') !== false)) {
	
	
	
	
	$rconstatus = 1;
    if (substr_count($parseline, ';') == 2) {

        list($num, $player_name, $react) = explode(';', $parseline);		
		
        list($i_id, $i_ping, $i_ip, $i_name, $i_guid, $xxccode) = explode(';', (rconExplodeNicknameone($player_name)));
        $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $i_guid))))));
        if (empty($stats_array[$conisq]['ip_adress'])) {
            $stats_array[$conisq]['ip_adress'] = ''.$i_ip.'';
            if (empty($stats_array[$conisq]['city'])) $stats_array[$conisq]['city'] = $xxccode;
            if (empty($stats_array[$conisq]['ping'])) $stats_array[$conisq]['ping'] = $i_ping;
        }
		
		
if(!empty($stats_array[$conisq]['user_status'])){
if($stats_array[$conisq]['user_status'] != 'admin')
{	
	if(!empty($stats_array[$conisq]['ip_adress'])){	
				$sql   = "SELECT s_guid,s_group,s_adm FROM `x_db_admins` WHERE s_guid='$i_guid' limit 1";	
                $statt = dbInsert('', $sql);
		   if (!empty($statt)) { 
      foreach ($statt as $row) {
if($row['s_group']=='0')
{		  
if($stats_array[$conisq]['ip_adress'] == ''.$row['s_adm'].'')
{	
   $stats_array[$conisq]['user_status'] = 'admin';
}}}}}}}		
		

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
                $plarid = $i_id;
				if (empty($stats_error[$plarid]['name']))
				{					
					$stats_error[$plarid]['name'] = trim($i_name);
				}
                else if (!empty($stats_error[$plarid]['name']))
				{

				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();					

					if(($stats_error[$plarid]['name']) != trim($i_name))
					  {
			          if(time() - $stats_error[$plarid]['no_nickname_change_timer'] > 50)
						  {
							$stats_error[$plarid]['no_nickname_change_timer'] = time(); 
							usleep(20000);
							rcon('say ^3FAKE => ^1['.$player_name.'] ^7Your nick: ^7'.$stats_error[$plarid]['no_nickname_change'].' ^1CHAT BLOCKED!', '');	
							$player_name       = $stats_error[$plarid]['no_nickname_change']; 
							$react             = '^1disabled fake chat';
						  }
                            $player_name       = $stats_error[$plarid]['no_nickname_change']; 
							$react             = '^1disabled fake chat';						  
					  } 		
				}				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		 
        $parseline = $num . ';' . $i_guid . ';' . $i_id . ';' . $i_name . ';' . $react;
	
	}
	else
	{
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// printconsole("say;" + self.getEntityNumber() + ";" + self.name + ";" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ) + "\n");
//
// logPrint("say;" + self.getEntityNumber() + ";" + self.name + ";" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ) + "\n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
if (substr_count($parseline, ';') == 3) {
list($num, $idnum, $nickr, $react) = explode(';', $parseline);

$i_guid = fakeguid($nickr);
		
if(!empty($stats_array[$conisq]['user_status'])){
if($stats_array[$conisq]['user_status'] != 'admin')
{	
	if(!empty($stats_array[$conisq]['ip_adress'])){	
				$sql   = "SELECT s_guid,s_group,s_adm FROM `x_db_admins` WHERE s_guid='$i_guid' limit 1";	
                $statt = dbInsert('', $sql);
		   if (!empty($statt)) { 
      foreach ($statt as $row) {
if($row['s_group']=='0')
{		  
if($stats_array[$conisq]['ip_adress'] == ''.$row['s_adm'].'')
{	
   $stats_array[$conisq]['user_status'] = 'admin';
}}}}}}}		
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////

                $plarid = $idnum;
				if (empty($stats_error[$plarid]['name']))
				{					
					$stats_error[$plarid]['name'] = trim($nickr);
				}
                else if (!empty($stats_error[$plarid]['name']))
				{

				if (empty($stats_error[$plarid]['no_nickname_change']))
				          $stats_error[$plarid]['no_nickname_change'] = $stats_error[$plarid]['name'];
				if (empty($stats_error[$plarid]['no_nickname_change_timer']))
				          $stats_error[$plarid]['no_nickname_change_timer'] = time();					

					if(($stats_error[$plarid]['name']) != trim($nickr))
					  {
			          if(time() - $stats_error[$plarid]['no_nickname_change_timer'] > 50)
						  {
							$stats_error[$plarid]['no_nickname_change_timer'] = time(); 
							usleep(20000);
							rcon('say ^3FAKE => ^1['.$player_name.'] ^7Your nick: ^7'.$stats_error[$plarid]['no_nickname_change'].' ^1CHAT BLOCKED!', '');	
							$player_name       = $stats_error[$plarid]['no_nickname_change']; 
							$react             = '^1disabled fake chat';
						  }
                            $player_name       = $stats_error[$plarid]['no_nickname_change']; 
							$react             = '^1disabled fake chat';						  
					  } 		
				}	
                     $parseline = 'ChatCommand_say;' . $i_guid . ';' . $idnum . ';' . $nickr . ';' . $react;				

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
// printconsole("say;" + self.getEntityNumber() + ";" + self.name + ";" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ) + "\n");
//
// logPrint("say;" + self.getEntityNumber() + ";" + self.name + ";" + chatcmd[ 0 ] + " " + combineChatCommand( chatcmd, " " ) + "\n");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////		
	}
	
	
   
                   // echo "\n -----------------------------\n ";
                  //  var_dump($player_geoip_ctrl);
                   // echo "\n -----------------------------";
   
}
?>