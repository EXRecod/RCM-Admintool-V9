<?php
 	if(empty($servername))
	 {
		$servex3x = $server_ip;
		$portx3x = $server_port; 
		 
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
		 
	 }
	 if(empty($servername))
	 {
$server_addr = "udp://" . $server_ip;
@$connx = fsockopen($server_addr, $server_port, $re, $errstr, 30);
if (!$connx) { die('Can\'t connx to COD gameserver.'); }
//socket_set_timeout ($connx, 1, 000000);  // bylo2
stream_set_timeout ($connx, 0, 70000); //1e5
$send = "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" sv_hostname';
fwrite($connx, $send);
$outxxx = fread ($connx, 1);
if (!empty($outxxx)) {
do {
$status_pre = socket_get_status ($connx);
$outxxx = $outxxx . fread ($connx, 1024);  //1024
$status_post = socket_get_status ($connx);
} while ($status_pre['unread_bytes'] != $status_post['unread_bytes']);
};

$outxxx = explode ("\xff\xff\xff\xffprint\n", $outxxx);
$outxxx = implode ('!', $outxxx);
$outxxx = explode ("\n",$outxxx);


foreach ($outxxx as $value) {
$outxxx[0];    
}
unset($value);
echo $sv_hostname = $outxxx[0];

//cod  "sv_hostname" is:"^3[CRACKED]AW^7|recod.ru          ^7COD 1.4^7" default:"CoDHost^7"
//cod4 "fs_homepath" is: "/home/larocca/.callofduty4" default: "/home/larocca/.callofduty4" info: "Game home path"

if(empty($sv_hostname))
{    
echo "\n \033[38;5;135m [RCON] [ \033[38;5;189m CAN'T CONNECT TO GAME SERVER!!! \033[38;5;135m]";  
require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
	 sleep(20);
	 die("\n [RCON] CAN'T CONNECT TO GAME SERVER!");
}

list($onee, $twoo, $shfye, $servername) = explode('"', $sv_hostname);   
 
if (empty($servername))
$servername = 'RCON STATUS ERROR';		 
		 
	 }