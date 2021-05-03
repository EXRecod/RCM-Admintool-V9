<?php
if (ActionIs('K',$parseline)){
list($vv1, $death_player_guid, $idnumb, $vv4, $death_player_name, $player_killer_guid, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parseline);

if(!empty($noplayerdemosrecord[$player_killer_guid])){
if(time() - $noplayerdemosrecord[$player_killer_guid] >= 60){
unset($noplayerdemosrecord[$player_killer_guid]);}}

if(!empty($noplayerdemosrecord[$death_player_guid])){
if(time() - $noplayerdemosrecord[$death_player_guid] >= 60){
unset($noplayerdemosrecord[$death_player_guid]);}}

if(empty($noplayerdemosrecord[$player_killer_guid])){
if(empty($playerdemosrecord[$player_killer_guid])){
$reponse = "SELECT playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM demos where guid = '".$player_killer_guid."'  ORDER BY time DESC LIMIT 1";	   
$r = dbInsert('', $reponse);
if(!empty($r)){	
foreach ($r as $keym => $dannye){
		if($dannye['patch'] < 4){
xcon('record ' . $player_killer_guid, '');
$playerdemosrecord[$player_killer_guid] = time();
		}else $noplayerdemosrecord[$player_killer_guid] = time();
}
}else $noplayerdemosrecord[$player_killer_guid] = time();
}}
 
if(empty($noplayerdemosrecord[$death_player_guid])){
if(empty($playerdemosrecord[$death_player_guid])){

$reponse = "SELECT playername,ip,iprange,guid,reason,time,bantime,days,whooo,patch FROM demos where guid = '".$death_player_guid."'  ORDER BY time DESC LIMIT 1";	   
$r = dbInsert('', $reponse);
if(!empty($r)){
foreach ($r as $keym => $dannye){
		if($dannye['patch'] < 4)
		{
xcon('record ' . $death_player_guid, '');
   $playerdemosrecord[$death_player_guid] = time();
		} else $noplayerdemosrecord[$player_killer_guid] = time();
}	
}else $noplayerdemosrecord[$death_player_guid] = time();
}
}
}
else if (ActionIs('Q',$parseline)){
list($noon, $guid, $idk, $nickname) = explode(';', $parseline);	
if(!empty($playerdemosrecord[$guid])){
//if(time() - $playerdemosrecord[$guid] > 60*3){
$re = "UPDATE demos SET patch=patch+1 WHERE guid = '".$guid."'";
$r = dbInsert('', $re);
if(!empty($r)){
xcon('stoprecord ' . $guid, '');
unset($playerdemosrecord[$guid]);
unset($noplayerdemosrecord[$guid]);
slowscript(__FILE__);
}
//}
}}
?>