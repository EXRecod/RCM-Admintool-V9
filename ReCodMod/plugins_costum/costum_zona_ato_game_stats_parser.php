<?php
//if(typeparser($parseline) == 'parser')
	
if (strpos($parseline, ' CP;') !== false)
         {
	  //CP;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $camp_guid, $idnm, $camp_player_name) = explode(';', $parseline);	
	  if(!empty($camp_guid)){
					$cshid = trim($server_port.$camp_guid);	
					$cshid = dbGuid(4).(abs(hexdec(crc32($cshid))));
	    $player_skill_bonus[$cshid]['camp'][] = $cshid; 
		$player_arrays[$cshid]['camp'][] = $cshid;
		echo "\n [camp] : ".$camp_guid."  ".$camp_player_name."";
	  }
		  }
	  else if (strpos($parseline, ' FC;') !== false)
         {
	  //FC;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $flag_guid, $idnm, $flag_player_name) = explode(';', $parseline);
	  if(!empty($flag_guid)){
					$fshid = trim($server_port.$flag_guid);	
					$fshid = dbGuid(4).(abs(hexdec(crc32($fshid))));
	    $player_skill_bonus[$fshid]['flags'][] = $fshid; 
		$player_arrays[$fshid]['flags'][] = $fshid;
		echo "\n [flag] : ".$flag_guid."  ".$flag_player_name."";
         }
		 }
	  else if (strpos($parseline, ' XC;') !== false)
         {
	  //FC;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $flags_guid, $idnm, $flags_player_name) = explode(';', $parseline);
	  if(!empty($flags_guid)){
					$fsshid = trim($server_port.$flags_guid);	
					$fsshid = dbGuid(4).(abs(hexdec(crc32($fsshid))));
	    $player_skill_bonus[$fsshid]['saveflags'][] = $fsshid; 
		$player_arrays[$fsshid]['saveflags'][] = $fsshid;
		echo "\n [saveflag] : ".$flags_guid."  ".$flags_player_name."";
         }
		 }	
	 
	 else if (strpos($parseline, ' BONUS;') !== false)
         {
	  //BONUS;2310346615720138741;34;TyK TyK.. kTo TaM?;#WHATisWHAT#
	  //logPrint("BONUS;" + player getGuid() + ";" + player getEntityNumber() + ";" + player.name + ";bomb_defused \n");
	  //logPrint("BONUS;" + player getGuid() + ";" + player getEntityNumber() + ";" + player.name + ";bomb_planted \n);
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";juggernaut_kill \n);
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";destroyed_helicopter \n);
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";rcxd_destroyed \n); МАШИНКА
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";turret_destroyed \n); ТУРЕЛЬ
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";sam_kill \n); ПВО
	  
      list($not, $bguid, $idnm, $bplayer_name, $bplayer_funct) = explode(';', $parseline);
	  if(!empty($bguid)){
					$fsshid = trim($server_port.$bguid);	
					$fsshid = dbGuid(4).(abs(hexdec(crc32($fsshid))));
			
	    $player_skill_bonus[$fsshid][''.$bplayer_funct.''][] = $fsshid; 
		$player_arrays[$fsshid][''.$bplayer_funct.''][] = $fsshid;
		echo "\n [$bplayer_funct] : ".$bguid."  ".$bplayer_name."";
         
}}
?>		 