<?php
if ((strpos($msgr, ixz.'register') !== false)||(strpos($msgr, ixz.'reg') !== false)){ 	

 if ((empty($stats_array[$conisq]['user_status']))|| $stats_array[$conisq]['user_status'] == 'guest'){ 
 $stats_array[$conisq]['user_status'] = 'registered';

 if (strpos($stats_array[$conisq]['user_status'], 'registered') !== false)	
    config_ini_set("_groups_database", 'registered','all_'.$guidn,$guidn);
  
usleep($sleep_rcon*2);
      try {
      if (empty(SqlDataBase)) 
       $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
      else {
       $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
       if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass);
       $db = $msqlconnect;
	  }   
     $statt = 0;
       $result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='" . $guidn . "' LIMIT 1");
       foreach ($result as $row) {
        $adm_ip = $row['s_adm'];
        $a_grp = $row['s_group']; 
		$statt = 1; 
       } 
       if ($statt > 0)
	   {
		   if ($game_patch != 'cod1_1.1')
        rcon('tell ' . $idnum . ' ^6Status => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickr) , '');
	else
		rcon('say ^6Status => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickr) , '');
		$db->query("UPDATE x_db_admins SET s_group='".userStatus($stats_array[$conisq]['user_status'])."' WHERE s_guid='" . $guidn . "'");   
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
    rcon('tell '.$i_id.' ^3'.$loggistopk. ' => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickr) , '');
else
	rcon('say ^3'.$loggistopk. ' => ^1['.$stats_array[$conisq]['user_status'].']', '');	   
	 	 
         $date = date('Y-m-d H:i:s'); 
         if ($db->query("INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid) VALUES ('" . $stats_array[$conisq]['ip_adress'] . "', '" . $date . "', '".(int)(userStatus($stats_array[$conisq]['user_status']))."', '" . $guidn . "')") > 0) {
          echo "Created IN DATABASE." . "\n";
 
        } 
	 }   
      require $cpath . 'ReCodMod/functions/null_db_connection.php';
     }
     catch(PDOException $e) {
      errorspdo('[' . $datetime . '] 2752  ' . __FILE__ . '  Exception : ' . $e->getMessage());
 }}}	
 
 
?>