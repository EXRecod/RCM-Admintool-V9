<?php
error_reporting(E_ALL); // Error engine - always TRUE!
ini_set("ignore_repeated_errors", TRUE); // always TRUE
ini_set("display_errors", TRUE); // Error display - FALSE only in production environment or real server
ini_set("log_errors", TRUE); // Error logging engine
ini_set("error_log", $cpath."ReCodMod/php-all-errors.log");
$charset_db   = 'utf8';
require $cpath . 'ReCodMod/functions/install/install.php';
 
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

 

$x_ff = 1;  
 
require $cpath . 'ReCodMod/functions/_c.php'; 
/* - Load functions - */
include($cpath . "ReCodMod/functions/functions.php");		
        $datetime = date('Y.m.d H:i:s'); 
        $dtx2     = date('Y-m-d H:i:s');
		
 
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
	   $mpshortver = $vl;    
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
		 $mpshortver = $serverStatus['shortversion'];  
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
  

	
	
if(empty($servername)){	
echo 'x2 SERVERNAME IS EMPTY, CLEAR.PHP  getstatus ERROR!'; sleep(5); return;}	
	
}

 }

 

$getinf = 'serverinfo';
require $cpath.'ReCodMod/functions/getinfo/_main_getinfo.php';
 fclose($connx);

//    if(!empty($servername))
//function Prg_serverinformation($s)
/*          
echo "\n Server Name: ".$servername;
    if(!empty($mpgamenname))
echo "\n Game: ".$mpgamenname = sevenofff($mpgamenname);
 if(!empty($mpshortver))
echo "\n Patch: ".$mpshortver = sevenofff($mpshortver);
 if(!empty($serverxmap))
echo "\n Map: ".$serverxmap = sevenofff($serverxmap);
 if(!empty($plyr_cnt))
echo "\n Players: ".$plyr_cnt."\n";
echo "\n Pre loading system - OK! ";
*/
 

require $cpath . 'ReCodMod/functions/install/install.php';




if(!empty(SqlDataBase)){
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
//("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу ftp_server!");
trigger_error("\n RCM DEBUG: Не удалось установить соединение с FTP сервером $web !", E_USER_ERROR);  
 
if(!empty($conn_id)){
// включение пассивного режима
 if (!ftp_pasv($conn_id, true)) {
            $errmsg = "Passive mode not available at this server";
            //Passive mode not available
    ftp_pasv($conn_id, false);
        }
}
  
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

 

$getinf = 'rconpassword';
require $cpath.'ReCodMod/functions/getinfo/_main_getinfo.php';
 fclose($connx);
 

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
	    
		
		 
if (preg_match("/No rconpassword/i", $rconpassss)){ 
echo "\n\n No rconpassword set on your game server!\n EXAMPLE:  set rcon_password YOURPASSWORD in game server \n";
	sleep (17000);
	if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
 
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
 
 
 

if((!file_exists($mplogfilexl)) && (!preg_match('/ftp:/', $mplogfilexl, $xnon)))

{
	echo "\n error! 
\n DO NOT STARTING! 
\n YOU HAVE PROBLEM WITH settings 
\n g_log in mplogfile line ([cfg/servers.cfg]) it is incorrect 
\n PLEASE ADD CORRECT GAME LOGFILE FOLDER ADRESS! 
\n OR TRY RESTART RCM ADMIN TOOL!";
echo "\n   TRY ADD THIS in mplogfile line ([cfg/servers.cfg]): ".$mplogfiler = sevenofff($mplogfilenew)." \n \n";
                           
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

 							
////AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> LogFile game_mp.log starting auto reset! </font> "); 
AddToLog1clear ("[".$datetime."] Server : LogFile game_mp.log starting auto reset! "); 
 

/*
if (isDomainAvailible('http://xxxreal.ru/'))
 {
$codecon        = 'http://xxxreal.ru/RECODMOD_CONNECTOR.txt';
$f = fopen($cpath."ReCodMod/cache/x_logs/parsed_code_".$server_ip."_".$server_port.".log", "wb");
$file = file_get_contents($codecon); 
fwrite($f, $file);
fclose($f);
}
*/



 
$handlePos=fopen($cpath . "ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos2.txt" ,"w+");
fwrite($handlePos, "1");
fclose($handlePos);

//echo "\n          YOUR (games_mp.log) possible log file path is: \n          ".$mplogfiler = sevenofff($mplogfilenew)." \n \n";

	
	

 
	
						
?>
