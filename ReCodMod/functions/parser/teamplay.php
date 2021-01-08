<?php	
if (ActionIs('A',$parseline)) {
//logPrint("A;" + lpselfGuid + ";" + lpselfnum + ";" + game["attackers"] + ";" + other.name + ";" + "bomb_plant" + "\n");
//logPrint("A;" + lpselfGuid + ";" + lpselfnum + ";" + game["defenders"] + ";" + other.name + ";" + "bomb_defuse" + "\n");
if (substr_count($parseline, ';') == 4)	
{	
      list($not,  $idnm, $oz, $player_name, $bomb_status) = explode(';', $parseline);
	  $bomb_guid = fakeguid($player_name);
}	  
else	
      list($not, $bomb_guid, $idnm, $oz, $player_name, $bomb_status) = explode(';', $parseline);
	 
if ((strpos($parseline, ';bomb_defuse') !== false)||(strpos($parseline, ';bomb_plant') !== false)){ 
	  if(!empty($bomb_guid)){
					$cshid = trim($server_port.$bomb_guid);	
					$cshid = dbGuid(4).(abs(hexdec(crc32($cshid))));
					
		if (empty($stats_array[$cshid]['scores;'.$bomb_status])) 			
	    $stats_array[$cshid]['scores;'.$bomb_status] = 1;
         else	
		 {
		 $camps = $stats_array[$cshid]['scores;'.$bomb_status];	 
		 $stats_array[$cshid]['scores;'.$bomb_status] = $camps+1; 	 
		 }
        //debuglog("\n ".(__FILE__) . " : " .$parseline);		
		echo "\n [A] : ".$bomb_guid."  ".$player_name."";
	  }
    }
}
else if (ActionIs('W',$parseline)) {
	    //DM     - logPrint("W;;" + guid + ";" + name + "\n");
		//SD/TDM - logPrint("W;" + winningteam + winners + "\n");
	    //////////SERVER;MAP;GAMETYPE;winners;losers;TIME
		//logPrint("W;winningteam" + winners + "\n");
 		echo "\n [W] : ".$parseline;
}
else if (ActionIs('L',$parseline)) {
		//logPrint("L;losingteam" + losers + "\n");
		echo "\n [L] : ".$parseline; 
}
?>		 