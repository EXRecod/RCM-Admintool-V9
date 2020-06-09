<?php
if (strpos($msgr, ''.ixz.'delete ') !== false)
    { 
  
		  
try
  {
if(empty(SqlDataBase))
 
                    $db = new PDO('sqlite:' . $adminlists);
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect;
	
   }
 
 

 list($cmv, $numm) = explode(' ', $msgr); 
 


















if (is_numeric ($numm))	
{
	$db3  = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
	$db3->query("DELETE FROM db_stats_2 WHERE w_place='$numm' LIMIT 1");
	rcon('say ^6[^1RCM^3bot^6] ^7'.$ttdbdeleted.' - '.$numm.' '.$tttdbdltd.'', '');
}













else if (trim($numm) == 'alladmins')
{
	$db->query("DELETE FROM x_db_admins");
	rcon('tell '.$i_id.' ^6[^1RCM^3bot^6] ^7'.$admdbdeleted, '');
}	








else if (trim($numm) == 'allstats')
{
	
 if(empty(SqlDataBase))
{	
	
	$db3  = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass); $dbm3 = $msqlconnect;
 
   }	
	
	
	$db3->query("DELETE FROM db_stats_0");
	$db3->query("DELETE FROM db_stats_1");
	$db3->query("DELETE FROM db_stats_2");
	$db3->query("DELETE FROM db_stats_3");
	$db3->query("DELETE FROM db_stats_4");
	$db3->query("DELETE FROM db_stats_5");
	$db3->query("DELETE FROM db_stats_hits");
	rcon('tell '.$i_id.' ^6[^1RCM^3bot^6] ^7'.$topdbdeleted, '');

	
	}






else if (trim($numm) == 'allbans')
{
	$db2  = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
	$db2->query("DELETE FROM bans");
	rcon('tell '.$i_id.' ^6[^1RCM^3bot^6] ^7'.$bandbdeleted, '');
}
else
	rcon('tell '.$i_id.' ^6[^1RCM^3bot^6] ^7'.$bandbnoob, '');
 	
	++$x_number;	
	AddToLogInfo("[".$datetime."] DELETE database: (" . $x_nickx . ") (" . $i_ip . ") (" . $msgr . ")"); 
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
                    					
	
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }		
	}	
	

	
?>