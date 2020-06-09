<?php

if ($x_stop_lp == 0) {
/////SUPPORT ONLY WITH PB OR COD4X LIBRARY CLIENT!
if (strpos($msgr, ixz.'getss ') !== false)
    { 

 
 try
  {
 
if(empty(SqlDataBase))
 $db0 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db0.sqlite');
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    $db0 = new PDO($dsn, db_user, db_pass, $opt);
   }
	$date = date('Y-m-d H:i:s');

 list($cmv, $numm) = explode(' ', $msgr); 	
xcon('getss '. $numm .'', '');

xcon('tell '. $idnum .' ^6[^1RCM^3bot^6] ^7'.$getssj, '');
	++$x_number;

             $sql    = "select * FROM getss where e_guid='$guidn' or e_ip = '$i_ip' limit 1";
                      $stat   = $db0->query($sql)->fetchColumn();
                      if (empty($stat))
                       {	

$db0->exec("INSERT INTO getss (e_admin,e_guid,e_nick,e_ip,e_uid,e_geo,e_counts,e_time)  
 VALUES ('".$x_nickx."','".$guidn."','".$i_name."','".$i_ip."','".$shidx3."','','1','".$date."')");
					   }
	                  else{
		
	$db0->exec("UPDATE getss SET e_counts=e_counts +1 where e_guid='$guidn'");
	
	                       }
	
	
	AddToLogInfo("[".$datetime."] screenshot: (" . $x_nickx . ") (" . $msgr . ")"); 

++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	                					
	}







	
else if (strpos($msgr, ixz.'getss') !== false)
    { 
 
 
 
 if ($game_patch == 'cod4'){
usleep($sleep_rcon*2);	
xcon('getss all', '');	
 }
 else{
	 		 	
 
usleep($sleep_rcon*3);	
xcon('getss '. $i_id .'', ''); 	 
	 
 }
AddToLogInfo("[".$datetime."] screenshot all: (" . $x_nickx . ") (" . $msgr . ")"); 	

xcon('tell '. $idnum .' ^6[^1RCM^3bot^6] ^7'.$getssx, '');	
	
	
++$x_number;	
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
                    					
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
else if (strpos($msgr, ixz.'lastgetss') !== false)
    { 

 
try
  {
if(empty(SqlDataBase))
      $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
 
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass); $db = $msqlconnect;
	//$db = $db2; 
   }

$db0 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db0.sqlite');
 
	
 $sql    = "select * FROM getss where e_guid='$guidn' or e_ip = '$i_ip' limit 1";
 $resultx = $db0->query("SELECT * FROM getss where e_guid='$guidn' or e_ip = '$i_ip' limit 1");
                   	
 

  $stat   = $db0->query($sql)->fetchColumn();
                      if (empty($stat))
                       {	
	
xcon('tell '. $idnum .' ^60', '');
					   }
	                  else{
		
 foreach($resultx as $row)
    { 	
    $a_guid = $row['e_guid'];
    $a_uid  = $row['e_uid'];	
 $a_nick  = $row['e_nick'];
 $a_ip  = $row['e_ip'];
 $a_counts  = $row['e_counts'];
  

 if ($game_patch == 'cod4'){
		
AddToLogInfo("[".$datetime."] Last Screenshot: (" . $x_nickx . ") (" . $msgr . ")"); 	

xcon('tell '. $idnum .' ^6[] ^7'.$a_guid. ' / '.$a_uid.' / '.$a_nick.' / '.$a_ip.' / '.$a_counts, '');
++$x_number;	
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
                    					
	}

 
	}
	
	                       }
	 
	 
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }		
	
}
	
 
	}		
	
	
	
	 	
?>

