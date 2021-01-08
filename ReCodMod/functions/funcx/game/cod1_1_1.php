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


$fakeguiddeath = fakeguid(trim($death_player_name));
$fakeguidkiller = fakeguid(trim($killer_player_name));

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (!empty($codoneprotected[$idnumb][$death_player_name]['enter_guid']))
 {
	 $fakeguiddeath = $codoneprotected[$idnumb][$death_player_name]['enter_guid'];
	 $codoneprotectedt[$idnumb]['time_active'] = time();
 }
 if (!empty($codoneprotected[$idkill][$killer_player_name]['enter_guid']))
 {
	$fakeguidkiller = $codoneprotected[$idkill][$killer_player_name]['enter_guid'];
	$codoneprotectedt[$idkill]['time_active'] = time();
 }

for ($i = 0;$i <= 60;$i++) {
	$x = $i;
	
//////////////////////////////////////////////// session enter and in 180 seconds	
 if (!empty($codoneprotected[$x]))
 {	
      if(empty($codoneprotectedtimer[$x]['time']))
		  $codoneprotectedtimer[$x]['time'] = time();
	  if(empty($codoneprotectedt[$idnumb]['time_active']))
		  $codoneprotectedt[$idnumb]['time_active'] = time(); 
	  if(empty($codoneprotectedt[$idkill]['time_active']))
		  $codoneprotectedt[$idkill]['time_active'] = time(); 
      
       if($codoneprotectedt[$idnumb]['time_active'] - $codoneprotectedtimer[$x]['time'] >= 60*5)
			{
          	unset($codoneprotectedtimer[$x]['time']);		
			unset($codoneprotectedt[$x]);
			unset($codoneprotected[$x]);
			debuglog((__FILE__)." ID: $x !enter timeout"); 	
			}		
 }
//////////////////////////////////////////////// 

 if (!empty($codoneprotected[$x][$death_player_name]['enter_guid']))
 {
	 if (empty($codoneprotected[$idnumb][$death_player_name]['enter_guid']))
	 {
			//
			if(empty($codoneprotected[$x][$death_player_name]['time_error']))
			{
			rcon('say ^4['.$codoneprotected[$x][$death_player_name]['enter_geo'].'] '.$death_player_name.' ^1PLEASE ^7!enter , ^1OR ^7!enter will be deleted!', '');	
			rcon('say ^2You have 1 minute!', '');
			$codoneprotected[$x][$death_player_name]['time_error'] = time();
			}
			else
			{
			if(time() - $codoneprotected[$x][$death_player_name]['time_error'] >= 60)
			{
          		 unset($codoneprotected[$x]);		
			rcon('say ^7'.$death_player_name.' ^1DELETED session ^7!enter!', '');
			debuglog((__FILE__)." ID: $death_player_name ^1DELETED session ^7!enter!"); 
			}			
			}
		     $i = 60;
	 }
	 
 }
 
 if (!empty($codoneprotected[$x][$killer_player_name]['enter_guid']))
 {
     if (empty($codoneprotected[$idkill][$killer_player_name]['enter_guid']))
     {
			//
			if(empty($codoneprotected[$x][$killer_player_name]['time_error']))
			{
			rcon('say ^4['.$codoneprotected[$x][$killer_player_name]['enter_geo'].'] '.$killer_player_name.' ^1PLEASE ^7!enter , ^1OR ^7!enter will be deleted!', '');	
			rcon('say ^2You have 1 minute!', '');
			$codoneprotected[$x][$killer_player_name]['time_error'] = time();
			}
			else
			{
			if(time() - $codoneprotected[$x][$killer_player_name]['time_error'] >= 60)
			{
          		 unset($codoneprotected[$x]);
            rcon('say ^7'.$killer_player_name.' ^1DELETED session ^7!enter!', '');
			debuglog((__FILE__)." ID: $killer_player_name ^1DELETED session ^7!enter!"); 			
			}			
				
			}
		     $i = 60;
     }
 }	
}


 if (empty($codoneprotected[$idkill][$killer_player_name]['enter_guid']))
 {
$dj = dbSelectArray('', "SELECT guid,playername,password,geo FROM users WHERE guid='" . $fakeguidkiller . "' LIMIT 1");
    if (!empty($dj)) {

      foreach ($dj as $row) { 
        $enter_guid = $row['guid'];
        $enter_play = $row['playername']; 
		$enter_geo  = $row['geo'];
		$statt = 1;
	
 if (empty($codoneprotectedalarm[$idkill]['enter_timer']))		
           $codoneprotectedalarm[$idkill]['enter_timer'] = time();					 

    rcon('say ^7'.$killer_player_name.' ^1You have 30 seconds, for ^7!enter ^7this guid or kick!', '');
	debuglog((__FILE__)." ID: $killer_player_name ^1You have 30 seconds, for ^7!enter ^1this guid or kick!"); 
	
	  }					 
	}
	///else
	///{
    ///rcon('say ^7'.$killer_player_name.' ^1You have 30 seconds, for ^7!enter ^7this guid or kick!', '');
	///debuglog((__FILE__)." ID: $killer_player_name ^1You have 30 seconds, for ^7!enter ^7this guid or kick!"); 		
	///}
 }

 if (!empty($codoneprotectedalarm[$idkill]['enter_timer']))		
          if(time() - $codoneprotectedalarm[$idkill]['enter_timer'] >= 30)
			 xcon('clientkick ' . $idkill, '');


////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
    if ($go == 1) 
		$parseline = $num . ';' . $fakeguiddeath . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';0;' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
    else 
		$parseline = $num . ';' . $fakeguiddeath . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';' . $fakeguidkiller . ';' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
		
}
else if (strpos($parseline, ' D;') !== false) {
	$rconstatus = 1;
	
    list($num, $idnumb, $vv4, $death_player_name, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parseline);	
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if (!empty($codoneprotectedalarm[$idkill]['enter_timer']))		
          if(time() - $codoneprotectedalarm[$idkill]['enter_timer'] >= 60)
			 xcon('clientkick ' . $idkill, '');


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

$fakeguiddeath = fakeguid(trim($death_player_name));
$fakeguidkiller = fakeguid(trim($killer_player_name));

 if (!empty($codoneprotected[$idnumb][$death_player_name]['enter_guid']))
	 $fakeguiddeath = $codoneprotected[$idnumb][$death_player_name]['enter_guid'];
 if (!empty($codoneprotected[$idkill][$killer_player_name]['enter_guid']))
	$fakeguidkiller = $codoneprotected[$idkill][$killer_player_name]['enter_guid'];

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////		
    $parseline = $num . ';' . $fakeguiddeath . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';' . $fakeguidkiller . ';' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
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

	 $game_patch = 'cod1_1.1';

        list($num, $player_name, $react) = explode(';', $parseline);

		$i_name = $player_name; 

$i_ip = '';
for ($i = 1;$i <= 3;$i++) {	
usleep(20000); 
$rconExplode = rconExplodeNicknameone($player_name);
        list($i_id, $i_ping, $i_ip, $i_name, $i_guid, $xxccode) = explode(';', $rconExplode);
if(!empty($i_ip))
	$i = 3;
}		

        $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $i_guid))))));
        if (empty($stats_array[$conisq]['ip_adress'])) {
            $stats_array[$conisq]['ip_adress'] = ''.$i_ip.'';
            if (empty($stats_array[$conisq]['city'])) $stats_array[$conisq]['city'] = $xxccode;
            if (empty($stats_array[$conisq]['ping'])) $stats_array[$conisq]['ping'] = $i_ping;
        }
		
if(!empty($i_ip)){	
	
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
			

if(trim($player_name) == ($i_name))
{
			
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
}		}		
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////				
////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		 
	if(empty($i_name))
		$i_name = $player_name;
		 
       $parseline = $num . ';' . $i_guid . ';' . $i_id . ';' . $i_name . ';' . $react;
	
	}
	else if (substr_count($parseline, ';') == 3) 
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

	
	$game_patch = 'cod1_1.1';
	
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
                    // $parseline = 'ChatCommand_say;' . $i_guid . ';' . $idnum . ';' . $nickr . ';' . $react;				
                       $parseline = $num . ';' . $i_guid . ';' . $idnum . ';' . $nickr . ';' . $react;
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

   
                   // echo "\n -----------------------------\n ";
                  //  var_dump($player_geoip_ctrl);
                   // echo "\n -----------------------------";
   
}
?>