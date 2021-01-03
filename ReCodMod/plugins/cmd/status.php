<?php
if (strpos($msgr,ixz.'status') !== false){ 
 if (empty($stats_array[$conisq]['user_status'])) $stats_array[$conisq]['user_status'] = 'guest';  
  if (!empty($stats_array[$conisq]['user_status'])){

if(!empty($stats_array[$conisq]['user_status'])){
if($stats_array[$conisq]['user_status'] != 'admin')
{	
	if(!empty($stats_array[$conisq]['ip_adress'])){	
				$sql   = "SELECT s_guid,s_group,s_adm FROM `x_db_admins` WHERE s_guid='$guidn' limit 1";	
                $statt = dbInsert('', $sql);
		  if (!empty($statt)) { 
      foreach ($statt as $row) {
if(trim($row['s_group'])=='0')
{
if($stats_array[$conisq]['ip_adress'] == ''.$row['s_adm'].'')
{	
   $stats_array[$conisq]['user_status'] = 'admin';
}}}}}}}
	  

if (strpos($game_patch, 'cod1_1.1') !== false)	  
         rcon('say  ^6Status ^7=> ^1['.$stats_array[$conisq]['user_status'].'] ^3'.html_entity_decode($nickr), '');
     else
rcon('tell '.$idnum.' ^6Status ^7=> ^1['.$stats_array[$conisq]['user_status'].'] ^3'.html_entity_decode($nickr), '');
}}    	
?>
