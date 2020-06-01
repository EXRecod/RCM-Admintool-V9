<?php
  
if($server_rconpass == 'my_rcon_password')
if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
if (strpos($game_patch, 'cod1_1.1') !== false)
			$i_name1c = 17;
			else
		    $i_name1c = 22;
$server_addr = "udp://" . $server_ip;
@$connx = fsockopen($server_addr, $server_port, $re, $errstr, 30);
if (!$connx) { die('Can\'t connx to COD gameserver.'); }
//socket_set_timeout ($connx, 1, 000000);  // bylo2
stream_set_timeout ($connx, 0, 70000); //1e5
$send = "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" shortversion';
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
 $shoortversion = $outxxx[0];
//"gamename" is:"Call of Duty^7" default:"Call of Duty^7"
//cod4 "fs_game" is: "mods/r_zombies" default: "" info: "Game data directory. Must be "" or a sub directory of 'mods/'."
?>
