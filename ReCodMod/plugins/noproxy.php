<?php
////////////////////////////////// SCRIPTED BY LA|ROCCA /////////////////////////////////////////////
//include("geoip_bases/MaxMD/geoipcity.inc");
//include("geoip_bases/MaxMD/geoipregionvars.php");
if((empty($i_ip)) 
 || (strpos($i_ip, '192.168') !== false)
 || (strpos($i_ip, '255.255') !== false)
 || (strpos($i_ip, 'localhost') !== false)
 || (strpos($i_ip, '127.0.0.1') !== false)
 )
$i_ip = '37.120.56.200';

$gi = geoip_open($cpath."ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat",GEOIP_STANDARD);
$record = geoip_record_by_addr($gi,$i_ip);
$xxxnw = ($record->country_name . ", ".$record->city."");
$xxxnw2 = ($record->country_name);
$date = date('Y-m-d H:i:s'); 


////////////////////////////////// SCRIPTED BY LA|ROCCA /////////////////////////////////////////////     
  
if($xxxnw2 == 'Anonymous Proxy')   ////  = Proxy
{


if ($game_ac == '0'){ 
rcon('clientkick '. $i_id, '');
AddToLog("[".$datetime."] PROXY KICK: (" . $i_ip . ") (" . $i_name . ")");
echo 'A3A3A3A3A3A3 :D';
}
else { 
rcon('akick '. $i_id.' " ^6[^7PROXY BAN! ^5'.$z_ver.'"', '');

AddToLog("[".$datetime."] PROXY KICK: (" . $i_ip . ") (" . $i_name . ")");
echo 'A3A3A3A3A3A3 :D';
}}
////////////////////////////////// SCRIPTED BY LA|ROCCA /////////////////////////////////////////////	

geoip_close($gi);
?>
 
