<?php
            $db1x = $cpath . 'ReCodMod/databases/db1.sqlite';
          $db2x = $cpath . 'ReCodMod/databases/db2.sqlite';
 
 if(empty(SqlDataBase)){
              if (!file_exists($db1x)){echo "\n DO NOT FIND $db1x"; 
			  require $cpath . 'ReCodMod/functions/install/install.php';
			  sleep (5); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}		
	      if (!file_exists($db2x)){echo "\n DO NOT FIND $db2x"; sleep (5); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
              if (!file_exists($cpath . 'ReCodMod/databases/db3.sqlite')){echo "\n DO NOT FIND ReCodMod/databases/db3.sqlite"; sleep (200); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
              if (!file_exists($cpath . 'ReCodMod/databases/db4.sqlite')){echo "\n DO NOT FIND ReCodMod/databases/db4.sqlite"; sleep (200); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
	      if (!file_exists($cpath . 'ReCodMod/databases/db5.sqlite')){echo "\n DO NOT FIND ReCodMod/databases/db5.sqlite"; sleep (200); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}
 }
 

if(!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok'))
	require $cpath . 'ReCodMod/functions/install/install.php';
if(!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok'))
{
	trigger_error("\n RCM Информация: ALARM! DATABASE NOT INSTALED!!! STOPED MOD WORKING!", E_USER_ERROR);
	sleep(3);
}
 
 if(!file_exists(chatdb))
{
	echo "\n cfg/_settings.ini chatdb is false";
	sleep(20);
	exit;
}

if(file_exists($cpath . 'ReCodMod/databases/db1.sqlite') 
	    && file_exists($cpath . 'ReCodMod/databases/db2.sqlite')
        && file_exists($cpath . 'ReCodMod/databases/db3.sqlite')
        && file_exists($cpath . 'ReCodMod/databases/db4.sqlite')){
			
 $msql_test = 0;
try
 {
 
if(empty(SqlDataBase))  
$db4    = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
  else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db4 = $msqlconnect; 
	
   }  
  
  
  $queryv = $db4->query("SELECT COUNT(*) as count FROM x_db_players");
  $queryv->setFetchMode(PDO::FETCH_ASSOC);
  $rowx       = $queryv->fetch();
  $db_players = $rowx['count'];
  $queryv = null;
  $db4 = null;
  $rowx = null;
require $cpath . 'ReCodMod/functions/null_db_connection.php';  
 }
catch (PDOException $e)
 {
  echo 'FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage();
  $msql_test = 1;
 }
 
if(empty(SqlDataBase))  
$msql_test = 0; 


if($msql_test == 1)
{
	echo "\n\033[38;5;9m  cfg/_settings.ini  SqlDataBase = 1; ,ERROR CONNECT TO MSQL DATABASE \n";
	sleep(2);
	exit;
}
 
try
 {
  
  
  if(empty(SqlDataBase)){
  if (empty($bannlist))
    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
  else
    $db2 = new PDO('sqlite:' . $bannlist);
  }else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect; 
	
   }

  $qc = $db2->query("SELECT COUNT(*) as count FROM bans");
  $qc->setFetchMode(PDO::FETCH_ASSOC);
  $ryy     = $qc->fetch();
  $xtotal_bans = $ryy['count'];
require $cpath . 'ReCodMod/functions/null_db_connection.php'; 
 }
catch (PDOException $e)
 {
  echo 'FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage();
 }
if (empty($xtotal_bans))
  $xtotal_bans = '0';

if (strpos($server_ip,'.') !== false)
	{
    $pipip = explode(".",$server_ip);
	$svipport = abs(hexdec(crc32($pipip[2].$pipip[3]))).$server_port;  
    }
	else $svipport = abs(hexdec(crc32($server_ip)));
	
	 
if(!empty(multi_ip_servers))
{
if (strpos($server_ip,'.') !== false)
$svipport = $server_port;
}
 
try
 {
	  
if(empty(SqlDataBase))
   $db3    = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
      else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect; 
	
   }	 
	  
  //$result = $db3->query("SELECT * FROM db_stats_1 WHERE s_kills>=$limm ORDER BY ($etopx+0) DESC LIMIT 1");
  
  
  	  $result = $db3->query('SELECT t1.*, t2.* from db_stats_0 t1 join 
 (select * from db_stats_1) 
 t2 ON t1.s_pg = t2.s_pg where t1.s_port="'.$svipport.'"
 ORDER BY (t2.s_kills+0)  DESC LIMIT 1');  
  
  
  $number = 0;
  foreach ($result as $row)
   {
    $etop_player_name = $row['s_player'];
   }
require $cpath . 'ReCodMod/functions/null_db_connection.php';   
 }
catch (PDOException $e)
 {
  echo 'FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage();
 }
 
usleep(9000);
$daten = date('Y-m-d');
$datenz = date('Y-m-d');

 
		}
		 
 		
if (empty($db_players))
  $db_players = '0';
		if (empty($etop_player_name))
  $etop_player_name = '['.$rfnonply.']';
if (empty($xtotal_bans))
  $xtotal_bans = '0';	

?>	