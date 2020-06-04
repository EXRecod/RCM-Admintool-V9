<?php
 
$server_addr = "udp://" . $server_ip;
@$connx = fsockopen($server_addr, $server_port, $re, $errstr, 30);
if (!$connx) { die('Can\'t connx to COD gameserver.'); }
//socket_set_timeout ($connx, 1, 000000);  // bylo2
stream_set_timeout ($connx, 0, 70000); //1e5
$send = "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" '.$getinf;
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
 echo $rconpassss = $outxxx[0];
 $fssgame = $outxxx[0];
 $homepthh = $outxxx[0];
 $fssgame = $outxxx[0];
 $gamename = $outxxx[0];
 $shoortversion = $outxxx[0];
  $gloggs = $outxxx[0];
   $dumpbanlist = $outxxx[0];
    $maps = sv_rotation($outxxx[0]);
 $mapsxc = sv_rotationx($outxxx[0]);
 $mapslisst = $mapsxc;
 //shortversion  
  
//cod  "g_log" is:"gggg_mp.log^7" default:"games_mp.log^7"
//cod4 "g_log" is: "games_mp.log" default: "games_mp.log" info: "Log file name"

 
//cod  "fs_homepath" is:"/media/DataBase/Game_Servers/cod1/fr/wawa^7" default:"/home/larocca/.callofduty^7"
//cod4 "fs_homepath" is: "/home/larocca/.callofduty4" default: "/home/larocca/.callofduty4" info: "Game home path"

?>
