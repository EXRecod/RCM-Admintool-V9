<?php
if ($stop_lp == 0 ) {

if(admin_online($adminguids_array)==0)
{	
	
if(!$x_mat || !$x_spam|| !$x_cry )
{
$x_admin1 = 0;
try
  {
	   if (empty($adminlists))	  
$db = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db1.sqlite');
else
$db = new PDO('sqlite:'.$adminlists);
$sql = "SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1";

  $stat = $db->query($sql)->fetchColumn();
if($stat > 0)
{
	
//$vipt = (array_search($chistx, $r_adm, true) !== false);

$result = $db->query($sql);
    foreach($result as $row)
    {	
   $adm_ip  = $row['s_adm'];
   $a_grpp  = $row['s_group'];
   
  $adm_ip = trim($adm_ip);
  $i_ipo = trim($i_ip);  
 
     if(($adm_ip == $i_ipo) && (($a_grp == 0) || ($a_grp == 111)) || ($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0)|| (array_search(strtolower($i_ip), $adminIP, true) !== false))
   {
    $x_admin1 = 1;
   } 
else if(($adm_ip == $i_ipo) && ($a_grp == 1))
   {
    $x_admin1 = 1;
   }
else if(($adm_ip == $i_ipo) && ($a_grp == 2))
   {
    $x_admin1 = 1;
   } 
else if(($adm_ip == $i_ipo) && ($a_grp == 5))
   {
    $x_admin1 = 1;
   }
else if(($adm_ip == $i_ipo) && ($a_grp == 555))
   {
    $x_admin1 = 1;
   }    
else 
   {
   //
   $x_admin1 = 2;
   echo ' ./ ';   
   }  
}

 
}else{

$x_admin1 = 2;


}
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    print ' FILE:  '.__FILE__.'  Exception : '.$e->getMessage();
  }

 

  if($x_admin1 == 2)
	      {	
		  

//****************************************************************************************************************
//****************************************************************************************************************
//****************************************************************************************************************
try
  {
////////////////////////////
 if (empty($bannlist))	  
$db2 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db2.sqlite');
else
$db2 = new PDO('sqlite:'.$bannlist);
////////////////////////////
$db4 = new PDO('sqlite:'.$cpath . 'ReCodMod/databases/db4.sqlite');

$x_n3 = trim(clearnamex($i_name));
$x_n4 = trim(clearnamex($nickr));

if($game_patch != 'cod1_1.1xxx'){
$chck_bad = (((($i_id == $idnum) && !$x_mat) && (strpos($x_n3, $x_n4) !== false)) 
|| ((($i_id == $idnum) && !$x_mat) && (strpos($x_n4, $x_n3) !== false)));

$chck_spam = (((($i_id == $idnum) && !$x_spam) && (strpos($x_n3, $x_n4) !== false)) 
|| ((($i_id == $idnum) && !$x_spam) && (strpos($x_n4, $x_n3) !== false)));

$chck_cry = (((($i_id == $idnum) && !$x_cry) && (strpos($x_n3, $x_n4) !== false)) 
|| ((($i_id == $idnum) && !$x_cry) && (strpos($x_n4, $x_n3) !== false)));

}else{
$chck_bad = ((($x_n4 == $x_n3) && !$x_mat) 
|| (strpos($x_n4, $x_n3) !== false));

$chck_spam = ((($x_n4 == $x_n3) && !$x_spam) 
|| (strpos($x_n4, $x_n3) !== false));

$chck_spam = ((($x_n4 == $x_n3) && !$x_cry) 
|| (strpos($x_n4, $x_n3) !== false));
}

  if($chck_bad) 
	     {					 
echo '->.'.$chat_protect; 
/*
  
if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7'.$cnsorrd.'^6]^7', '');
else
        rcon('clientkick '. $i_id, '');
 */
	  if ($guids == 0)
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");
	  else
	$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_guid='{$guidn}'");
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED CENSOR	

	  if ($guids == 0)
  $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1");
	  else
$result = $db4->query("SELECT * FROM x_db_players WHERE x_db_guid='$guidn' LIMIT 1");
	  
	  
    foreach($result as $row)
    {
		//$pl1 = $row['x_db_name'];
		$gggd = $row['x_db_guid'];
		$ip1 = $row['x_db_ip'];	
		$wrn = $row['x_db_warn'];

		echo $ip1.' = = '.$i_ip;

 if ($guids == 0)
	$ffndr = ($ip1 == $i_ip); 
	    else
		  $ffndr = ($guidn == $gggd);  
	    
     if (($ffndr) && ($wrn < 3))
		{
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Bad Word detected!^1] [^7Warning '.$wrn.'^1/^73^1]^7 stop swearing or you get a kick^1!', '');	
AddToLog("[".$datetime."] CHAT BAD WORDS Warning: " . $i_ip . " (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[Warning = Censored]</font> ");			
++$stop_lp; 	    
}else if (($ffndr) && ($wrn == 3)){
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Bad Word detected!^1] [^7Warning '.$wrn.'^1/^7'.$wswear.'^1]^7 stop swearing or you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT BAD WORDS KICKER: (" . $i_ip . ") (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[Kicked = Censored]</font> ");	

}
else if (($ffndr) && ($wrn == round($wswear/2))){
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Bad Word detected!^1] [^7Warning '.$wrn.'^1/^7'.$wswear.'^1]^7 stop swearing or you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT BAD WORDS KICKER: (" . $i_ip . ") (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[Kicked = Censored]</font> ");	

}
else if (($ffndr) && ($wrn >= $wswear)){
	usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Bad Word detected!^1] [^7Warning '.$wrn.'^1/^7'.$wswear.'^1]^7 you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT BAD WORDS KICKER: " . $i_ip . " (" . $i_name . ")  r: BANNED");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[Banned = Censored]</font> ");
if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
{
	//xcon('clientkick '. $i_id.' CHAT FLOOD!', '');
	xcon('banUser '.$guid.' ^1CHAT FLOOD!', '');
}
else
{      xcon('clientkick '. $i_id, '');
	$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1, stat = '1' WHERE x_db_ip='{$i_ip}'");
	if ($guids == 0)     
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','-')");
	     else
	$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','$guidn','$x_reason','$datetime','$x_nickx','-')");
}	
}else{
	
usleep($sleep_rcon*2);
 rcon('say  ^6^7  '. $chistx . ' "^1[^7Bad Word detected!^1] [^7Warning '.$wrn.'^1/^7'.$wswear.'^1]^7 stop swearing or you get a ban^1!', '');	
AddToLog("[".$datetime."] CHAT BAD WORDS KICKER: (" . $i_ip . ") (" . $i_name . ")");	 
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[Kicked = Censored]</font> ");	
}
  
     if (($ffndr) && ($wrn == 3))
		{

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7'.$cnsorrd.'^6]^7', '');
else
        rcon('clientkick '. $i_id, '');			
++$stop_lp; 	    } 

     if (($ffndr) && ($wrn >= $wswear))
		{


if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7'.$cnsorrd.'^6]^7', '');
else
        rcon('clientkick '. $i_id, '');
 
$i_namex = aaxa($i_name);
$x_nickx = clearnamex($nickr);
$x_reason = 'Swearing';

  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_bann = explode(" / ", $tk);	 
	  
if ($game_patch != 'cod4'){
	  
	if ($guids == 0)     
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','-')");
	     else
	$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','$guidn','$x_reason','$datetime','$x_nickx','-')");
xcon('banUser '.$guid.' ^1CHAT CENSORED!', '');	     
} 
		     
++$stop_lp; 	    } 

    }		
 		
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED CENSOR	

++$stop_lp; 
 
}	


		 
//****************************************************************************************************************
//****************************************************************************************************************
//****************************************************************************************************************
 
  if($chck_spam) 
	     {			
if ($game_ac == '0'){ 
  
  rcon('say  ^6  '. $chistx . ' ^6[^7 '.$noospmm.'!^6] ^1RCM '.$z_ver.'', '');
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED SPAM			
 
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'");
	 
  $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1");
    foreach($result as $row)
    {
		//$pl1 = $row['x_db_name'];
		$ip1 = $row['x_db_ip'];	
		$wrn = $row['x_db_warn'];	
     if (($ip1 == $i_ip) && ($wrn > $wspams))
		{	 
usleep($sleep_rcon*2);
if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7SPAM!^6]^7!', '');
else
        rcon('clientkick '. $i_id, '');}
 
$i_namex = aaxa($i_name);
$nickr = clearnamex($i_name);
$x_nickx = clearnamex($nickr);
$x_reason = 'Spam';
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_bann = explode(" / ", $tk);
if ($game_patch != 'cod4')
{	
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','$game_patch')");
xcon('banUser '.$guid.' ^1CHAT SPAM!', '');	
}
AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[^7Ban by RCM '.$z_ver.' = Spam</font>] ");			 
++$stop_lp;  } 
    		
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED SPAM	
                    }
else {  
  rcon('say  ^6  '. $chistx . ' ^6[^7'.$noospmm.'!^6] ^1RCM '.$z_ver.'', '');
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED SPAM			
 
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'"); 
	 
  $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1");
    foreach($result as $row)
    {
		//$pl1 = $row['x_db_name'];
		$ip1 = $row['x_db_ip'];	
		$wrn = $row['x_db_warn'];	
     if (($ip1 == $i_ip) && ($wrn > $wspams))
		{	
if ($game_ac == '0'){

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7SPAM!^6]', '');
else
        rcon('clientkick '. $i_id, '');}
else { 
 
rcon('akick '. $i_id.' " ^6[^7BANNED - NO SPAM!^6]"', ''); 
}
$i_namex = aaxa($i_name);
$nickr = clearnamex($i_name);
$x_nickx = clearnamex($nickr);
$x_reason = 'Spam';
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_bann = explode(" / ", $tk);	
	if ($game_patch != 'cod4'){
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','$game_patch')");
	xcon('banUser '.$guid.' ^1CHAT SPAM!', '');	}
	AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");
AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[^7Ban by RCM '.$z_ver.' = Spam</font>] ");			 
 ++$stop_lp; } 
    }		
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED SPAM	
     }

 }	
	
//****************************************************************************************************************
//****************************************************************************************************************
//****************************************************************************************************************

if($chck_cry) 
	     {			
if ($game_ac == '0'){ 
  
  rcon('say  ^6  '. $chistx . ' ^6[^7'.$noohldd.'^6] ^1RCM '.$z_ver.' Autokicker ', '');
 AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[^7Kicked by RCM '.$z_ver.' = Cry]</font> "); 

if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7CRYING!^6]', '');
else
        rcon('clientkick '. $i_id, '');
++$stop_lp;
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED CRY			
 
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'"); 
	 
  $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1");
    foreach($result as $row)
    {
		//$pl1 = $row['x_db_name'];
		$ip1 = $row['x_db_ip'];	
		$wrn = $row['x_db_warn'];	
     if (($ip1 == $i_ip) && ($wrn > $wdislk))
		{	
if ($game_ac == '0'){
if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7CRYING!^6]', '');
else
        rcon('clientkick '. $i_id, '');}
else {  rcon('akick '. $i_id.' " ^6[^7BANNED - DONT CRY!^6]"', ''); }
$i_namex = aaxa($i_name);
$nickr = clearnamex($i_name);
$x_nickx = clearnamex($nickr);
$x_reason = 'Disliker';
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_bann = explode(" / ", $tk);	
	if ($game_patch != 'cod4'){
		xcon('banUser '.$guid.' ^1CHAT DISLIKE!', '');	
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','$game_patch')");
	}AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");			
++$stop_lp;	    } 
    }		
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED CRY

}
else {  
  rcon('say  ^6  '. $chistx . ' ^6[^7'.$noohldd.'^6] ^1RCM '.$z_ver.' Autokicker', '');
  
rcon('akick '. $i_id.' " ^6[^7Kicked by RCM '.$z_ver.' Autokicker = Dont Cry!^6]"', '');
    

/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED CRY			
 
$db4->exec("UPDATE x_db_players SET x_db_warn=x_db_warn +1 WHERE x_db_ip='{$i_ip}'"); 
	 
  $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_ip='$i_ip' LIMIT 1");
    foreach($result as $row)
    {
		//$pl1 = $row['x_db_name'];
		$ip1 = $row['x_db_ip'];	
		$wrn = $row['x_db_warn'];	
     if (($ip1 == $i_ip) && ($wrn > $wdislk))
		{	
if ($game_ac == '0'){
if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
	rcon('clientkick '. $i_id.' ^6[^7CRYING!^6]', '');
else
        rcon('clientkick '. $i_id, '');}
else {  rcon('akick '. $i_id.' " ^6[^7BANNED - DONT CRY!^6]"', ''); }
$i_namex = aaxa($i_name);
$nickr = clearnamex($i_name);
$x_nickx = clearnamex($nickr);
$x_reason = 'Disliker';
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$x_bann = explode(" / ", $tk);	
	if ($game_patch != 'cod4')
	{
$db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_reason','$datetime','$x_nickx','$game_patch')");
	xcon('banUser '.$guid.' ^1CHAT CRY!', '');	}
	AddToLog("[".$datetime."] BAN WARN: (" . $i_ip . ") (" . $i_name . ")");			
++$stop_lp;	    } 
    }		
/////////$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$/////////WARNED CRY


	}
	AddToLog("[".$datetime."] CHAT Cry KICKER: " . $i_ip . " (" . $i_name . ")  r: CHAT");
	AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> " . $nickr . " <font color='fuchsia'>[^7Kicked by RCM '.$z_ver.' = Cry]</font> ");
	++$stop_lp;		 
 }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    print ' FILE:  '.__FILE__.'  Exception : '.$e->getMessage();
  }
 
 
 
 $x_admin1 = 0;
}
}
}
}
?>
 
