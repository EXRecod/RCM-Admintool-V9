<?php
if (strpos($msgr,ixz.'status') !== false){ 
 if (empty($stats_array[$conisq]['user_status'])) $stats_array[$conisq]['user_status'] = 'guest';  
  if (!empty($stats_array[$conisq]['user_status'])){ 		

if (strpos($game_patch, 'cod1_1.1') !== false)	  
         rcon('say  ^6Status ^7=> ^1['.$stats_array[$conisq]['user_status'].'] ^3'.html_entity_decode($nickr), '');
     else
rcon('tell '.$idk.' ^6Status ^7=> ^1['.$stats_array[$conisq]['user_status'].'] ^3'.html_entity_decode($nickr), '');
}}    	
?>
