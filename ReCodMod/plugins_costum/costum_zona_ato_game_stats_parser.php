<?php
//if(typeparser($parseline) == 'parser')
	
if (strpos($parseline, ' CP;') !== false)
         {
	  //CP;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $camp_guid, $idnm, $camp_player_name) = explode(';', $parseline);	
	  if(!empty($camp_guid)){
					$cshid = trim($server_port.$camp_guid);	
					$cshid = dbGuid(4).(abs(hexdec(crc32($cshid))));
					
		if (empty($stats_array[$cshid]['scores;camps'])) 			
	    $stats_array[$cshid]['scores;camps'] = 1;
         else	
		 {
		 $camps = $stats_array[$cshid]['scores;camps'];	 
		 $stats_array[$cshid]['scores;camps'] = $camps+1; 	 
		 }
     //debuglog("\n ".(__FILE__) . " : " .$parseline);
				
		echo "\n [camp] : ".$camp_guid."  ".$camp_player_name."";
	  }
		  slowscript(__FILE__);}
	  else if (strpos($parseline, ' FC;') !== false)
         {
	  //FC;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $flag_guid, $idnm, $flag_player_name) = explode(';', $parseline);
	  if(!empty($flag_guid)){
					$fshid = trim($server_port.$flag_guid);	
					$fshid = dbGuid(4).(abs(hexdec(crc32($fshid))));
		if (empty($stats_array[$fshid]['scores;flags'])) 			
	    $stats_array[$fshid]['scores;flags'] = 1;
         else	
		 {
		 $flags = $stats_array[$fshid]['scores;flags'];	 
		 $stats_array[$fshid]['scores;flags'] = $flags+1; 	 
		 }
		echo "\n [flag] : ".$flag_guid."  ".$flag_player_name."";
		     //debuglog("\n ".(__FILE__) . " : " .$parseline);
         }
		slowscript(__FILE__); }
	  
	  else if (strpos($parseline, ' XC;') !== false)
         {
	  //FC;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $flags_guid, $idnm, $flags_player_name) = explode(';', $parseline);
	  if(!empty($flags_guid)){
					$fsshid = trim($server_port.$flags_guid);	
					$fsshid = dbGuid(4).(abs(hexdec(crc32($fsshid))));
		if (empty($stats_array[$fsshid]['scores;saveflags'])) 			
	    $stats_array[$fsshid]['scores;saveflags'] = 1;
         else	
		 {
		 $saveflags = $stats_array[$fsshid]['scores;saveflags'];	 
		 $stats_array[$fsshid]['scores;saveflags'] = $saveflags+1; 	 
		 }
		echo "\n [saveflag] : ".$flags_guid."  ".$flags_player_name."";
		    // debuglog("\n ".(__FILE__) . " : " .$parseline);
         }
		slowscript(__FILE__); 
		}

	  else if (strpos($parseline, ' NK;') !== false)
         {
	  //NK;2310346615720138741;34;TyK TyK.. kTo TaM?			 
      list($not, $flags_guid, $idnm, $flags_player_name) = explode(';', $parseline);
	  if(!empty($flags_guid)){
					$fsshid = trim($server_port.$flags_guid);	
					$fsshid = dbGuid(4).(abs(hexdec(crc32($fsshid))));
		if (empty($stats_array[$fsshid]['scores;nukebomb'])) 			
	    $stats_array[$fsshid]['scores;nukebomb'] = 1;
         else	
		 {
		 $saveflags = $stats_array[$fsshid]['scores;nukebomb'];	 
		 $stats_array[$fsshid]['scores;nukebomb'] = $saveflags+1; 	 
		 }
		echo "\n [nukebomb] : ".$flags_guid."  ".$flags_player_name."";
		    // debuglog("\n ".(__FILE__) . " : " .$parseline);
         }
		slowscript(__FILE__); 
		}		
	 
	 else if (strpos($parseline, ' BONUS;') !== false)
         {
	  //BONUS;2310346615720138741;34;TyK TyK.. kTo TaM?;#WHATisWHAT#
	  //logPrint("BONUS;" + player getGuid() + ";" + player getEntityNumber() + ";" + player.name + ";bomb_defused \n");
	  //logPrint("BONUS;" + player getGuid() + ";" + player getEntityNumber() + ";" + player.name + ";bomb_planted \n);
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";juggernaut_kill \n);
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";destroyed_helicopter \n);
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";rcxd_destroyed \n); //МАШИНКА
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";turret_destroyed \n); //ТУРЕЛЬ
	  //logPrint("BONUS;" + attacker getGuid() + ";" + attacker getEntityNumber() + ";" + attacker.name + ";sam_kill \n); //ПВО
	  
      list($not, $bguid, $idnm, $bplayer_name, $bplayer_funct) = explode(';', $parseline);
	  if(!empty($bguid)){
					$fsshid = trim($server_port.$bguid);	
					$fsshid = dbGuid(4).(abs(hexdec(crc32($fsshid))));
			
		if (empty($stats_array[$fsshid]['scores;'.$bplayer_funct.''])) 			
	    $stats_array[$fsshid]['scores;'.$bplayer_funct.''] = 1;
         else	
		 {
		 $bonus = $stats_array[$fsshid]['scores;'.$bplayer_funct.''];	 
		 $stats_array[$fsshid]['scores;'.$bplayer_funct.''] = $bonus+1; 	 
		 }
		echo "\n [$bplayer_funct] : ".$bguid."  ".$bplayer_name."";
//debuglog("\n ".(__FILE__) . " : " .$parseline);
         
}slowscript(__FILE__);}
?>		 