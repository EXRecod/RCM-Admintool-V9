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
//////////////////////////////////   sv_hostname   /////////////////////  
      $zreplace = '';
      $server_addr = "udp://" . $server_ip;
      @$connect = fsockopen($server_addr, $server_port, $re, $errstr, 30);
    $sz = 'sv_hostname';
    stream_set_timeout($connect, 0, 1e5); //1e5
    fwrite($connect, "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" ' . strtr($sz, array(
      '%s' => $zreplace
    )));
    $outxxx = fread($connect, 1024); //512
	$outxxx = explode ("\xff\xff\xff\xffprint\n", $outxxx);
    $outxxx = implode ('!', $outxxx);
    $outxxx = explode ("\n",$outxxx);
	fclose($connect);
	
	
	var_dump($outxxx);
	
//////////////////////////////////   sv_hostname   ///////////////////// 


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
	 sleep(2);
	 debuglog( (__FILE__)." [RCON] CAN'T CONNECT TO GAME SERVER!");
	 die("\n [RCON] CAN'T CONNECT TO GAME SERVER!");
}

list($onee, $twoo, $shfye, $servername) = explode('"', $sv_hostname);   
 
if (empty($servername))
$servername = 'RCON STATUS ERROR';		 
		 
	 }
	 ?>