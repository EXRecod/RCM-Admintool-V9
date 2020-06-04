<?php
if(admin_online($adminguids_array)==0)
{	
if(!empty(player_geoip_search($player_geoip)))
{
list($idw,$niw,$ipw,$guiw)= explode(',', player_geoip_search($player_geoip));
echo 'list==='.$guiw;
}	
	
$x_admin = 0;
try
  {
	   if (empty($adminlists))	  
$db = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db1.sqlite');
else
$db = new PDO('sqlite:'.$adminlists);
  $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
  $sql = "SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1";
 $stat = $db->query($sql)->fetchColumn();
if($stat > 0)
{	
 foreach($result as $row)
    {
   $adm_ip  = $row['s_adm'];
   $a_grp  = $row['s_group'];
  $adm_ip = trim($adm_ip);
  $i_ipo = trim($i_ip);  
 
     if(($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0)|| (array_search(strtolower($i_ip), $adminIP, true) !== false)||($adm_ip == $i_ipo) && (($a_grp == 0) || ($a_grp == 111)) )
   {
    $x_admin = 1;
   } 
else if(($adm_ip == $i_ipo) && ($a_grp == 1))
   {
    $x_admin = 1;
   }
else if(($adm_ip == $i_ipo) && ($a_grp == 2))
   {
    $x_admin = 1;
   }
else if(($adm_ip == $i_ipo) && ($a_grp == 3))
   {
   
foreach ( $commands as $command ) {if (preg_match('/'.$command.'/si', $msgr, $xnon))
{ $x_admin = 2; }else{$x_admin = 1;}}
   
   }
else if(($adm_ip == $i_ipo) && ($a_grp == 4))
   {
    $x_admin = 1;
   }  
else if(($adm_ip == $i_ipo) && ($a_grp == 5))
   {
foreach ( $commands as $command ) {if (preg_match('/'.$command.'/si', $msgr, $xnon))
{ $x_admin = 2; }else{$x_admin = 1;}}
   }
else if(($adm_ip == $i_ipo) && ($a_grp == 555))
   {
    $x_admin = 1;
   }   
 else 
   {
   //
   $x_admin = 2;
   echo ' ./ ';   
   }  
 }  
    
	}	  
 else
   {
   $x_admin = 2;
   }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    print ' FILE:  '.__FILE__.'  Exception : '.$e->getMessage();
  }
  
  if($x_admin == 2)
	      {	  
try
  {

	
$db4 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db4.sqlite');
////////////////////////////
 if (empty($bannlist))	  
$db2 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db2.sqlite');
else
$db2 = new PDO('sqlite:'.$bannlist);
////////////////////////////
	  
if ($x_admin2 == 0)
 {	
$tfin = substr((microtime(true) - $start), 0, 7);
	  
$msgr = matmat($msgr);
$parselinetxt = delxxxc($parseline); 


if($x_commandz > 0)		  
$msgr = substr($msgr, 0, 3);

$x_n3 = trim(clearnamex($i_name));
$x_n4 = trim(clearnamex($nickr));


$now_is = date('YmdHis');
$fhrf = file($log_cash."/".$server_port."_temp3.txt");
$numxl = 0;
foreach ($fhrf as $nd) {
$xbz = explode("%",$nd);

if(empty($xbz[0]))
	$xbz[0] = 'terminated%%%';
$nick[$numxl] = $xbz[0];

if(empty($xbz[0]))
	$xbz[0] = 'terminated%%%';
$msgrz[$numxl] = trim($xbz[1]);

if(empty($xbz[2]))
	$xbz[2] = 'terminated%%%';
$res3[$numxl] = $xbz[2];

if(empty($xbz[3]))
	$xbz[3] = 'terminated%%%';
$whilex[$numxl] = $xbz[3];
++$numxl;

}	
//chat flood
//bind flood


if(empty($res3[0]))
    $res3[0] = '%#%';
if(empty($res3[1]))
	$res3[1] = '%#%';
if(empty($res3[2]))
	$res3[2] = '%#%';
if(empty($res3[3]))
     $res3[3] = '%#%';
 
 if(empty($nick[0]))
    $nick[0] = '%#%';
if(empty($nick[1]))
	$nick[1] = '%#%';
if(empty($nick[2]))
	$nick[2] = '%#%';
if(empty($nick[3]))
     $nick[3] = '%#%';
 
  if(empty($whilex[0]))
    $whilex[0] = '%#%';
if(empty($whilex[1]))
	$whilex[1] = '%#%';
if(empty($whilex[2]))
	$whilex[2] = '%#%';
if(empty($whilex[3]))
     $whilex[3] = '%#%';
 
   if(empty($msgrz[0]))
    $msgrz[0] = '%#%';
if(empty($msgrz[1]))
	$msgrz[1] = '%#%';
if(empty($msgrz[2]))
	$msgrz[2] = '%#%';
if(empty($msgrz[3]))
     $msgrz[3] = '%#%';
 
 
 
 $fulxmsgr[0] = $nick[0].$msgrz[0];
 $fulxmsgr[1] = $nick[1].$msgrz[1];
 $fulxmsgr[2] = $nick[2].$msgrz[2];
 $fulxmsgr[3] = $nick[3].$msgrz[3];
 
echo ' -1- '.$nick[0];
echo ' -2- '.$nick[1];
echo ' -3- '.$nick[2];
$dfzz = $now_is - $res3[2];
echo ' $$$1$$$ '.$dfzz;
//echo ' ^^-2-^^ '.$res3[1];
//echo ' ^^-3-^^ '.$res3[2];
 //tstt%g%20161104215923%0.19668
 $x_admin2 = 3;
 
 }
if(
((  (($x_n3 == $x_n4) && ($nick[0] == $x_n4) && ($nick[1] == $x_n4)) 
 || (($x_n3 == $x_n4) && ($nick[1] == $x_n4) && ($nick[2] == $x_n4))
 || (($x_n3 == $x_n4) && ($nick[2] == $x_n4) && ($nick[3] == $x_n4)) )
	&& ((($whilex[0]+$whilex[1]) <= 1.8) || (($whilex[1]+$whilex[2]) <= 1.8) || (($whilex[2]+$whilex[3]) <= 1.8))
    && (($now_is - $res3[1]) <= 2.9)
    && (($msgrz[0] == $msgr) || ($msgrz[1] == $msgr) || ($msgrz[2] == $msgr)))

	||
	
	(( (($x_n3 == $x_n4) && ($nick[2] == $x_n4) && ($nick[1] == $x_n4) && ($nick[0] == $x_n4))
	//|| (($x_n3 == $x_n4) && ($nick[2] == $x_n4) && ($nick[1] == $x_n4) && ($nick[0] == $x_n4))
    || (($x_n3 == $x_n4) && ($nick[3] == $x_n4) && ($nick[2] == $x_n4) && ($nick[1] == $x_n4) && ($nick[0] == $x_n4)))	
	&& (($whilex[0]+$whilex[1]+$whilex[2]+$whilex[3]) <= 0.8) 
    and ((($now_is - $res3[2]) <= 3.1) || (($now_is - $res3[3]) <= 3.8))) 
	
	)	
{ echo " FLUD "; 




/*

if	(( (($x_n3 == $x_n4) && ($nick[2] == $x_n4) && ($nick[1] == $x_n4) && ($nick[0] == $x_n4))
	|| (($x_n3 == $x_n4) && ($nick[2] == $x_n4) && ($nick[1] == $x_n4) && ($nick[0] == $x_n4))
    || (($x_n3 == $x_n4) && ($nick[3] == $x_n4) && ($nick[2] == $x_n4) && ($nick[1] == $x_n4) && ($nick[0] == $x_n4)))	
	&& (($whilex[0]+$whilex[1]+$whilex[2]) <= 1.5) 
    and ((($now_is - $res3[2]) <= 3.1) || (($now_is - $res3[3]) <= 3.1)))  
	
   rcon('say  ^6  ^7'. $chistx . ' ^6[^7'.$flldd.'!^6] ^1RCM '.$z_ver.' Autokicker', '');
else
	rcon('say  ^6  ^7'. $chistx . ' ^6[^7Warning! Bind flood detected!^6] ^1RCM '.$z_ver.' Autokicker', '');
*/

 $sql  = "SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1";
                $stat = $db4->query($sql)->fetchColumn();
                if (empty($stat))
                 {
					 $x_date  = date('Y-m-d H:i:s');
					 $mdxxx   = md5(md5(md5($chistx)));
                    $t    = $i_id . ' / ' . $i_name . ' / ' . $i_ip . ' / ' . $i_ping;
                    $x_ai = explode(" / ", $t);
		$db4->exec("INSERT INTO x_db_players (s_port, x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, 
		x_db_conn, x_db_date, x_db_warn, x_date_reg, stat)
    VALUES ('$svipport', '$svipport', '$x_ai[1]', '$x_ai[2]', '$mdxxx', '$x_date', '0')");	
  
				 }


$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");
	
AddToLog("[".$datetime."] CHAT FLOODER WARN : " . $x_n4 . " (" . $i_ip . ") ");
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $x_n4 . " <font color='fuchsia'>[^7Warning by RCM '.$z_ver.' = Chat Flood]</font> ");

if ($x_numberz == 0)
 {
if($numxl < 5)
{
	if ($x_numberz == 0)
 {
$x_n4 = trim(clearnamex($nickr)); 	
$today=date('YmdHis');
$fh=fopen($log_cash."/".$server_port."_temp3.txt" ,"a+");
fwrite($fh, $x_n4.'%'.$msgr.'%'.$today.'%'.$tfin."\n");
fclose($fh);
$x_numberz = 22;
 }
}
else if($numxl > 4)
{
	if ($x_numberz == 0)
 {
$x_n4 = trim(clearnamex($nickr)); 	
$today=date('YmdHis');
$fh=fopen($log_cash."/".$server_port."_temp3.txt" ,"w+");
fwrite($fh, $x_n4.'%'.$msgr.'%'.$today.'%'.$tfin."\n");
fclose($fh);
$x_numberz = 22;
 }
}
else{
	if ($x_numberz == 0)
 {
$x_n4 = trim(clearnamex($nickr)); 	
$today=date('YmdHis');
$fh=fopen($log_cash."/".$server_port."_temp3.txt" ,"w+");
fwrite($fh, $x_n4.'%'.$msgr.'%'.$today.'%'.$tfin."\n");
fclose($fh);	
$x_numberz = 22;
 }
}
//$x_numberz = 22;
 }
 
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED FLOOD	

  $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1");
    foreach($result as $row)
    { 
		//$pl1 = $row['x_db_name'];
		$ip1 = $row['x_db_ip'];
		$wrn = $row['x_db_warn'];	

if (($ip1 == $i_ip) && ($wrn < 3))
		{
			AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Chat Flooding detected!^1] [^7Warning '.$wrn.'^1/^73^1]^7 stop flooding or you get a kick^1!', '');	
AddToLog("[".$datetime."] CHAT Chat FloodingS Warning: " . $i_ip . " (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $x_n3 . " <font color='fuchsia'>[Warning by RCM '.$z_ver.' = Chat Flooding]</font> ");	
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");
		
++$stop_lp; 	    
}else if (($ip1 == $i_ip) && ($wrn == 3)){
	AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Chat Flooding detected!^1] [^7Warning '.$wrn.'^1/^7'.$wflood.'^1]^7 stop flooding or you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT Chat FloodingS KICKER: (" . $i_ip . ") (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $x_n3 . " <font color='fuchsia'>[Kicked by RCM '.$z_ver.' = Chat Flooding]</font> ");	

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' CHAT FLOOD!', '');
else
        rcon('clientkick '. $i_id, '');
	$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");

}
else if (($ip1 == $i_ip) && ($wrn == round($wflood/2))){
	AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Chat Flooding detected!^1] [^7Warning '.$wrn.'^1/^7'.$wflood.'^1]^7 stop flooding or you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT Chat FloodingS KICKER: (" . $i_ip . ") (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $x_n3 . " <font color='fuchsia'>[Kicked by RCM '.$z_ver.' = Chat Flooding]</font> ");	

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' CHAT FLOOD!', '');
else
        rcon('clientkick '. $i_id, '');
	$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");

}
else if (($ip1 == $i_ip) && ($wrn >= $wflood)){
	AddToLog("[".$datetime."] CHAT FLOOD BANNNED: (" . $i_ip . ") (" . $i_name . ")");
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Chat Flooding detected!^1] [^7Warning '.$wrn.'^1/^7'.$wflood.'^1]^7 you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT Chat FloodingS KICKER: " . $i_ip . " (" . $i_name . ")  r: BANNED");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $x_n3 . " <font color='fuchsia'>[Banned by RCM '.$z_ver.' = Chat Flooding]</font> ");
	$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");
$i_namex = aaxa($i_name);
$nickr = clearnamex($i_name);
$x_nickx = clearnamex($nickr);
$x_reason = 'Flood';
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_bann = explode(" / ", $tk);
	if ($game_patch != 'cod4')
	{
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','$game_patch')");
	xcon('banUser '.$guid.' ^1CHAT FLOOD!', '');}
	AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
{
	rcon('clientkick '. $i_id.' CHAT FLOOD!', '');
}
else
        rcon('clientkick '. $i_id, '');
	$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");

}else{
	
usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Chat Flooding detected!^1] [^7Warning '.$wrn.'^1/^7'.$wflood.'^1]^7 stop flooding or you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT Chat FloodingS KICKER: (" . $i_ip . ") (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $x_n3 . " <font color='fuchsia'>[Kicked by RCM '.$z_ver.' = Chat Flooding]</font> ");	
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");

}		

    }		
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED FLOO
++$x_number;
}
 $x_admin = 0;
require $cpath . 'ReCodMod/functions/null_db_connection.php'; 
  }
  catch(PDOException $e)
  {
    print ' FILE:  '.__FILE__.'  Exception : '.$e->getMessage();
  } 
}
}
?>
