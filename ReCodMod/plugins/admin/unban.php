<?php 
if (preg_match("/^".$ixz."unban /i", $msgr)) {	
////////////////////////////////////////////////////////////////////NEW DOWN AT THE LIST   
 
 list($x_cmd, $x_nickid) = explode(' ', $msgr); // !unban nick
 echo $x_cmd.'  '.$x_nickid;
 	
	
	
try
  {
if(empty($Msql_support))
{  
                $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
				$db0 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db0.sqlite');
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db2 = $msqlconnect;
	$db = $db2; 
   } 
++$knownplayr;
if (is_numeric ($x_nickid))		  
$result = $db2->query("SELECT * FROM bans WHERE id = '$x_nickid' limit 1");
else  
$result = $db2->query("SELECT * FROM bans WHERE playername='$x_nickid' limit 1");
$stat = $result->fetchColumn();
     
	if ($stat == 0) {

rcon('say  Only ^3Super Admin ^7can unban player from  another version!', '');
++$x_number;
++$x_return;
//AddToLog1("[".$datetime."]<font color='green'> Server :</font> Only Super Admin can unban player from another version!");
echo ' unban   '.$tfinishh = (microtime(true) - $start);	
	}

	if ($stat > 0) {
		  
$result = $db2->query("SELECT * FROM bans WHERE id = '$x_nickid' limit 1");
$db4 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db4.sqlite');
foreach($result as $row)
    {
		$id = 	$row['id'];
		$playername = 	$row['playername'];
		$ip = 			$row['ip'];
		$reason  = 		$row['reason'];
		$time = 		$row['time'];
		if ($guidn != '0')
		$tguidd = 		$row['guid'];
		$whooo = 		$row['whooo'];
		
$db4->exec("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");

if (is_numeric ($x_nickid))			
$db2->query("DELETE FROM bans WHERE id='$x_nickid'");
else 
$db2->query("DELETE FROM bans WHERE playername='$x_nickid'");
$db2->exec("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','$tguidd','$reason','$time','$whooo','$game_patch','$nickr')");
	    if ($guidn != '0'){
		  
		xcon('unban '.substr($tguidd, -8), '');
		  
		xcon('unban '.$tguidd, '');
		                  }				  
		
		rcon('say  ^7' . $playername. ' '.$c_unban.' ^7'.$infooreas.': ^1'.$reason.'', '');
		AddToLog("[".$datetime."] UNBAN => IP: " . $ip . " GUID: " . $tguidd . " (" . $playername . ")  reason: UnBan by ".$i_name." ");	
//AddToLog1("[".$datetime."]<font color='green'> Server :</font> ". $playername."  ".$c_unban."  Reason: ".$reason. " ");	
		++$x_number;
		echo ' unban   '.$tfinishh = (microtime(true) - $start);
	}
	} 
	 ++$x_number;
++$x_return;	

//}
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	 
  }	
?> 