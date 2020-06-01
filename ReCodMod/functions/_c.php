<?php
 $startc        = microtime(true);
  $stimec       = time();
//////////////////////////////////////////////////
$z_rcm = "RCM[v.9]";
$xbld   = "";
$dtx   = "";

$etop = 'kills';


error_reporting(E_ALL);
ini_set("display_errors", 1);
/*
$dircache = $cpath."cache_ms/"; 
if(!is_dir($dircache))
{
	
require $cpath . 'windows_system_cfg.php';	
if (strpos($mplogfile, 'ftp:') === false)	
 $server_ip = getHostByName(getHostName());	
 
require $cpath . 'windows_system_cfg.php';
} 
*/  
$dir = $cpath."ReCodMod/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/databases/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_crontime/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_errors/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_logs/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_logs/archive/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_logs/archive/chat/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_cron/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_update/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_cache/"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;
$dir = $cpath."ReCodMod/cache/x_logs/backup"; 
if(!is_dir($dir)) mkdir($dir, 0777, true) ;

if(!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_time_kicker_'.$server_ip.'_'.$server_port))
touch($cpath.'ReCodMod/cache/x_cron/cron_time_kicker_'.$server_ip.'_'.$server_port);

if(!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_time_kicker_'.$server_ip.'_'.$server_port)){
	
	if(!file_exists($cpath . 'ReCodMod/cache/x_cron/'))
	   mkdir($cpath . 'ReCodMod/cache/x_cron/', 0777, true); 
	else
       die('ERROR - not installed '.$cpath . 'ReCodMod/cache/x_cron/');
	
}//else
	$crnnx = "ReCodMod/cache/x_cron/cron_time_kicker_".$server_ip."_".$server_port;

 $cron_timex=filemtime($cpath.$crnnx);        
if (time()-$cron_timex>=5600) {              
    file_put_contents($cpath.$crnnx,"");     
 
function isDomainAvailible($domain)
 {
  if (!filter_var($domain, FILTER_VALIDATE_URL))
   {
    return false;
   }
  $curlInit = curl_init($domain);
  curl_setopt($curlInit, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curlInit, CURLOPT_HEADER, true);
  curl_setopt($curlInit, CURLOPT_NOBODY, true);
  curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($curlInit);
  curl_close($curlInit);
  if ($response)
    return true;
  return false;
 }


if (isDomainAvailible('http://xxxreal.ru/'))
 {
  //////////////////////////////============================	
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://xxxreal.ru/rcm.php');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $zxxm = curl_exec($ch);
  if (!empty($zxxm))
   {
    if ($z_rcm == $zxxm)
     {
      $z_rcm = $zxxm;
     }
    else
     {
      $dtx   = date('Y.m.d');
      $z_rcm = 'New ADMINTOOL updates available RCM';
      $spps  = 1555555;
     }
   }
 }
else
 {
  echo "Error 404. RCM Msterserver is offline or you closed tcp and udp ports!";
 }
echo " \n\n curl time >  " . substr($tfinishh = (microtime(true) - $startc), 0, 7);

}


$z_set       = "Admintool ".$z_rcm . $xbld;
$z_ver       = " " . $z_rcm . $xbld. " " . $dtx . "";
$mapfix      = 'dm'; // zom - IF ZOMBIES MOD , dm - if simple mod
$v_time_gtx  = 100;
$v_time_map  = 100;
$v_time_ban  = 100;
$v_time_kick = 100;
$mistake     = '\/+[a-z]'; //regedit search for mistakes
 
/*   Groups 
Admins - 0
Moderators - md
Clan members - 1
Vip - 2
Members - 3 (Gamers on website)
Pro player - 4
Special guests - 5
Top player - 6
Noob - 7
Worst - 8
*/
$web_con     = '1';
 
require_once $cpath.'ReCodMod/functions/getinfo/COD4xServerStatus.php';
 
//global $server_ip, $server_port, $server_rconpass, $mplogfile;
//require $cpath.'cfg/_connection.php';

 
require $cpath . 'cfg/_settings.php';
require $cpath . 'cfg/messages.cfg.php';


if(empty($etop))
$etopx = 's_ratio';
	
if($etop == 'kills')
	$etopx = 's_kills';
else if($etop == 'deaths')
	$etopx = 's_deaths';
else if($etop == 'suicides')
	$etopx = 's_suicids';
else if($etop == 'bash')
	$etopx = 's_melle';
else if($etop == 'knife')
	$etopx = 's_melle';
else if($etop == 'grenades')
	$etopx = 's_grenade';
else if($etop == 'skill')
	$etopx = 's_skill';
else if($etop == 'ratio')
	$etopx = 's_ratio';
else
    $etopx = 's_ratio';


if(empty($language))
$language = 'en';

if ($language == 'en')
require $cpath . 'cfg/languages/en.lng.php';
else if ($language == 'ru')
require $cpath . 'cfg/languages/ru.lng.php';
else if ($language == 'de')
require $cpath . 'cfg/languages/de.lng.php';
else if ($language == 'pl')
require $cpath . 'cfg/languages/pl.lng.php';
else if ($language == 'it')
require $cpath . 'cfg/languages/it.lng.php';
else if ($language == 'br')
require $cpath . 'cfg/languages/br.lng.php';
else if ($language == 'fr')
require $cpath . 'cfg/languages/fr.lng.php';
else if ($language == 'nl')
require $cpath . 'cfg/languages/nl.lng.php';
else
require $cpath . 'cfg/languages/en.lng.php';


$acceptplugin = 100;
if(empty($msgr))
	$msgr = 'none';

   if (strpos($server_info_messages, ';') !== false)
      {
if((strpos($server_info_messages, '/') !== false)&&(strpos($server_info_messages, $server_port) !== false))
{
	
		  
        $cntnbm     = substr_count($server_info_messages, ';');
        $countnumbs = $cntnbm + 1;
        $xmde       = 0;
        $x          = 0;
        while ($x++ < $countnumbs)
          {
                $server_name[$xmde] = 'n/a';
                $server_mapname[$xmde] = 'n/a';
                $server_gametype[$xmde] = 'n/a';
                $servermapsinf[$xmde] = 'n/a';
                $server_max_players[$xmde]  = 'n/a';
                $server_cur_players[$xmde] = '0';
                 $server_ipp[$xmde] = '0';
                $playerzcc = '0';	
      ++$xmde;
	  }
	  }	
	  }	
			
//********************************************************
/// Register from website sync. // if login from website use 1, no from website login = 0 - this line supporting only with special RCM web plugins
$registerx      = '0';
//********************************************************
//***********************************************\ dont change it after \***********************************************
//======================================================================= Alba supported only
$game_ac        = '0'; /// With anticheat alba (1 - yes, 0 - without)
$game_ac_status = '0'; /// Kick without alba and good skill (1 - yes, 0 - without)
$game_ptch      = '---'; /// /1.2/ codx - on   another off if us codam
$game_mod       = 'NONE'; /// for /codam/ mods awe 1.2 only
//======================================================================= Alba supported only
$sleep_rcon     = 529000; ///Rcon get pause time   
$codecon        = 'http://xxxreal.ru/RECODMOD_CONNECTOR.txt';
//***********************************************\ dont change it before\***********************************************
if(file_exists($cpath . 'ReCodMod/databases/db1.sqlite') 
	    && file_exists($cpath . 'ReCodMod/databases/db2.sqlite')
        && file_exists($cpath . 'ReCodMod/databases/db3.sqlite')
        && file_exists($cpath . 'ReCodMod/databases/db4.sqlite')){
			
 $msql_test = 0;
try
 {
 
if(empty($Msql_support))  
$db4    = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
  else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass, $opt); $db4 = $msqlconnect; 
	
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
 
if(empty($Msql_support))  
$msql_test = 0; 


if($msql_test == 1)
{
	echo "\n\033[38;5;9m  cfg/_settings.php  Msql_support = 1; ,ERROR CONNECT TO MSQL DATABASE \n";
	sleep(2);
	exit;
}
 
try
 {
  
  
  if(empty($Msql_support)){
  if (empty($bannlist))
    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
  else
    $db2 = new PDO('sqlite:' . $bannlist);
  }else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass, $opt); $db2 = $msqlconnect; 
	
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
	
	 
if(!empty($odin_ip_u_vseh_serverov))
{
if (strpos($server_ip,'.') !== false)
$svipport = $server_port;
}
 
try
 {
	  
if(empty($Msql_support))
   $db3    = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
      else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass, $opt); $db3 = $msqlconnect; 
	
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
if (empty($playernamee[0]))
  $playernamee[0] = '['.$rfnonee.']';
if (empty($playernamee[1]))
  $playernamee[1] = '['.$rfnonee.']';
if (empty($playernamee[2]))
  $playernamee[2] = '['.$rfnonee.']';
if (empty($playernamee[3]))
  $playernamee[3] = '['.$rfnonee.']';
if (empty($playernamee[4]))
  $playernamee[4] = '['.$rfnonee.']';
 
if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_servername_'.$server_ip.'_'.$server_port.'.log'))
 {
  $f          = fopen($cpath . "ReCodMod/cache/x_logs/g_servername_".$server_ip."_".$server_port.".log", "r");
  $servername = fgets($f, 1024);
  $servername = trim($servername);
 }
 
require $cpath . 'cfg/messages.cfg.php';
 
 ///HERE YOUR ALL MAPS
$maplist = array("mp_harbor", "mp_carentan", "mp_pavlov", "mp_logging_mill", "mp_eisberg", 
"mp_railyard", "xp_standoff", "mp_rocket", "mp_stalingrad", "mp_depot", "mp_powcamp", "mp_dawnville", "mp_brecourt", "mp_chateau", "mp_ship");


///////////////////////////////////////////////////////MAPS
function mpt($string) {
$string = str_replace("harbor", "mp_harbor", $string);
$string = str_replace("carentan", "mp_carentan", $string);
$string = str_replace("lg", "mp_logging_mill", $string);
$string = str_replace("lm", "mp_logging_mill", $string);
$string = str_replace("pavlov", "mp_pavlov", $string);
$string = str_replace("abbey", "^5abbey", $string);
$string = str_replace("eisberg", "mp_eisberg", $string);
$string = str_replace("wawa", "wawa_3dAim", $string);
$string = str_replace("railyard", "mp_railyard", $string);
$string = str_replace("standoff", "xp_standoff", $string);
$string = str_replace("rocket", "mp_rocket", $string);
$string = str_replace("brecourt", "mp_brecourt", $string);
$string = str_replace("chateau", "mp_chateau", $string);
$string = str_replace("hurtgen", "mp_hurtgen", $string);
$string = str_replace("stalingrad", "mp_stalingrad", $string);
$string = str_replace("depot", "mp_depot", $string);
$string = str_replace("powcamp", "mp_powcamp", $string);
$string = str_replace("dawnville", "mp_dawnville", $string);
$string = str_replace("ship", "mp_ship", $string);
$string = str_replace("valley", "x_valley", $string);
$string = str_replace("burgundy", "mp_burgundy", $string);
$string = str_replace("westwall", "mp_westwall", $string);
return $string;
}
///////////////////////////////////////////////////////Gametypes
function gtt($string) {
$string = str_replace("actf", "actf", $string);
$string = str_replace("tdm", "tdm", $string);
$string = str_replace("htf", "htf", $string);
$string = str_replace("old", "^9old^5sdy", $string);
$string = str_replace("sd", "sd", $string);
$string = str_replace("sd", "^5sd", $string);
$string = str_replace("pam", "^5pam", $string);
$string = str_replace("pam", "pam", $string);
$string = str_replace("dem", "dem", $string);
$string = str_replace("rsd", "rsd", $string);
$string = str_replace("bash", "bash", $string);
$string = str_replace("osd", "^9old^5sd", $string);
$string = str_replace("gg", "gg", $string);
return $string;
}
 
 
if (empty($kicknotingrp))
  $kicknotingrp = 1; 
if (empty($game_patch))
 {
  
  function ghbfffm($string)
   {
    $string = str_replace(array(
      "/^7"
    ), '', $string);
    $string = str_replace(array(
      "^7"
    ), '', $string);
    return $string . "";
   }
  
  if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_gamename_'.$server_ip.'_'.$server_port.'.log'))
   {
    $fyf = file($cpath . 'ReCodMod/cache/x_logs/g_gamename_'.$server_ip.'_'.$server_port.'.log');
    foreach ($fyf as $ryhfd)
     {
      $mpgamenname = ghbfffm($ryhfd);
      if (file_exists($cpath . 'ReCodMod/cache/x_logs/g_shortversion_'.$server_ip.'_'.$server_port.'.log'))
       {
        $fyfx = file($cpath . 'ReCodMod/cache/x_logs/g_shortversion_'.$server_ip.'_'.$server_port.'.log');
        foreach ($fyfx as $ryhfdv)
         {
          $mpshortver = ghbfffm($ryhfdv);
          if (strpos($mpgamenname, '5') !== false)
           {
            $game_patch = 'cod5';
           }
          else if (strpos($mpgamenname, 'Call of Duty 4') !== false)
           {
            $game_patch = 'cod4';
           }
          else if (strpos($mpgamenname, 'Call of Duty 2') !== false)
           {
            $game_patch = 'cod2';
           }
          else if (strpos($mpgamenname, 'Call of Duty') !== false)
           {
            $game_patch = 'cod1_' . $mpshortver . '';
           }
          else if (strpos($mpgamenname, 'main') !== false)
           {
            $game_patch = 'cod1_' . $mpshortver . '';
           }		   
          else
           {
            //$game_patch = 'cod1_1.41';
			$game_patch = 'cod4';
           }
         }
       }
     }
	 if(!empty($game_patch))
	$game_patch = trim($game_patch);   
   }
 }
 if(empty($Msql_support)){
if(!empty($db)){
$db = NULL;
echo ' db null ';}
if(!empty($db1)){
$db1 = NULL;
echo ' db1 null ';}
if(!empty($db2)){
$db2 = null;
echo ' db2 null ';}
if(!empty($db3)){
$db3 = NULL;
echo ' db3 null ';}
if(!empty($db4)){
$db4 = NULL;
echo ' db4 null ';}
if(!empty($db5)){
$db5 = NULL;
 echo ' db5 null ';}}
if(!empty($connect)){
if(is_resource($connect)){
fclose($connect);
echo ' rcon null ';}}

//echo '  ====>>>>>>>  ' . substr($tfinishh = (microtime(true) - $startc), 0, 7);
	

?>
