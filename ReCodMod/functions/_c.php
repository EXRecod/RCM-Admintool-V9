<?php
  $mpgamenname = '';
  $startc        = microtime(true);
  $stimec       = time();
//////////////////////////////////////////////////
$z_rcm = "RCM[v.9.3.9]";
$charset_db   = 'utf8';

error_reporting(E_ALL);
ini_set("display_errors", 1);
 
   
require $cpath . 'ReCodMod/functions/install/folders.php';

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
 

}
 
$z_set       = "Admintool ".$z_rcm;
$z_ver       = " " . $z_rcm;
  
 
require_once $cpath.'ReCodMod/functions/getinfo/COD4xServerStatus.php';
 
//global $server_ip, $server_port, $server_rconpass, $mplogfile;
//require $cpath.'cfg/_connection.php';

//.main cfg _settings.ini LOADER
 $config_data = parse_ini_file($cpath . "cfg/_settings.ini", true);
 foreach($config_data as $section => $r)   
 {   foreach($r as $string => $value){
		if(!defined($string))
		define($string, $value);    	
 }}
//.chat_banner_messages_rotation.ini LOADER
$config_data = parse_ini_file($cpath . "cfg/chat_banner_messages_rotation.ini", true);
foreach ($config_data as $section => $r) {
  foreach ($r as $string => $value) {
    if (!defined($string)) define($string, $value);
  }
}
//.chat_banner_messages_rotation.ini LOADER

//.chat_simple_antiflood.ini LOADER
$config_data = parse_ini_file($cpath . "cfg/chat_simple_antiflood.ini", true);
foreach ($config_data as $section => $r) {
  foreach ($r as $string => $value) {
    if (!defined($string)) define($string, $value);
  }
}
//.chat_simple_antiflood.ini LOADER 

if (language == 'en')
require $cpath . 'cfg/languages/en.lng.php';
else if (language == 'ru')
require $cpath . 'cfg/languages/ru.lng.php';
else if (language == 'de')
require $cpath . 'cfg/languages/de.lng.php';
else if (language == 'pl')
require $cpath . 'cfg/languages/pl.lng.php';
else if (language == 'it')
require $cpath . 'cfg/languages/it.lng.php';
else if (language == 'br')
require $cpath . 'cfg/languages/br.lng.php';
else if (language == 'fr')
require $cpath . 'cfg/languages/fr.lng.php';
else if (language == 'nl')
require $cpath . 'cfg/languages/nl.lng.php';
else
require $cpath . 'cfg/languages/en.lng.php';

 
if(empty($msgr))
	$msgr = 'none';

 
$sleep_rcon     = 59000; ///Rcon get pause time   
 
                 $i = 0;
                for ($i = 1;$i <= 30;$i++) {
                    if (!empty($mpgamenname)) $i = 31;
 $gj = 0;
 
 
//////////////////////////////////   serverinfo   /////////////////////  
      $zreplace = '';
      $server_addr = "udp://" . $server_ip;
      @$connect = fsockopen($server_addr, $server_port, $re, $errstr, 30);
    $sz = 'serverinfo';
    stream_set_timeout($connect, 0, 1e5); //1e5
    fwrite($connect, "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" ' . strtr($sz, array(
      '%s' => $zreplace
    )));
    $outxxx = fread($connect, 1024); //512
	$outxxx = explode ("\xff\xff\xff\xffprint\n", $outxxx);
    $outxxx = implode ('!', $outxxx);
    $outxxx = explode ("\n",$outxxx);
	fclose($connect);
//////////////////////////////////   serverinfo   ///////////////////// 
	 
	if(is_array($outxxx))
	{		
		
		foreach ($outxxx as $nm ) {
        //sv_maxRate          25000
            $parts = preg_split('/\s+/', $nm);
  
		if(!empty($parts[0]))
			{
				
				if(empty($parts[1]))
					$parts[1] = '';				
				if(empty($parts[2]))
					$parts[2] = '';
				if(empty($parts[3]))
					$parts[3] = '';
				if(empty($parts[4]))
					$parts[4] = '';	
				
$cvarstring = $parts[1].' '.$parts[2].' '.$parts[3].' '.$parts[4];			
				
switch ($parts[0]) {
    case 'gamename':
        $mpgamenname = $cvarstring;
        break;
    case 'shortversion':
        $mpshortver = $cvarstring;
        break;
    case 'sv_hostname':
        $servername = $cvarstring;
        break;
    case 'g_gametype':
        $gametypename = $cvarstring;
        break;
    case 'mapname':
        $serverxmap = $cvarstring;
        break;
	 
	 if (strpos($cvarstring, trim($z_rcm)) !== false)
$gj = 1;
		
				}}}}}
  
if (empty($game_patch))
 { 
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
         
	 if(!empty($game_patch))
	$game_patch = trim($game_patch);   
   }
  
  
  
   
 try {
      $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
      $msqlconnect = new PDO($dsn, db_user, db_pass);
	  
	  if(!$msqlconnect)
	  {
        echo "\n CAN'T CONNECT TO MSQL DATABASE! EDIT YOUR cfg/_settings.php"; 
		sleep(5);
      }		 
    
     }
     catch(PDOException $e) {
      echo "\n\n\n ERROR: ", $e->getMessage(); 
     }
	if(!empty($e))
	 { 
	 if(!empty($e->getMessage()))
	 {
        echo "\n CAN'T CONNECT TO MSQL DATABASE! EDIT YOUR cfg/_settings.php, OR YOU HAVE ANOTHER PROBLEM WITH MSQL!!!"; 
		sleep(5);
        exit();		
	 }
	 }
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
 



?>
