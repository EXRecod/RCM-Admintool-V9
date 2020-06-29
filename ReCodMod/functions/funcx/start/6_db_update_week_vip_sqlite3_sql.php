<?php
  /////////////////////////////////////////////////WEEK STATS  
if (!empty(SqlDataBase)){

 
//////////////////   WEEK MSQL	 //////////////////////////
if(!file_exists($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_weekcday.log')){  
touch($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_weekcday.log');
touch($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_weekcronn.log');
}	
	$now   = time();
	$weekcronn = $cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_weekcronn.log'; 
	$n7 = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));
	//if ($now - filemtime($weekcronn) >= 60 * 60 * 24 * 1)
	// $n7 = 1;
 
   if($n7 == 1)
   { 
   $datedayup = date('H');
   $dateminup = date('i');
   
   if($dateminup < 3)
     {
		 
   if(($datedayup == '00')||($datedayup == '0')||($datedayup == '24'))
   { 
      if ($now - filemtime($weekcronn) >= 160)
	  {   
	  
try
  {
 $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";	 
 if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass); 
 $bdd = $msqlconnect;
 
 
 
    //$sql =   "SELECT id db_stats_week where DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= s_time and id = 1 limit 1" 
 
 
//$rex = $bdd->query("SELECT s_pg,w_port,w_guid,s_kills FROM db_stats_week WHERE w_port='".$server_port."' ORDER BY (s_kills+0) DESC LIMIT 3");
  $rex = $bdd->query("SELECT P.servername,
  P.s_pg,P.w_port,P.s_player,P.s_kills,
    P.s_deaths,P.s_heads,P.s_lasttime,C.s_guid
      FROM db_stats_week P INNER JOIN db_stats_0 C 
	     ON P.s_pg = C.s_pg WHERE P.w_port='".$svipport."' ORDER BY (s_kills+0) DESC LIMIT 3");
		 
debuglog("DEBUG: LINE: 722 SELECT P.servername,
  P.s_pg,P.w_port,P.s_player,P.s_kills,
    P.s_deaths,P.s_heads,P.s_lasttime,C.s_guid
      FROM db_stats_week P INNER JOIN db_stats_0 C 
	     ON P.s_pg = C.s_pg WHERE P.w_port='".$svipport."' ORDER BY (s_kills+0) DESC LIMIT 3");		 
 
 
$statusw ='VIP'; 
$whild = 0; 
$limitsw = 0;
 while ($row = $rex->fetch())	
{	
    $guiduplimits = $row['s_guid'];

	++$whild;
  	
	if($whild == 1)
	$limitsw = 5;
	else if($whild == 2)
	$limitsw = 3;
	else if($whild == 3)
	$limitsw = 1;

	
$date = date('Y-m-d H:i:s');
$dateend = date('Y-m-d', strtotime($date. ' + '.$limitsw.' days'));	

if($limitsw > 0)
{

$xl = $bdd->query("SELECT guid,status1,status1days,time,timeh FROM player_status where guid = '".$guiduplimits."' LIMIT 1"); 

 debuglog("DEBUG: LINE: 754 SELECT guid,status1,status1days,time,timeh FROM player_status where guid = '".$guiduplimits."' LIMIT 1");  
   
while ($jk = $xl->fetch())	
{	
  $guidylmt  = $jk['guid'];
  $status1days = $jk['status1days'];
  $statusone = $jk['status1'];
  $statusonetime = $jk['time'];
  $timeh_redetit = $jk['timeh'];
  
if(!empty($statusone)){	
 	
	if($limitsw < 7){
		
/* 
(137, 2310346615804509164, '2019-12-06 23:00:00', '2019-12-01 23:00:01', '0', 'VIP', 5, '0', 0),
(138, 2310346615385083070, '2019-12-06 23:00:00', '2019-12-01 23:00:01', '0', 'VIP', 5, '0', 0),
(139, 2310346617356412502, '2019-12-06 23:00:00', '2019-12-01 23:00:01', '0', 'VIP', 5, '0', 0),
(140, 2310346615542662404, '2019-12-04 23:00:00', '2019-12-01 23:00:01', '0', 'VIP', 3, '0', 0), 
 
  `guid` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeh` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `text` varchar(80) NOT NULL,
  `status1` varchar(24) NOT NULL,
  `status1days` mediumint(6) NOT NULL,
  `status2` varchar(24) NOT NULL,
  `status2days` mediumint(6) NOT NULL,
 
*/
	
//старая дата - новая дата	
$diff = abs(strtotime($timeh_redetit) - strtotime(date('Y-m-d H:i:s')));
$mintq = floor($diff / (60*60*24)); // время в днях		

$real_dateend = date('Y-m-d', strtotime($statusonetime. ' - '.$mintq.' days'));
$dateend = date('Y-m-d', strtotime($real_dateend. ' + '.$limitsw.' days'));

	 
if((($status1days - $mintq) + $limitsw) > 0)
    $limitqq = ($status1days - $mintq) + $limitsw;	
else
	$limitqq = $limitsw;
		
		if(!empty($guidylmt))
$bdd->query("UPDATE player_status SET time='".$dateend."', status1days='".$limitqq."' WHERE guid = '".$guiduplimits."'");
 


 debuglog("DEBUG: LINE: 754   diff:$diff / mintq:$mintq / real_dateend:$real_dateend / dateend:$dateend /  limitqq:$limitqq /  UPDATE player_status SET time='".$dateend."', status1days=status1days+'".$limitsw."' WHERE guid = '".$guiduplimits."'");
  
} 
} 
}
 
if(empty($statusone)){
if($limitsw < 7){
$dateend = date('Y-m-d', strtotime($date. ' + '.$limitsw.' days'));		
if(!empty($guiduplimits))
$bdd->query("INSERT INTO player_status (guid,time,timeh,text,status1,status1days,status2,status2days)
 VALUES ('".$guiduplimits."','".$dateend."',CURRENT_TIME(),'0','".$statusw."','".$limitsw."','0','0')");	
debuglog("DEBUG: LINE: 781 INSERT INTO player_status (guid,time,timeh,text,status1,status1days,status2,status2days)
 VALUES ('".$guiduplimits."','".$dateend."',CURRENT_TIME(),'0','".$statusw."','".$limitsw."','0','0')"); 
 }
}

$xl = null;
}

  
}	
 

 $bdd->query("TRUNCATE TABLE db_stats_week");
 
 $bdd = null;
 $rex = null;
 
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';  
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.'] 817 ' . __FILE__ . '  Exception : ' . $e->getMessage());
   }
	 
 file_put_contents($weekcronn, "-");
	
sleep(1);
    echo "\n UP WEEK STATS";
exit;	
	  }
 }}}}