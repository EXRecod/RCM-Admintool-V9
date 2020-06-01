<?php

$datetime = date('Y.m.d H:i:s');	

try
  {
if(empty($Msql_support))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
	//open the FAKEPLAYERS KICK database
    $db5 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db5.sqlite');
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    $db2 = new PDO($dsn, $db_user, $db_pass, $opt);
	$db = $db2;
    $db5 = $db2;	
   }

/*
	if ((!empty($i_id)) && (!empty($i_name)) && (!empty($i_ip)))
	{
    
	if ($fakerz == 0){		
$db5->exec("DROP TABLE playerlist");
echo 'drop playerlist'; 
$db5->exec("CREATE TABLE playerlist (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, idnum varchar(10), name varchar(250), ip int(40), ping varchar(100))"); 
++$fakerz;}
     $db5->exec("INSERT INTO playerlist ( idnum, name, ip, ping ) VALUES ($i_id, $i_name, $i_ip, $i_ping);");	
		
$sql = "SELECT * FROM playerlist WHERE ip='$i_ip'";
 $stat = $db5->query($sql)->fetchColumn();
if($stat > 2)
{
	
$result = $db5->query("select ip, count(*) from playerlist group by ip having count(*) > 1");
    foreach($result as $row)
    {	
    echo " \n ALARM! Fake players DOS Detected ".$row['id']." - ".$row['ip']." - ".$row['idnum']." \n "; 
    
	  
      rcon('clientkick '.$row['idnum'],'');
	

		
	  $db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('FakeConnect','".$row['ip']."','','FakeClient','$datetime','RCM','$game_patch')");	 
	  
    }		
}
	}
*/

$sql = "SELECT * FROM x_db_admins WHERE s_group='$i_ip' and s_group='0' or s_group=111 LIMIT 1";
 $stat = $db->query($sql)->fetchColumn();
if($stat > 0)
{
 
 }else{

    $result = $db2->query("SELECT * FROM bans WHERE ip='$i_ip'  LIMIT 1");
    foreach($result as $row)
    {		
		$ipuuu = $row['ip'];
		$playername1 = $row['playername'];
		$reason  = 	$row['reason'];		
      if ($x_number != 1)
		{
				

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' BAN!', '');
else
        rcon('clientkick '. $i_id, '');

 
 rcon('kick '. $playername1, '');
usleep($sleep_rcon*3);
rcon('say ' . $playername1 . ' '.$ban_ip_all.' ^7'.$infooreas.':^1 '.$reason.'', '');
		  
AddToLog("[".$datetime."] BANNED IP KICK: (" . $i_ip . ") (" . $i_name . ")");					
		++$x_number; 
		//exit;
		//echo ' bans   '.$tfinishh = (microtime(true) - $start);
		}	
	}			

//////////////////////////////============================	 IP RANGE
/*

$dat = '.';
		$x_addr = explode(".", $i_ip);  
$check_i_ranges = sqlite_query($db2, "SELECT * FROM x_ranges WHERE ip_ranges='$x_addr[0].$dat.$x_addr[1]'");  
 	while ($row = sqlite_fetch_array($check_i_ranges))
	{
		$ip_r = $row['ip_ranges'];
		//rcon('kick '. $i_name, '');	
		  
if ($game_ac == '0'){ rcon('clientkick '. $i_id, '');}
else { rcon('akick '. $i_id.' " ^6[^7BANNED^6]"', ''); }	
        AddToLog("[".$datetime."] I.R. KICK: (" . $i_ip . ") (" . $i_name . ")");		
		//echo ' x-rangeee   '.$tfinishh = (microtime(true) - $start);	
	}	
*/	
//////////////////////////////============================	
//	echo '    ooo    ';  

  $result = $db2->query("SELECT * FROM bans");
    foreach($result as $row)
    {
		$playername = $row['playername'];
		$reason  = 	$row['reason'];
	
	      $plnm = trim($playername);
          $i_nn = trim($i_name);
		  
	 if (($plnm == $i_nn) && ($i_name != ''))
	 //if ((strpos($plnm, $i_nn) !== false) && ($i_name != '')) 
	 
		{	
  if ($x_number != 1)
	{		
	//rcon('tell '. $i_id . ' ' . $i_name . ' "'.$ban_name.'"', '');
		  

if ($game_ac == '0'){ 

//
if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' BAN!', '');
else
        rcon('clientkick '. $i_id, '');

}
else { 
		///rcon('say  ^7' . $i_name . ' '.$ban_name_all.' "^7Reason:^1" "'.$reason.'"', '');
		  
rcon('akick '. $i_id.' " ^6[^7BANNED^6]"', ''); rcon('clientkick '. $i_id, '');}
AddToLog("[".$datetime."] BANNED NICK KICK: (" . $i_ip . ") (" . $i_name . ")");			
		++$x_number;
		}
	} 
}



}



if ($registerx == '1' ) {

 
require $cpath.'ReCodMod/plugins/syncronization_site.php';
 
                     }
	require $cpath . 'ReCodMod/functions/null_db_connection.php';			 
					 
	  }
  
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }     
				 
?>
 
