<?php
$dircache = $cpath."win_cache_ms/"; 
if(is_dir($dircache))
{
$dircache = $cpath."php/php.ini";
if(!file_exists($dircache))
{	
if (!copy($cpath.'ReCodMod/functions/php.ini', $cpath.'php/php.ini')) 
	echo " \n \033[37;1;41m  <<< NO COPY ".$cpath."ReCodMod/functions/php.ini ... ! >>>   \n\n"; //red
else
	echo " \n \033[38;5;15m  <<< COPY SUCCESS TO ".$cpath."php/php.ini ... ! >>>   \n"; //	
}
}
$dircache = $cpath."win_cache_ms/"; 
if(!is_dir($dircache))
{
$key = array_search('mbstring', get_loaded_extensions());

if($key == 0){
	sleep (5);
	die("\n\r Please install mbString! [ sudo apt-get install php7.0-mbstring ]");
}
	 if(!empty(SQLite3::version())){
      $version = SQLite3::version();
	  $arr['description'] = 'SQLite 3';    
      $arr['version'] = $version['versionString'];
	  
	      if(empty($arr['version'])){
			sleep (5);  
		  die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite ]");
		  }
	  
	  	  if(empty($arr['version'])){
			  sleep (5);
		  die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite3 ]");
		  }
     }
       if (stripos(curl_version()['version'], "version") !== false) { 
       if (!curl_version()['features'] & CURL_VERSION_KERBEROS4) {
		   sleep (5);
          die("\n\r CURL is not available!. [ sudo apt-get install php7.0-curl ] ");	
                     }}	

 if(ini_get("register_argc_argv")) {
    echo "";
  } else {
	  sleep (5);
    die ("\n\r It isn't set!  register_argc_argv  in php.ini");
    usleep(9999999);
  }
}
/* 
 $dircache = $cpath."cache_ms/"; 
if(is_dir($dircache))
{	
	
	
$command = "/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
$localIP = query ($command);

	 if (strpos($mplogfile, 'ftp:') === false){
$server_ip = $localIP;
	$server_ip = gethostbyname(gethostname());
	 }
	
}
*/



function hx($sc)
{
    $sc = str_replace(array(
        "/ReCodMod/functions"
    ), '', $sc);
    $sc = str_replace(array(
        "//ReCodMod//functions"
    ), '', $sc);	
    $sc = str_replace(array(
        "\ReCodMod\functions"
    ), '', $sc);
    $sc = str_replace(array(
        "\\ReCodMod\\functions"
    ), '', $sc);	
    $sc = str_replace(array(
        "cleaner.php"
    ), '', $sc);
    return $sc . "";
}
$cpath = hx(__FILE__);

/*
$dircache = $cpath."cache_ms/"; 
if(!is_dir($dircache))
{
 require $cpath . 'windows_system_cfg.php';	
}
*/

error_reporting(E_ALL); // Error engine - always TRUE!
ini_set("ignore_repeated_errors", TRUE); // always TRUE
ini_set("display_errors", TRUE); // Error display - FALSE only in production environment or real server
ini_set("log_errors", TRUE); // Error logging engine
ini_set("error_log", $cpath."ReCodMod/php-all-errors.log");


$x_ff = 1;
/* - Load configurations - */
require $cpath . 'ReCodMod/functions/_c.php';
//echo phpinfo();
echo  "\n         Welcome to ".$z_set." (c) http://xxxreal.ru/ \n";
/* - Load functions - */
include($cpath . "ReCodMod/functions/functions.php");		
        $datetime = date('Y.m.d H:i:s');
        $date     = date('Y.m.d H:i:s');
        $dtx2     = date('Y-m-d H:i:s');
		
		 
/* - Load functions - */
require $cpath . 'ReCodMod/functions/inc_functions.php'; 



$beforeC = current(explode('.callofduty4/main', $mplogfile));


if (strpos($mplogfile, 'ftp:') !== false)
{ 

$mplogfilei = str_replace(array(
        "sftp://", "ftp://"
  ), '', $mplogfile);
$ftp_user_explode = explode(':', $mplogfilei);
  $ftp_exp_user = $ftp_user_explode[0];

$ftp_pass_explode = explode('@', $ftp_user_explode[1]);
  $ftp_exp_password = $ftp_pass_explode[0];

$mssf = explode('@', $ftp_user_explode[1]);
$mssy = explode('/', $mssf[1]);
  $ftp_exp_ip = $mssy[0];

$mssy = explode($mssy[0], $mssf[1]);
  $ftp_exp_url = $mssy[1];

$gmlobame = basename($ftp_exp_url);

     $handlefgh = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
	 $beforeC = current(explode('.callofduty4/main', $handlefgh));

echo "\n \033[37;1;1m"; 
echo "\n FTP USER: ",$ftp_exp_user,
"\n FTP PASSWORD: ",$ftp_exp_password,
"\n FTP IP: ",$ftp_exp_ip,
"\n FTP URL: ",$ftp_exp_url,
"\n LOG NAME: ",$gmlobame;
echo " \n \033[38;5;46m \n";

sleep(3);
}
else
{
	
$fp = fopen($mplogfile, 'w');
fputs($fp, " ---\n");
fclose($fp);	
	
}

$XMLDoc = $beforeC.'.callofduty4/main/serverstatus.xml';
 
if(file_exists($XMLDoc))
{
 $xml = simplexml_load_file($XMLDoc); 
 	
	foreach ($xml->Game->Data as $data) {
	if((!empty($data['Name']))&&(!empty($data['Value']))){
		$name  = trim($data['Name']);
		$vl = $data["Value"];
    
	if($name == 'gamename')
	   $xff = $vl;
	else if($name == 'mapname')
	   $serverxmap = $vl;
 	else if($name == 'g_gametype')
	   $g_gametype = $vl; 
  	else if($name == 'sv_hostname')
	   $servername = $vl; 
  	else if($name == 'shortversion')
	   $mmn = $vl;    
  	else if($name == 'fs_game')
	   $fs_game = $vl;  
   }}
 
  
	foreach ($xml->Clients as $infc) {
	if(!empty($infc['Total']))
	     $plyr_cnt = $infc['Total'];
	} 
}  
 else
 {
 
require_once $cpath.'ReCodMod/functions/getinfo/COD4xServerStatus.php';
        
		$servex3x =$server_ip;
		$portx3x=$server_port; 
 
        $status = new COD4xServerStatus($servex3x,$portx3x);
	if ($status->getServerStatus()){
		$status->parseServerData();
		$serverStatus = $status->returnServerData();
		$players = $status->returnPlayers();
	 
         $servername = $serverStatus['sv_hostname']; 
	     $serverxmap = $serverStatus['mapname']; 
	     $mpgamenname = $serverStatus['gamename']; 
		 $mmn = $serverStatus['shortversion'];  
		 $plyr_cnt = sizeof($players);        
	}		
	
if(empty($servername)){
	if (function_exists('curl_init')) {
if( $curl = curl_init() ) {
 
    curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/ip_check.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "");
    //$outxy = curl_query($curl);
	$outxy = $curl;
    curl_close($curl);
 
	
  }
 }
 if(!empty($server_ip)) {
 $outxy = $server_ip;
 }
		$servex3x =$outxy;
		$portx3x=$server_port; 
 
        $status = new COD4xServerStatus($servex3x,$portx3x);
	if ($status->getServerStatus()){
		$status->parseServerData();
		$serverStatus = $status->returnServerData();
		$players = $status->returnPlayers();
	 
         $servername = $serverStatus['sv_hostname']; 
	     $serverxmap = $serverStatus['mapname']; 
	     $mpgamenname = $serverStatus['gamename']; 
		 $mmn = $serverStatus['shortversion'];  
		 $plyr_cnt = sizeof($players);        
	}  

	
	
if(empty($servername)){	
echo 'x2 SERVERNAME IS EMPTY, CLEAR.PHP  getstatus ERROR!'; sleep(5); return;}	
	
}

 }




    if(!empty($servername))
Prservv($servername);
    if((!empty($mpgamenname))&&(!stat($cpath . 'ReCodMod/cache/x_logs/g_gamename_' . $server_ip . '_' . $server_port . '.log')))	  
Prgamename($mpgamenname);
	if((!empty($mmn))&&(!stat($cpath . 'ReCodMod/cache/x_logs/g_shortversion_' . $server_ip . '_' . $server_port . '.log')))  
Prshortver($mmn);
          
echo "\n Server Name: ".$servername;
    if(!empty($mpgamenname))
echo "\n Game: ".$mpgamenname = sevenofff($mpgamenname);
 if(!empty($mmn))
echo "\n Patch: ".$mmn = sevenofff($mmn);
 if(!empty($serverxmap))
echo "\n Map: ".$serverxmap = sevenofff($serverxmap);
 if(!empty($plyr_cnt))
echo "\n Players: ".$plyr_cnt."\n";
echo "\n Pre loading system - OK! ";
	  		
	







require $cpath . 'ReCodMod/functions/install.php';




if(!empty($Msql_support)){
if((!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok')))
{
if($installok<2)
{echo 'not instaled databases!'; sleep(20); return;}
}
}

if (strpos($mplogfile, 'ftp:') !== false){
 
$mplogfilei = str_replace(array(
        "sftp://", "ftp://"
  ), '', $mplogfile);
$ftp_user_explode = explode(':', $mplogfilei);
  $ftp_exp_user = $ftp_user_explode[0];

$ftp_pass_explode = explode('@', $ftp_user_explode[1]);
  $ftp_exp_password = $ftp_pass_explode[0];

$mssf = explode('@', $ftp_user_explode[1]);
$mssy = explode('/', $mssf[1]);
  $ftp_exp_ip = $mssy[0];

$mssy = explode($mssy[0], $mssf[1]);
  $ftp_exp_url = $mssy[1];

$gmlobame = basename($ftp_exp_url);

// connect and login data
$web = $ftp_exp_ip;
$user = $ftp_exp_user;
$pass = $ftp_exp_password;
// file location
$server_file = $ftp_exp_url;
 
//connect
$conn_id = ftp_connect($web);

$login_result = ftp_login($conn_id,$user,$pass);
 
 
if (!$conn_id || !$login_result)
//("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
trigger_error("\n RCM DEBUG: Не удалось установить соединение с FTP сервером $web !", E_USER_ERROR);  
 
if(!empty($conn_id)){
// включение пассивного режима
 if (!ftp_pasv($conn_id, true)) {
            $errmsg = "Passive mode not available at this server";
            //Passive mode not available
    ftp_pasv($conn_id, false);
        }
}
 
$ftp_server = $ftp_exp_ip;
 $ftp_user_name = $ftp_exp_user;
 $ftp_user_pass = $ftp_exp_password;
 

$remote_file = $ftp_exp_url;



$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
fclose($fp); 

// попытка загрузки файла
if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
} else {
    echo "ERRRRRRRRROORRRRRRRRR FTP \n";
	echo $remote_file."ERRRRRRRRROORRRRRRRRR FTP \n";
	echo "ERRRRRRRRROORRRRRRRRR FTP \n";
}  
 
 
 
// попытка переименовать $olf_file в $new_file
if (ftp_rename($conn_id, $ftp_exp_url, $ftp_exp_url.'recod')) {
 echo "Файл ".$ftp_exp_url." переименован в ".$ftp_exp_url."recod \n";

 
	    $hu = fopen($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame, 'w+');
        fwrite($hu, "0");
        fclose($hu);
        echo 'NULLED';


 
 } else {
 echo "Не удалось переименовать ".$ftp_exp_url." в ".$ftp_exp_url."recod\n";
} 
 

 
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
fclose($fp); 

// попытка загрузки файла
if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
} else {
    echo "ERRRRRRRRROORRRRRRRRR FTP \n";
	echo $remote_file."ERRRRRRRRROORRRRRRRRR FTP \n";
	echo "ERRRRRRRRROORRRRRRRRR FTP \n";
}   
 

// close the connection
ftp_close($conn_id);
 

}
else
{
 if(!empty($mplogfile))
file_put_contents($mplogfile, null);	
}


$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt", "w+");
fputs($fp, "0");
fclose($fp);

$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($hu, "1");
fclose($hu);


$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_position.txt", "w+");
fputs($fp, "0");
fclose($fp);

if(file_exists($log_folder.'/g_log_'.$server_ip.'_'.$server_port.'.log')){											
$fy = file($log_folder.'/g_log_'.$server_ip.'_'.$server_port.'.log');
foreach ($fy as $parseglog) { $mplogfiler = $parseglog; }}


usleep($sleep_rcon);
require $cpath.'ReCodMod/functions/getinfo/rconpass.php';
fclose($connx);


if (empty($rconpassss)){ 
echo "
\n\n RCM NOT WORK 
\n YOUR GAME SERVER NOT STARTED!,
\n OR YOU USE WRONG server_ip AND server_port IN [cfg/servers.cfg]!,
\n fix it for RCM working! 
\n THAN RESTART go FILE! \n\n\n";
	//sleep (7000);
	//if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
	}


if (preg_match("/Bad rcon/i", $rconpassss)){ 
echo "\n\n Your use wrong rcon password -> ($server_rconpass = ) 
\n GAME server rcon password need add in [cfg/servers.cfg], 
\n FROM your game server config file,
\n fix it for RCM working! 
\n OR TRY RESTART go FILE! 
\n  RCM NOT WORK \n\n";
	//sleep (7000);
	//if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
	}
	else{
if(!empty($aqrcon))
{
xcon('sets _'.$z_set.'', '');	
usleep(9000);
xcon('set g_logsync 2');
usleep(9000);
xcon('set logfile 1');
usleep(9000);
xcon('set sv_log_damage 1');
usleep(9000);
xcon('set g_antilag 1');
}
	}
	
if (preg_match("/No rconpassword/i", $rconpassss)){ 
echo "\n\n No rconpassword set on your game server!\n EXAMPLE:  set rcon_password YOURPASSWORD in game server \n";
	sleep (17000);
	if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
	
	
usleep($sleep_rcon);
require $cpath.'ReCodMod/functions/getinfo/fs_homepath.php';
fclose($connx);
if(empty($homepthh)){
	echo "\n\n You use wrong ($server_rconpass = )rcon password in [cfg/servers.cfg],\n or in your game server config files, \n fix it for RCM working! \n\n";
	//sleep (3000);
	//if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
	
	}
	
    list($vv9cm, $vv12nm, $xxkm , $xxkmb) = explode('"', $homepthh);
$pppath = sevenofff($xxkmb);
usleep($sleep_rcon*3);
require $cpath.'ReCodMod/functions/getinfo/g_log.php';
fclose($connx);
      list($vv9cl, $vv12nl, $xxkl, $xxkml) = explode('"', $gloggs);
              
 usleep($sleep_rcon*3);
 require $cpath.'ReCodMod/functions/getinfo/fs_game.php';
 fclose($connx);
       list($onee, $twoo, $threee, $fourr) = explode('"', $fssgame);          

$mplogfiler = sevenofff($mplogfilenew);
AddToparsser($mplogfiler);

if((!file_exists($mplogfilexl)) && (!preg_match('/ftp:/', $mplogfilexl, $xnon)))
{echo "\n error! 
\n DO NOT STARTING! 
\n YOU HAVE PROBLEM WITH settings 
\n g_log in mplogfile line ([cfg/servers.cfg]) it is incorrect 
\n PLEASE ADD CORRECT GAME LOGFILE FOLDER ADRESS! \n
"; 

echo "\n   TRY ADD in mplogfile line ([cfg/servers.cfg]): ".$mplogfiler = sevenofff($mplogfilenew)." \n \n";

//sleep(7000); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
}
else{
if(!empty($aqrcon))
{
xcon('sets _'.$z_set.'', '');	
usleep(9000);
xcon('set g_logsync 2');
usleep(9000);
xcon('set logfile 1');
usleep(9000);
xcon('set sv_log_damage 1');
usleep(9000);
xcon('set g_antilag 1');
}	
}


if((!file_exists($mplogfilexl)) && (!preg_match('/ftp:/', $mplogfilexl, $xnon)))

{
	echo "\n error! 
\n DO NOT STARTING! 
\n YOU HAVE PROBLEM WITH settings 
\n g_log in mplogfile line ([cfg/servers.cfg]) it is incorrect 
\n PLEASE ADD CORRECT GAME LOGFILE FOLDER ADRESS! 
\n OR TRY RESTART RCM ADMIN TOOL!";
echo "\n   TRY ADD THIS in mplogfile line ([cfg/servers.cfg]): ".$mplogfiler = sevenofff($mplogfilenew)." \n \n";
if(!empty($aqrcon))
{
xcon('sets _'.$z_set.'', '');	
usleep(9000);
xcon('set g_logsync 2');
usleep(9000);
xcon('set logfile 1');
usleep(9000);
xcon('set sv_log_damage 1');
usleep(9000);
xcon('set g_antilag 1');
}                            
echo "\n MAYBE NEED ADD THIS PATH ADRESS IN [[cfg/servers.cfg]] mplogfile LINE  -> ".$mplogfiler."
\n";
AddToparsser($mplogfiler);                            
                            
         //sleep(3000); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;                    
}

$vvvvv = @fopen($mplogfilexl, "w+");
@ftruncate($mplogfilexl, 0);
fclose($vvvvv);
$handlePos=fopen($cpath . "ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt" ,"w+");
fwrite($handlePos, "1");
fclose($handlePos);

$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($hu, "1");
fclose($hu);


$_SESSION[$server_port] = 0;							
////AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> LogFile game_mp.log starting auto reset! </font> "); 
AddToLog1clear ("[".$datetime."] Server : LogFile game_mp.log starting auto reset! "); 
if(!empty($aqrcon))
{
xcon('sets _'.$z_set.'', '');	
usleep(9000);
xcon('set g_logsync 2');
usleep(9000);
xcon('set logfile 1');
usleep(9000);
xcon('set sv_log_damage 1');
usleep(9000);
xcon('set g_antilag 1');
}
$f = fopen($cpath."ReCodMod/cache/x_logs/parsed_code_".$server_ip."_".$server_port.".log", "wb");
$file = file_get_contents($codecon); 
fwrite($f, $file);
fclose($f);





 
$handlePos=fopen($cpath . "ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos2.txt" ,"w+");
fwrite($handlePos, "1");
fclose($handlePos);

echo "\n          YOUR (games_mp.log) possible log file path is: \n          ".$mplogfiler = sevenofff($mplogfilenew)." \n \n";

	
	

	
						
?>
