<?php

if(!empty(aqrcon))
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

   if (strpos($mplogfile, 'ftp:') === false)
	 {

$plyr_cnt = 0;

 $beforeC = current(explode('.callofduty4/main', $mplogfile));
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
	
if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'http://xxxreal.ru/ip_check.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "");
    $outxy = curl_exec($curl);
    curl_close($curl);
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
 
 }
 else
	 $plyr_cnt = 28;
 
if(empty($mpgamenname)){

if(!empty($servername))	
	$servernamegui = $servername;
else
	$servernamegui = 'Servername is empty AND';

echo "\n".$servernamegui." rcon gamename IS EMPTY, CLEAR.PHP  getstatus ERROR!"; sleep(20); return;}
    if(!empty($servername))
Prservv($servername);
    if((!empty($mpgamenname))&&(!stat($cpath . 'ReCodMod/cache/x_logs/g_gamename_' . $server_ip . '_' . $server_port . '.log')))	  
Prgamename($mpgamenname);
	if((!empty($mmn))&&(!stat($cpath . 'ReCodMod/cache/x_logs/g_shortversion_' . $server_ip . '_' . $server_port . '.log')))  
Prshortver($mmn);

   if(empty($servername))
	    $servername = '';
	
$limitsoff[0] = 0;	
?>	