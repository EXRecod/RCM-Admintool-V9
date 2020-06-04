<?php
  function iclear($string) {
$string = str_replace('          ', ' ', $string);
$string = str_replace('         ', ' ', $string);
$string = str_replace('        ', ' ', $string);
$string = str_replace('       ', ' ', $string);
$string = str_replace('      ', ' ', $string);
$string = str_replace('     ', ' ', $string);
$string = str_replace('    ', ' ', $string);
$string = str_replace('   ', ' ', $string);
$string = str_replace('  ', ' ', $string);
$string = str_replace(' ', ' ', $string);
return $string . "";
}

function iclearc($string) {
$string = str_replace("^0", "", $string);
$string = str_replace("^1", "", $string);
$string = str_replace("^2", "", $string);
$string = str_replace("^3", "", $string);
$string = str_replace("^4", "", $string);
$string = str_replace("^5", "", $string);
$string = str_replace("^6", "", $string);
$string = str_replace("^7", "", $string);
$string = str_replace("^8", "", $string);
$string = str_replace("^9", "", $string);
return $string;
}	 
if($server_rconpass == 'my_rcon_password')
if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;

		    $i_name1c = 22;

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


list($onee, $twoo, $shfye, $servername) = explode('"', $sv_hostname);   
echo "\n ".iclearc($servername);
$servername = iclear($servername);

if (empty($servername))
$servername = 'our';

?>
