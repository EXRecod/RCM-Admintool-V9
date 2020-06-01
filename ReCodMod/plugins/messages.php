<?php
if(!empty($message_center))
{
$etop = 'kills';
if ($x_rotate == 0 ) {
	
	
echo '=======msg=======';

	
	$messages = explode(';', $message_center);
	
	
foreach ($messages as $message)	
{

 if ((strpos($message, '{') !== false) && (empty($server_info_messages)))
$message = 0;

	if((strpos($message, $server_port.'#') !== false)||
	   (strpos($message, '#') === false))
	$messages[] = trim($message);
}	
	
	$messages=array_map('trim',$messages);
$datetime = date('Y.m.d H:i:s');
 if(empty($mmmsg))
$mmmsg = rand(0,count($messages)-1);

$text=array();
for($i=0;$i<1;$i++)
    { ++$mmmsg;
      
 if((count($messages)-1) < ($mmmsg-1))
 { $mmmsg = 1;}

 $ran = count($messages)-$mmmsg;

 if($ran < 0)
 { $ran = 0;
$mmmsg = 1;}

if(!in_array($messages[$ran],$text))
{$text[]=$messages[$ran];}else{$i--;}}
 $pst = 0;
foreach($text as $message) {
 $tct[$pst] = $message;
 ++$pst;
}

if(empty($message))
{
	
if(!empty($tct[0]))
{	
 if ((strpos($tct[0], '{') !== false) && (empty($server_info_messages)))	
$message = $tct[1];	 
 }
 else if(!empty($tct[1]))
{	
 if ((strpos($tct[1], '{') !== false) && (empty($server_info_messages)))
$message = $tct[0];	 
 }
 
}



if(!empty($message)){
if((strpos($message, '#') !== false)&&(strpos($message, $server_port) !== false))
echo 'msg server '.$server_port;
else if(strpos($message, '#') === false)
echo 'msg server '.$server_port;
else
$message = 0;

if(!empty($message))
$message = substr($message, strrpos($message, '#')+1);

echo $message.' '.$server_port;
}	






























if(!empty($message)){

 if ((strpos($servers_info_messages, '{') !== false) && (!empty($server_info_messages)))
{


 	
  list($iXSDF, $SERVERINFO) = explode('[SERVERINFO]', trim($servers_info_messages));
 

$mess = explode('#', $servers_info_messages);

		$xmde = 0;   
        $x          = 0;
foreach ($mess as $mms)	
{
 

	if(strpos($mms, ':') !== false)
	{



  list($ipzc, $port) = explode(':', trim($mms));
  $servex3x = $ipzc;
  $server = $ipzc;

echo " \n\n ip:".$ipzc.' port:'.$port;
  
sleep(80000);
$status      = new COD4xServerStatus($servex3x, $port);
            if ($status->getServerStatus())
              {
                $status->parseServerData();
                $serverStatus = $status->returnServerData();
                $players      = $status->returnPlayers();
                $pings        = $status->returnPings();
                $scores       = $status->returnScores();
                $playerzcc    = 0;
                foreach ($players as $i => $v)
                  {
                    //$i_name = $players[$i];
                    //$i_ip   = $scores[$i];
                    //$i_ping = $pings[$i];
                    $playerzcc++;
                  }
              
            if (empty($serverStatus['sv_hostname']))
                $server_name[$xmde] = $serverStatus['sv_hostname'] = 'Offline';
            if (empty($serverStatus['mapname']))
                $server_mapname[$xmde] = $serverStatus['mapname'] = 'n/a';
            if (empty($serverStatus['g_gametype']))
                $server_gametype[$xmde] = $serverStatus['g_gametype'] = 'n/a';
            if (empty($serverStatus['_Maps']))
                $servermapsinf[$xmde] = $serverStatus['_Maps'] = 'n/a';
            if (empty($serverStatus['sv_maxclients']))
                $server_max_players[$xmde] = $serverStatus['sv_maxclients'] = 'n/a';
            if (empty($server_cur_players[$xmde]))
                $server_cur_players[$xmde] = '0';
            if (empty($playerzcc))
                $playerzcc = '0';
            if (!empty($serverStatus['sv_hostname']))
              {
				  
                 $server_name[$xmde] = $serverStatus['sv_hostname'];
                 $server_mapname[$xmde] = $serverStatus['mapname'];
                 $server_gametype[$xmde] = $serverStatus['g_gametype'];
                 $servermapsinf[$xmde] = $serverStatus['_Maps'];
                 $server_cur_players[$xmde] = $playerzcc;
                 $server_max_players[$xmde] = $serverStatus['sv_maxclients'];
              		
		        echo ' * ' . $ipzc[$xmde];
                echo ' * ' . $server_name[$xmde];
                echo ' * ' . $server_mapname[$xmde];
                echo ' * ' . $server_gametype[$xmde];
                echo ' * ' . $servermapsinf[$xmde];
                echo ' * ' . $server_cur_players[$xmde];
                echo ' * ' . $server_max_players[$xmde];
                echo "\n ";
			   
			}

  
     $patterns = array();
$patterns[0] = '/{SERVER_IP}/';
$patterns[1] = '/{SERVER_NAME}/';
$patterns[2] = '/{SERVER_CURRENT_PLAYERS}/';
$patterns[3] = '/{SERVER_MAX_PLAYERS}/';
$patterns[4] = '/{SERVER_MAPNAME}/';
$patterns[5] = '/{SERVER_GAMETYPE}/';

$replacements = array();
$replacements[5] = $ipzc[$xmde];
$replacements[4] = $server_name[$xmde];
$replacements[3] = $server_cur_players[$xmde];
$replacements[2] = $server_max_players[$xmde];
$replacements[1] = $server_mapname[$xmde];
$replacements[0] = $server_gametype[$xmde];
$vvv = preg_replace($patterns, $replacements, trim($SERVERINFO));		  


		  
		 echo '*** '.meessagee($vvv);	
++$xmde;
	

	xcon('say ^6 '.$vvv, '');
	
	          $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_exec1_".$server_ip."_".$server_port);
               if ($stime - $cron_time >= $msg_pause*50)
                {
               
			   file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_exec1_".$server_ip."_".$server_port, "");
              
			 }
echo " \n\n [".$datetime."] Message -> ".meessagee($vvv)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
++$x_rotate; 	
}
    }

}
require $cpath . 'ReCodMod/functions/null';
}

else if (strpos($message, 'top_week') !== false)
{
	$message =  "top_week";
	
try
  {
 if(empty($Msql_support))
{
 
		$dbw3  = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/dbw3.sqlite');
                
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $dbw3 = $msqlconnect;
 
  
   
   }
    $result = $dbw3->query("SELECT * FROM db_stats_week WHERE s_kills>=$limm and w_port='$svipport' ORDER BY (s_kills+0) DESC LIMIT 3");
 		$number = 0;
		
	  
	  rcon("say  ^3[ ^6".$week_top." 3 ^7by ^1".$etop." ^7& ^2".$played_top."^3]", "");	
		
		
    foreach($result as $row)
    {
        $playername = 	$row['s_player'];
	      $ipm = 			$row['s_kills'];
                $k  = 	$row['s_lasttime'];	
                $r  = 	$row['s_time'];

 $lasttime = $k;
 $time =$r;
 
 
 if (strpos($lasttime, '-') !== false){
 if (strpos($time, '-') !== false){
   $datetime1 = date_create($lasttime);
   $datetime2 = date_create($time);
   $interval = date_diff($datetime1, $datetime2);
   $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
   $played = cleart($playedp);
 }}
 
 
 if(empty($played))
     $info_play = '';
 else
	 $info_play = $played;
   
   
	
	  rcon("say ^3[^6". ++$number."^3] ^7 ".html_entity_decode($playername)."^0 : ^1".substr($ipm, 0,8)." ^2".$info_play, "");
	
	}
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	

echo " \n\n [".$datetime."] Message -> ".meessagee($message)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
++$x_rotate;


}

else if (strpos($message, 'top_day') !== false)
{
	$message =  "top_day";
	
try
  {
 if(empty($Msql_support))
{
 
		$dbm3  = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/dbm3.sqlite');
                
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $dbm3 = $msqlconnect;
 
   }
    
	$result = $dbm3->query("SELECT * FROM db_stats_day WHERE s_kills>=$limm and w_port='$svipport' ORDER BY (s_kills+0) DESC LIMIT 3");
	
	
 		$number = 0;
		
	  
	  rcon("say  ^3[ ^6".$day_top." 3 ^7by ^1".$etop." ^7& ^2".$played_top."^3]", "");
		
		
    foreach($result as $row)
    {
        $playername = 	$row['s_player'];
	      $ipm = 			$row['s_kills'];
                $k  = 	$row['s_lasttime'];	
                $r  = 	$row['s_time'];

 $lasttime = $k;
 $time =$r;
 
 
 if (strpos($lasttime, '-') !== false){
 if (strpos($time, '-') !== false){
   $datetime1 = date_create($lasttime);
   $datetime2 = date_create($time);
   $interval = date_diff($datetime1, $datetime2);
   $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
   $played = cleart($playedp);
 }}
 
 
 if(empty($played))
     $info_play = '';
 else
	 $info_play = $played;
   
   
	
	  rcon("say ^3[^6". ++$number."^3] ^7 ".html_entity_decode($playername)."^0 : ^1".substr($ipm, 0,8)." ^2".$info_play, "");
	
	}
require $cpath . 'ReCodMod/functions/null_db_connection.php'; 
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	

echo " \n\n [".$datetime."] Message -> ".meessagee($message)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
++$x_rotate;


}

  
else if (strpos($message, 'top_skill') !== false)
{
	$message =  "top_skill";
	
try
  {
 if(empty($Msql_support))
{
 
		$db3  = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/db3.sqlite');
                
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db3 = $msqlconnect;
 
   }

  $result = $db3->query("SELECT P.servername,
  P.s_pg,P.s_port,P.s_player,P.s_lasttime,P.s_time,
  C.s_pg,C.w_skill
      FROM db_stats_0 P INNER JOIN db_stats_2 C 
	     ON P.s_pg = C.s_pg where P.s_port = '".$svipport."' ORDER BY (w_skill+0) DESC LIMIT 3");	
	 
 		$number = 0;
		
	  
	  rcon("say  ^3[ ^6".$stats_top." 3 ^7by ^1".$stats_skill." ^7& ^2".$played_top."^3]", "");
	 
    foreach($result as $row)
    {
        $playername = 	$row['s_player'];
	      $ipm = 		$row['w_skill'];
                $k  = 	$row['s_lasttime'];	
                $r  = 	$row['s_time'];

 $lasttime = $k;
 $time =$r;
 
 
 if (strpos($lasttime, '-') !== false){
 if (strpos($time, '-') !== false){
   $datetime1 = date_create($lasttime);
   $datetime2 = date_create($time);
   $interval = date_diff($datetime1, $datetime2);
   $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
   $played = cleart($playedp);
 }}
 
 
 if(empty($played))
     $info_play = '';
 else
	 $info_play = $played;
   
   
	
	  rcon("say ^3[^6". ++$number."^3] ^7 ".html_entity_decode($playername)."^0 : ^1".substr($ipm, 0,8)." ^2".$info_play, "");
	
	}

require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	

echo " \n\n [".$datetime."] Message -> ".meessagee($message)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
++$x_rotate;


}


else if (strpos($message, 'today') !== false)
{
	$message =  "today";
	
try
  {
 if(empty($Msql_support))
{
 
		$db3  = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/db3.sqlite');
                
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass); $db3 = $msqlconnect;
 
   }
    
$today = date("Y-m-d");	  
$sql='SELECT COUNT(*) AS id FROM db_stats_0 where s_lasttime LIKE :today';
$reponse=$db3->prepare($sql);
$reponse->bindValue(':today','%'.$today.'%');
$reponse->execute();
$number_of_rows = $reponse->fetchColumn();

 		$number = 0;
		
	  
	  rcon("say  ^3[ ^6".$ntodayz." ^7".$number_of_rows." ^3]", "");
	
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	

echo " \n\n [".$datetime."] Message -> ".meessagee($message)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
++$x_rotate;


}
















else if (strpos($message, 'top_total') !== false)
{
	$message =  "top_total";
	
try
  {
 if(empty($Msql_support))
{
 
		$db3  = new PDO('sqlite:' . $cpath .  'ReCodMod/databases/db3.sqlite');
                
} 
else
   {      
    
	$dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass, $opt); $db3 = $msqlconnect;
 
   }
    
	
	//$result = $db3->query("SELECT * FROM db_stats_1 WHERE s_kills>=$limm and s_port='$svipport' ORDER BY (s_kills+0) DESC LIMIT 3");
	 
  	  $result = $db3->query('SELECT t1.*, t2.* from db_stats_0 t1 join 
 (select * from db_stats_1) 
 t2 ON t1.s_pg = t2.s_pg where t1.s_port="'.$svipport.'"
 ORDER BY (t2.s_kills+0)  DESC LIMIT 3');	
	
	
	
 		$number = 0;
		
	  
	  rcon("say  ^3[ ^6".$stats_top." 3 ^7by ^1".$etop." ^7& ^2".$played_top."^3]", "");	
		
		
    foreach($result as $row)
    {
        $playername = 	$row['s_player'];
	      $ipm = 			$row['s_kills'];
                $k  = 	$row['s_lasttime'];	
                $r  = 	$row['s_time'];

 $lasttime = $k;
 $time =$r;
 
 
 if (strpos($lasttime, '-') !== false){
 if (strpos($time, '-') !== false){
   $datetime1 = date_create($lasttime);
   $datetime2 = date_create($time);
   $interval = date_diff($datetime1, $datetime2);
   $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
   $played = cleart($playedp);
 }}
 
 
 if(empty($played))
     $info_play = '';
 else
	 $info_play = $played;
   
   
	
	  rcon("say ^3[^6". ++$number."^3] ^7 ".html_entity_decode($playername)."^0 : ^1".substr($ipm, 0,8)." ^2".$info_play, "");
	
	
	}
require $cpath . 'ReCodMod/functions/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	

echo " \n\n [".$datetime."] Message -> ".meessagee($message)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
++$x_rotate;


}





else if (strpos($message, 'next_map') !== false)
{		  
			  

 //for ($i=0; $i<1; $i++) 
	{
//require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 



require $cpath.'ReCodMod/functions/getinfo/sv_mapRotation.php';
fclose($connx);	

 //$emaprun - current map
 //$mapsxc - current game type and map rotation.
 if(empty($emaprun)) {
$status = new COD4xServerStatus($server_ip, $server_port);
                if ($status->getServerStatus())
                 {
                  $status->parseServerData();
					$serverStatus = $status->returnServerData(); 				  
   if(empty($emaprun))               
echo $emaprun = $serverStatus['mapname'];
                 }
}
 

 
if (preg_match('/\b'.$emaprun.'\b\s\b(.+)/iu', $mapsxc, $match)) {
	$mapnamekl = explode(trim($emaprun), $mapsxc);
        $mapnamekl[1] = preg_replace("/\b[a-z]{1,4}\b/iu", "", $mapnamekl[1]);
	$lll = preg_replace("/\W*\b/iu", "%%", $mapnamekl[1]);
        $emaprunln = explode('%%%%', $lll);
echo "  next map";

if(!empty($emaprunln[1]))
  echo '---> '.$emaprunl = $emaprunln[1];}
//else if(!empty($emaprunln[0]))
//	$emaprunl = $emaprunln[0];
else
{
 if(!empty($serverxmap))
$emaprunl = sevenofff($serverxmap);
 else if(!empty($hhjkc[1]))
$emaprunl = $hhjkc[1];
}


if(empty($emaprunl))
	$emaprunl = 'Unknown';
 

rcon('say '.$infoomnxtt.' ^7'. maprename($emaprunl).'', '');
++$x_number;	
++$x_return;
 

//}   
  }	  
	
        ++$x_number;
        echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
        ++$x_stop_lp; //return;	
}		   






else
{
 


if(!empty($message)){

	rcon('say ^7'.$message, '');
	
              $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_msg_".$server_ip."_".$server_port);
              if ($stime - $cron_time >= $msg_pause*50)
               {
                file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_msg_".$server_ip."_".$server_port, "");	
//AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='red'>" .meessagee($message)."</font>");
			   }

echo " \n\n [".$datetime."] Message -> ".meessagee($message)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
}
++$x_rotate;

 
}
}
    slowscript(__FILE__);
   $fin = microtime(true) - $start;
if($fin > 4.0)
{
require $cpath . 'ReCodMod/functions/null.php';
exit;	
}
$x_rotate = 56800;
}}
?>
