<?php

if ((strpos($msgr, $ixz.'reset me') !== false)||(strpos($msgr, $ixz.'rm') !== false))
    { 


//$resetmystats = 0;


 if (empty($x_stop_lp)) {
if(!empty($guidn)){
$shidx = trim($server_port.$guidn);	
$nothnkjdk = dbGuid(4).(abs(hexdec(crc32($shidx))));	
}else $nothnkjdk = 'nullllll';
  	  
try
  {  
if(empty($Msql_support))
{
                
 $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');

} 
else
   {      
    
	$dsn = "mysql:host=".$host_adress.";dbname=".$db_name.";charset=".$charset_db."";
 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db3 = $msqlconnect;
	
   }
   
     $today = getdate();
     $tyear = $today['year'];
	 $mmonth = $today['mon'];
	 // $mday = $today['mday'];
     $tyear = str_replace("20", "", $tyear);
	 $tdayear = $tyear.$mmonth;
	 
$guidreversed = 0;

////////////////revers 
for($i=0;$i<strlen($guidn);$i++)
	$arguidn[]=$guidn[$i];

$arguidn = array_reverse($arguidn);
$comarr = implode(",", $arguidn);
$guidreversed = str_replace(",", "", $comarr);	
$guidreversed = str_replace($guidn, "", $guidreversed);
echo   "\n ",$guidreversed = trim($guidreversed);
////////////////revers 

$datetime  = date('Y-m-d H:i:s');
	
	//AddToLogInfo("[".$datetime."]TRY RESET user: (" . $nothnkjdk . ") ( REVERSE GUID " . $guidreversed . ") ( GUID " . $guidn . ")");	
	
	//нашли
    $sql = "SELECT s_pg,s_guid,s_port,s_lasttime FROM db_stats_0 WHERE s_guid=".$guidreversed." and s_port=".$svipport." LIMIT 1";
    $result = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
  
	$dtcctd = 0;
	
if (!empty($result)){
foreach ($result as $key => $value) 
{
    if ($key == 's_pg')
        $dtcctd = $value;
    if ($key == 's_lasttime')
        $lastgame = $value;														
	
}}
 
	 
  if(!empty($lastgame))
  {
	$ftime=strtotime($lastgame);
     $fmonth=date("m",$ftime);
     $fyear=date("Y",$ftime);
	// $fday=date("d",$ftime);
	 
	 if($mmonth != $fmonth)
	    $dtcctd = 3;	 
  } 
	 // 8 левых нулей
	 $strinday = $today[0].'00000000';
	 
	if(strlen($strinday) > 18)
	   $strinday = mb_strimwidth($strinday, 0, 18, "");
		

	if(empty($dtcctd))
	{
    $db3->query("UPDATE db_stats_0 SET s_pg=".$strinday.", s_guid=".$guidreversed." WHERE s_pg=".$nothnkjdk."");
    $db3->query("UPDATE db_stats_1 SET s_pg=".$strinday." WHERE s_pg=".$nothnkjdk."");
	  usleep(12000);
    $db3->query("UPDATE db_stats_2 SET s_pg=".$strinday." WHERE s_pg=".$nothnkjdk."");
    $db3->query("UPDATE db_stats_3 SET s_pg=".$strinday." WHERE s_pg=".$nothnkjdk."");
      usleep(12000);
    $db3->query("UPDATE db_stats_4 SET s_pg=".$strinday." WHERE s_pg=".$nothnkjdk."");
    $db3->query("UPDATE db_stats_5 SET s_pg=".$strinday." WHERE s_pg=".$nothnkjdk."");
	  usleep(12000);
    $db3->query("UPDATE db_stats_hits SET s_pg=".$strinday." WHERE s_pg=".$nothnkjdk."");	
	 
	xcon('tell '.$idnum.' ^6[^1R^3bot^6] ^3SUCCESS - RESET FROM THE DATA BASE! ['.$guidreversed.' PG: '.$dtcctd.']', '');
  	AddToLogInfo("[".$datetime."] RESET user: (" . $nothnkjdk . ") (" . $idnum . ") (" . $msgr . ")");		
	} 
	else if($dtcctd == 3)
	{
	xcon('tell '.$idnum.' ^6[^1R^3bot^6] ^6FOR YOUR ARCHIVE DELETE USE !afail', '');	
	AddToLogInfo("[".$datetime."] DO NOT RESET !afail: (" . $nothnkjdk . ") (" . $idnum . ") (" . $msgr . ")");	
	}	
	else
	{ 
	xcon('tell '.$idnum.' ^6[^1R^3bot^6] ^6FAILED (RESET ONCE A MONTH)!', '');	
	AddToLogInfo("[".$datetime."] DO NOT RESET user: (" . $nothnkjdk . ") (" . $idnum . ") (" . $msgr . ")");
	}
	
	
 //$resetmystats = 1;    
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
                    					
unset($arguidn);   
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
  $x_stop_lp = 2;
 }	
 }	
  	




if ((strpos($msgr, $ixz.'data') !== false)||(strpos($msgr, $ixz.'b2b') !== false))
    { 


//$resetmystats = 0;


 if (empty($x_stop_lp)) {
if(!empty($guidn)){
$shidx = trim($server_port.$guidn);	
$nothnkjdk = dbGuid(4).(abs(hexdec(crc32($shidx))));	
}else $nothnkjdk = 'nullllll';
  	  
try
  {  
if(empty($Msql_support))
{
                
 $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');

} 
else
   {      
    
	$dsn = "mysql:host=".$host_adress.";dbname=".$db_name.";charset=".$charset_db."";
 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db3 = $msqlconnect;
	
   }
   
     $today = getdate();
     $tyear = $today['year'];
	 $mmonth = $today['mon'];
	 $mday = $today['mday'];
     $tyear = str_replace("20", "", $tyear);
	 $tdayear = $tyear.$mmonth;
	 
$guidreversed = 0;

////////////////revers 
for($i=0;$i<strlen($guidn);$i++)
	$arguidn[]=$guidn[$i];

$arguidn = array_reverse($arguidn);
$comarr = implode(",", $arguidn);
$guidreversed = str_replace(",", "", $comarr);	
$guidreversed = str_replace($guidn, "", $guidreversed);
$guidreversed = trim($guidreversed);
////////////////revers 

$datetime  = date('Y-m-d H:i:s');
	
	//AddToLogInfo("[".$datetime."]TRY RESET user: (" . $nothnkjdk . ") ( REVERSE GUID " . $guidreversed . ") ( GUID " . $guidn . ")");	
	
	//нашли
    $sql = "SELECT s_pg,s_port,s_guid,s_lasttime FROM db_stats_0 WHERE s_guid=".$guidreversed." and s_port=".$svipport." LIMIT 1";
    $result = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
  
	$dtcctd = 0;
	
if (!empty($result)){
foreach ($result as $key => $value) 
{
    if ($key == 's_pg')
        $dtcctd = $value;
    if ($key == 's_lasttime')
        $lastgame = $value;														
	
}}	  
	  

	 
  if(!empty($lastgame))
  {
	$ftime=strtotime($lastgame);
     $fmonth=date("m",$ftime);
     $fyear=date("Y",$ftime);
	 $fday=date("d",$ftime);
	 if($mday != $fday)
     {
	if(!empty($dtcctd))
	{

    $db3->query("DELETE FROM db_stats_0 WHERE s_pg = '$nothnkjdk' limit 1");
	$db3->query("DELETE FROM db_stats_1 WHERE s_pg = '$nothnkjdk' limit 1");
	$db3->query("DELETE FROM db_stats_2 WHERE s_pg = '$nothnkjdk' limit 1");
	$db3->query("DELETE FROM db_stats_3 WHERE s_pg = '$nothnkjdk' limit 1");
	$db3->query("DELETE FROM db_stats_4 WHERE s_pg = '$nothnkjdk' limit 1");	
	$db3->query("DELETE FROM db_stats_5 WHERE s_pg = '$nothnkjdk' limit 1");
    $db3->query("DELETE FROM db_stats_hits WHERE s_pg = '$nothnkjdk' limit 1");		
		
		
		
    $db3->query("UPDATE db_stats_0 SET s_pg=".$nothnkjdk.", s_guid=".$guidn." WHERE s_pg=".$dtcctd."");
    $db3->query("UPDATE db_stats_1 SET s_pg=".$nothnkjdk." WHERE s_pg=".$dtcctd."");
	  usleep(12000);
    $db3->query("UPDATE db_stats_2 SET s_pg=".$nothnkjdk." WHERE s_pg=".$dtcctd."");
    $db3->query("UPDATE db_stats_3 SET s_pg=".$nothnkjdk." WHERE s_pg=".$dtcctd."");
      usleep(12000);
    $db3->query("UPDATE db_stats_4 SET s_pg=".$nothnkjdk." WHERE s_pg=".$dtcctd."");
    $db3->query("UPDATE db_stats_5 SET s_pg=".$nothnkjdk." WHERE s_pg=".$dtcctd."");
	  usleep(12000);
    $db3->query("UPDATE db_stats_hits SET s_pg=".$nothnkjdk." WHERE s_pg=".$dtcctd."");	
	 
	xcon('tell '.$idnum.' ^6[^1R^3bot^6] ^3SUCCESS - backup FROM THE DATA BASE! ['.$guidn.' PG: '.$dtcctd.']', '');
  	AddToLogInfo("[".$datetime."] RESET user: (" . $nothnkjdk . ") (" . $idnum . ") (" . $msgr . ")");		
	}
	else
		xcon('tell '.$idnum.' ^6[^1R^3bot^6] ^3FAIL! - try backup next month (30 days limit)! ['.$guidn.' PG: '.$dtcctd.']', '');
	
	
  }  
 } 	


	

 //$resetmystats = 1;    
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
                    					
unset($arguidn);   
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
  $x_stop_lp = 2;
 }	
 }	






if ((strpos($msgr, $ixz.'afail') !== false)||(strpos($msgr, $ixz.'af') !== false))
    { 
 if (empty($x_stop_lp)) {
if(!empty($guidn)){
$shidx = trim($server_port.$guidn);	
$nothnkjdk = dbGuid(4).(abs(hexdec(crc32($shidx))));	
}else $nothnkjdk = 'nullllll';
  	  
try
  {  
if(empty($Msql_support))
{
                
 $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');

} 
else
   {      
	$dsn = "mysql:host=".$host_adress.";dbname=".$db_name.";charset=".$charset_db."";
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db3 = $msqlconnect;
   }
   
   
    $today = getdate();
     $tyear = $today['year'];
	 $mmonth = $today['mon'];
	 // $mday = $today['mday'];
     $tyear = str_replace("20", "", $tyear);
	 $tdayear = $tyear.$mmonth;
	 
$guidreversed = 0;

////////////////revers 
for($i=0;$i<strlen($guidn);$i++)
	$arguidn[]=$guidn[$i];

$arguidn = array_reverse($arguidn);
$comarr = implode(",", $arguidn);
$guidreversed = str_replace(",", "", $comarr);	
$guidreversed = str_replace($guidn, "", $guidreversed);
$guidreversed = trim($guidreversed);
////////////////revers 

$datetime  = date('Y-m-d H:i:s');
	
	//AddToLogInfo("[".$datetime."]TRY RESET user: (" . $nothnkjdk . ") ( REVERSE GUID " . $guidreversed . ") ( GUID " . $guidn . ")");	
	
	//нашли
    $sql = "SELECT s_pg,s_port,s_guid,s_lasttime FROM db_stats_0 WHERE s_guid=".$guidreversed." and s_port=".$svipport." LIMIT 1";
    $result = $db3->query($sql)->fetch(PDO::FETCH_LAZY);
  
	$dtcctd = 0;
	
if (!empty($result)){
foreach ($result as $key => $value) 
{
    if ($key == 's_pg')
        $dtcctd = $value;
    if ($key == 's_lasttime')
        $lastgame = $value;														
	
}}	
	 $dtcctdx  = $dtcctd;

	 
  if(!empty($lastgame))
  {
	$ftime=strtotime($lastgame);
     $fmonth=date("m",$ftime);
     $fyear=date("Y",$ftime);
	// $fday=date("d",$ftime);
	 
	 if($mmonth != $fmonth)
	    $dtcctd = 3;	 
  }  
	 
   
  if($dtcctd == 3)
  {
    $db3->query("DELETE FROM db_stats_0 WHERE s_pg = '$dtcctdx' limit 1");
	$db3->query("DELETE FROM db_stats_1 WHERE s_pg = '$dtcctdx' limit 1");
	$db3->query("DELETE FROM db_stats_2 WHERE s_pg = '$dtcctdx' limit 1");
	$db3->query("DELETE FROM db_stats_3 WHERE s_pg = '$dtcctdx' limit 1");
	$db3->query("DELETE FROM db_stats_4 WHERE s_pg = '$dtcctdx' limit 1");	
	$db3->query("DELETE FROM db_stats_5 WHERE s_pg = '$dtcctdx' limit 1");
    $db3->query("DELETE FROM db_stats_hits WHERE s_pg = '$dtcctdx' limit 1");
	
	xcon('tell '.$idnum.' ^6[^1RCM^3bot^6] ^3OK - YOU ARE DELETED ARCHIVE!', '');
  	AddToLogInfo("[".$datetime."] DELETE self user: (" . $nothnkjdk . ") (" . $idnum . ") (" . $msgr . ")");		
  }
  else
  {
   
   xcon('tell '.$idnum.' ^6[^1RCM^3bot^6] ^3TRY DO THAT IN NEXT MONTH!', '');
  
  }	  
     
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
  $x_stop_lp = 2;
 }	
 }

/*
	
	
if (strpos($msgr, $ixz.'like') !== false)
    { 
 if ($x_stop_lp == 0 ) {
if(!empty($guidn)){
$shidx = trim($server_port.$guidn);	
$nothnkjdk = abs(hexdec(crc32($shidx)));	
}else $nothnkjdk = 'nullllll';
  	  
try
  {
  

  
if(empty($Msql_support))
{
                
 $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');

} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db3 = $msqlconnect;
	
   }
 

 if(!empty($serverxmap))
	 $xmaprun = $serverxmap;
 if(!empty($emaprun))
 	 $xmaprun = $emaprun;
 
	rcon('tell '.$idnum.' ^6[^1RCM^3bot^6] ^7OK - YOU ARE DELETED FROM THE DATA BASE!', '');
  	
	AddToLogInfo("[".$datetime."] DELETE self user: (" . $nothnkjdk . ") (" . $idnum . ") (" . $msgr . ")"); 
++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
                    					
   
 
$db3 = NULL;
 
 
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
  $x_stop_lp = 2;
 }	
 }	
*/	
	

?>
 

