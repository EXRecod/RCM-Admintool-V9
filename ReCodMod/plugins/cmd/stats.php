<?php
     
if (empty($x_stop_lp)) { 
        if (strpos($msgr, ixz . 'sk') !== false)  {
 
 $skill = txt_db($server_ip,$server_port,$guidn,'score','skill',0);
if(!empty($skill))
{
 		
	  try {
                        if (empty(SqlDataBase)) {
                            $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                        
						
						  
                          		$skill = txt_db($server_ip,$server_port,$guidn,'score','skill',0);
                                $kills = txt_db($server_ip,$server_port,$guidn,'score','kills',0);
                                $deaths = txt_db($server_ip,$server_port,$guidn,'score','deaths',0);
								
	       
                                $result = $db3->query("SELECT * FROM db_stats_2 WHERE s_pg='$conisq' ORDER BY (w_place+0) DESC LIMIT 1");
                             							
                            foreach ($result as $row) {
                                 
                                $pla   = $row['s_place']; 
                            }
							
							
							if(empty($pla))
								$pla = '?';
							    $kills = 0;
							    $deaths = 0;
							if(!empty($stats_array[$conisq]['scores;kills'])) 
									$kills =  $stats_array[$conisq]['scores;kills'];
                            if(!empty($stats_array[$conisq]['scores;deaths'])) 
									$deaths =  $stats_array[$conisq]['scores;deaths'];								
								 
								 
							$z = get_skill_from_log($conisq, $server_ip, $server_port);
							  
							
						     if (empty($z))
							 {
								if(!empty($stats_array[$conisq]['scores;skill'])) 
									$skill =  $stats_array[$conisq]['scores;skill'];
							 }	 
								$skill = 1000;
                           
                
                                    rcon("say ^7" . $nickr . " ^1Top:^2" . $pla . " ^1Skill:^2 " . $skill . " ^1 Kills:^2" . $kills . " ^1 Deaths:^2" . $deaths . " ^1Ratio:^2 " . substr(($kills/$deaths), 0, 8) . "", "");
                                ++$x_number;
                                AddToLogInfo("[" . $datetime . "] SKILL: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: S");
                                echo '    ' . $tfinishh = (microtime(true) - $start);
                                ++$x_stop_lp; //return;
                             
                         						
						
						
						
						
						} else {
                            $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
                            if (empty($msqlconnect))
                                $msqlconnect = new PDO($dsn, db_user, db_pass);
                            $db3 = $msqlconnect;		
			 
                                    $result = $db3->query("SELECT sort, w_skill
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_1.s_kills,db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
          INNER JOIN db_stats_0
          ON db_stats_1.s_pg = db_stats_0.s_pg
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_2.s_port = $svipport and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $conisq");
                              
							 
                            foreach ($result as $row) {
                                $skil_x = $row['w_skill']; 
                                    $player_place_skill = $row['sort']; 
                            }							 
							


							if(empty($player_place_skill))
								$player_place_skill = '?';
							$z = 0;
							    $kills = 0;
							    $deaths = 0;
							if(!empty($stats_array[$conisq]['scores;kills'])) 
									$kills =  $stats_array[$conisq]['scores;kills'];
                            if(!empty($stats_array[$conisq]['scores;deaths'])) 
									$deaths =  $stats_array[$conisq]['scores;deaths'];								
								 
								 
							$z = get_skill_from_log($conisq, $server_ip, $server_port);
							  
							
						     if (empty($z))
							 {  $z = 1000;
								if(!empty($stats_array[$conisq]['scores;skill'])) 
									$skill =  $stats_array[$conisq]['scores;skill'];
							 }	 
								$skill = 1000;
                                 
							
							 
                                
								
                                rcon("say  ^6[^3!sk^6] ^7" . $nickr . " ^1Place:^3[" . $player_place_skill . "] ^1" . $infoosklll . ":^2 " . $skill . "", "");
                              }
                            ++$x_number;
                            AddToLogInfo("[" . $datetime . "] SKILL: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: S");
                            echo '    ' . $tfinishh = (microtime(true) - $start);
                            ++$x_stop_lp; //return;
                       
                        require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
                    }
                    catch (PDOException $e) {
                        errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
                    }
					
					
					
 } else {
                            
							if (strpos($game_patch, 'cod1_1.1') !== false)
							rcon("say  ^3" . $stsnoskl, "");	
							else
                            rcon("tell " . $idnum . "  ^3" . $stsnoskl, "");
                            echo '    ' . $tfinishh = (microtime(true) - $start);
                            ++$x_stop_lp; //return;
                        }					
 }					
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if (strpos($msgr, ixz . "stats") !== false) { 
								$skill = txt_db($server_ip,$server_port,$guidn,'score','skill',0);
                                echo '='.$kills = txt_db($server_ip,$server_port,$guidn,'score','kills',0);
                               echo '='.$deaths = txt_db($server_ip,$server_port,$guidn,'score','deaths',0);	
			if(!empty($kills))
			{
             if((!empty($kills))&&(!empty($deaths)))
			 {
                $ratiokd = $kills/$deaths; 
				$ratiokd = substr(($ratiokd), 0, 8);
			 }
			else
				$ratiokd = 0;
  				
            if (strpos($game_patch, 'cod1_1.1') !== false)
				 //rcon("say ^1" . $infootop . ":^2" . $place_ontop . " ^1" . $infoorank . ":^2 " . $skill . " ^1" . $infoofrag . ":^2" . $kills . " ^1" . $infoodth . ":^2" . $deaths . " ^1" . $infoortio . ":^2 " . substr(($kills/$deaths), 0, 8) . " ^6" . website, "");
			     //rcon("tell " . $idnum . " ^1" . $infootop . ":^2" . $place_ontop . " ^1" . $infoorank . ":^2 " . $skill . " ^1" . $infoofrag . ":^2" . $kills . " ^1" . $infoodth . ":^2" . $deaths . " ^1" . $infoortio . ":^2 " . substr(($kills/$deaths), 0, 8) . " ^6" . website, "");
				 
				 rcon("say ^1 " . $infoorank . ":^2 " . $skill . " ^1" . $infoofrag . ":^2" . $kills . " ^1" . $infoodth . ":^2" . $deaths . " ^1" . $infoortio . ":^2 " . $ratiokd . " ^6" . website, "");
            else
			     rcon("tell " . $idnum . " ^1" . $infoorank . ":^2 " . $skill . " ^1" . $infoofrag . ":^2" . $kills . " ^1" . $infoodth . ":^2" . $deaths . " ^1" . $infoortio . ":^2 " .$ratiokd . " ^6" . website, "");
          
            }
             else{ if (strpos($game_patch, 'cod1_1.1') !== false)
									 rcon("say ^3" . $stsnoskl, "");
									else
                                    rcon("tell " . $idnum . "  ^3" . $stsnoskl, "");
								}
			
            }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		








$rules_msgg_cmd = true;	 ////////
  
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////down old ////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ($x_stop_lp == 0 ) {
	
$rules_msgg_cmd = true;	 ////////
 if ((strpos($msgr, ixz.'n ') !== false) && ($x_number != 1))
    { 

$x_nickx = clearnamex($nickr);

 list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
$i_namex = clearSymbols($i_name);	
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$kski = explode(" / ", $tk); 
	  if($kski[0] == $x_idn) 
	     {

 try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
    
	$result = $db3->query("SELECT * FROM db_stats_1 WHERE s_pg='$conisq'  LIMIT 1");	
 $number = 0;
    foreach($result as $row)
    {	 	
	    $kl  = 	$row['s_kills'];
		$dth = 	$row['s_deaths'];
		$ply = 	$row['s_clear'];
		$yhu = $row['s_place'];
	}	
	
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	
	
if(!empty($ply))
	  {
echo '    '.$tfinishh = (microtime(true) - $start);		
++$x_stop_lp;    //return;
      }	
if ($kl <= 0 || $dth <= 0){  }else{	 	  
$skil_x = round((pow($kl,0.2)*($kl/$dth)*10));
$ratio_x = ($kl/$dth);

require $cpath . 'ReCodMod/functions/core/cod_rcon.php';
                            foreach ($rconarray as $oneline => $e) {
                                //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                                	
  
  rcon("say  ^3".$ply." ^1".$infootop.": ^2".$yhu." ^1".$infoorrnk.":^2  ".$skil_x." ^1 ".$infoofrag.":^2 ".$kl." ^1".$infoortio.":^2 ".substr($ratio_x, 0,5)."  ", "");	
	++$x_number;	
	AddToLogInfo("[".$datetime."] SKILL: " . $i_ip . " (" . $x_nickx . ") (" . $msgr . ") reason: S"); 
							}
	
echo '    '.$tfinishh = (microtime(true) - $start);
}		 
	}
}

$rules_msgg_cmd = true;	 ////////
 if ((strpos($msgr, ixz.'rank') !== false) && ($x_number != 1))
    {

echo '===========================';
	$x_nickx = clearnamex($nickr);
$i_namex = clearSymbols($i_name);	
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$kski = explode(" / ", $tk); 	 
$na1 = trim($kski[1]);
$na2 = trim($x_nickx);
	 if($na1 == $na2) 
	     {

	$i_namex = clearSymbols($i_name);		 
		 
 

try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
  
	$result = $db3->query("SELECT * FROM db_stats_2 WHERE s_pg='$conisq'  LIMIT 1");	
	 
 	$number = 0;		
    foreach($result as $row)
    {	
		$ply = $nickr;
		$skilll = $row['w_skill'];
	}

require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	


	
require_once $cpath.'ReCodMod/functions/ranks.php';                                 


/////////// HERE SQL FOR DB-5 RANK LEVELS


require $cpath . 'ReCodMod/functions/core/cod_rcon.php';
                            foreach ($rconarray as $oneline => $e) {
                                //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                                if ((!$valid_id) || (!$valid_ping))
                                    Continue;	
	
if (!empty($skill2))
{
rcon("say  ^3".$ply." ^1".$infoorrnk.":^2  ".$skilll." ^1".$infoorank.": ^2".$skill2." ^7||^2 ".$lbr." ^1 ".$infoolvvl.":^2 ".$lvll." ", "");
++$x_stop_lp;
}else{

rcon("say  ^1Rank error", "");
++$x_stop_lp;

}
							} 	
	++$x_number;	
	AddToLogInfo("[".$datetime."] RANK: " . $i_ip . " (" . $x_nickx . ") (" . $msgr . ") reason: S"); 
echo '    '.$tfinishh = (microtime(true) - $start);
}		 
	}

}







if ( ($msgr == ''.ixz.'top')&& ($x_number == 0) || ($msgr == ''.ixz.'TOP')&& ($x_number == 0))
{
try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
 
$result = $db3->query('SELECT *
FROM db_stats_1
INNER JOIN db_stats_0 ON db_stats_1.s_pg = db_stats_0.s_pg where db_stats_0.s_port="'.$svipport.'" and db_stats_1.s_kills >=500
 ORDER BY (db_stats_1.s_kills+0)  DESC LIMIT 3'); 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
   
   // $result = $db3->query("SELECT * FROM db_stats_1 WHERE s_kills>=$limm and s_port='$svipport' ORDER BY ($etopx+0) DESC LIMIT 3");
 		
  $result = $db3->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_0) 
 t2 ON t1.s_pg = t2.s_pg where t2.s_port="'.$svipport.'" and t1.s_kills >=500
 ORDER BY (t1.s_kills+0)  DESC LIMIT 3'); 
   }


		$number = 0;
	
	
	  
	  rcon("say  ^3[ ^6TOP 3 ^7by ^1kills ^7& ^2Played^3]", "");			
		
		
		
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
   
   
	
	  rcon("say ^3[^6". ++$number."^3] ^7 ".$playername."^0 : ^1".substr($ipm, 0,8)." ^2".$info_play, "");
	
	}

require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }

	
	++$x_number;	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
 

echo '    '.$tfinishh = (microtime(true) - $start);

++$x_stop_lp;    //return;			 
	}	
	
	
	
if ((strpos($msgr, ixz.'top ') !== false) || (strpos($msgr, ''.ixz.'TOP ') !== false) && ($x_number == 0))
{
list($x_cmd, $x_nameee) = explode(' ', $msgr); // 
$x_namjj= clearnamex2($x_nameee);	


try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
    $result = $db3->query("SELECT * FROM db_stats_2 WHERE w_place='{$x_namjj}' and s_port='$svipport' LIMIT 1");


	
$rows = count ($result); 

if(!$rows)
{
if($x_number == 0){
  
  rcon("say  ^5".$stsnoextt."", "");	
  }
	++$x_number;	
	AddToLogInfo("[".$datetime."] TOP: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: S"); 
 
 
 
echo '    '.$tfinishh = (microtime(true) - $start);	  
++$x_stop_lp;    //return;

}else{


	$number = 0;	
    foreach($result as $row)
    {	
	    $kl  = 	$row['s_kills'];
		$dth = 	$row['s_deaths'];
		$ply = 	$row['s_clear'];
		$xlst =  $row['s_lasttime'];	
		$pla = $row['s_place'];
		        $bsdvc = 	$row['s_melle'];
				$headshots =  $row['s_heads'];
				
	}	
if($ply != 0)
	  {
fclose($connect);
 
echo '    '.$tfinishh = (microtime(true) - $start);	  
++$x_stop_lp;    //return;
      }	
if ($kl <= 0 || $dth <= 0){ 
if ($x_stop_lp == 0 ) { 

if ((strpos($game_patch, 'cod1_1.1') !== false) || ($game_mod == 'codam')){	
rcon(" - ^3".$stsnoskl, ""); 
	++$x_stop_lp; 
}else{
rcon("tell ".$i_id."  ^3".$stsnoskl, "");
	++$x_stop_lp; 
}	
}}else{
if ($x_stop_lp == 0 ) {	

							if (!empty($kl)){
								if (!empty($dth)){
							  $skil_x = 100+($kl / $dth)*10+(($kl / $dth)*$headshots)+(($kl / $dth)*($bsdvc*5));
							  $skil_x = floor($skil_x*10000)/10000;
							}}else
								$skil_x = 0;
						   
							if (!empty($kl)){
								if (!empty($dth)){    
                               $ratio_x = ($kl / $dth);
							   $ratio_x = floor($ratio_x*10000)/10000;
							}}
						    else
							   $ratio_x = 0;				
                                 
  
  if($x_number == 0){
  
rcon("say ^7".$ply." ^1".$infootop.":^2".$pla." ^1".$infoorank.":^2 ".$skil_x." ^1 ".$infoofrag.":^2".$kl." ^1 ".$infoodth.":^2".$dth." ^1".$infoortio.":^2 ".substr($ratio_x, 0,19)." ^1".$infoohnt.":^2 ".$xlst."", "");	
	}
	
	++$x_number;	
	AddToLogInfo("[".$datetime."] SKILL: " . $i_ip . " (" . $nickr . ") (" . $msgr . ") reason: S"); 
 
echo ' ----   '.$tfinishh = (microtime(true) - $start);	  
++$x_stop_lp;    //return;
}}}
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }

}



if ((strpos($msgr, ixz.'grenade') !== false) || (strpos($msgr, ixz.'nade') !== false) && ($x_nmbrf == 0))
{
try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
   
   
 $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_3) 
 t2 ON 
 t1.s_pg = t2.s_pg where t1.s_kills>=500 and t0.s_port='.$svipport.' ORDER BY (grenade+0) DESC LIMIT 3');  
   	
		$number = 0;
    foreach($result as $row)
    {
        $playername = 	$row['w_guid'];
		$ipm = 			$row['grenade'];

	
	//rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."^1 Skill Rank: ^2 ".$ipm." ^3[^5TOP100  ^7http:^7/^7/recod.ru/top^7^3]", "");
	  rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername, "");
	
	}

require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }

	
	++$x_number;	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
  
//fclose($connect);
////fclose($fpX);

echo '    '.$tfinishh = (microtime(true) - $start);

++$x_stop_lp;    //return;			 
	}	
	








if ( ($msgr == ''.ixz.'head')&& ($x_number == 0) || ($msgr == ''.ixz.'heads')&& ($x_number == 0))
{
try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
   
 $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_3) 
 t2 ON 
 t1.s_pg = t2.s_pg where t1.s_kills>=500 and t0.s_port='.$svipport.' ORDER BY (s_heads+0) DESC LIMIT 5');  
   			
		
		
		$number = 0;
    foreach($result as $row)
    {
        $playername = 	$row['s_player'];
		$ipm = 			$row['s_heads'];
               $k  = 	$row['s_lasttime'];	
                $r  = 	$row['s_time'];


/*
list($vv9, $vv8) = explode(' ',$r);
list($vv9g, $vv8g, $vv7g) = explode('.',$vv9);
list($vv9g1, $vv8g1, $vv7g1) = explode('.',$vv8);
$time = $vv9g.'-'.$vv8g.'-'.$vv7g.' '.$vv9g1.':'.$vv8g1;
*/

 $lasttime = $k;
 $time =$r;
 
   $datetime1 = date_create($lasttime);
   $datetime2 = date_create($time);
   $interval = date_diff($datetime1, $datetime2);
   $playedp = $interval->format('%y years %M months %D days %H hours %I minutes');
   $played = cleart($playedp);
	
	//rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."^1 Skill Rank: ^2 ".$ipm." ^3[^5TOP100  ^7http:^7/^7/recod.ru/top^7^3]", "");
	//rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."  ^3[ ^6HEADSHOTS: ^2".$ipm."^3] ^6Played ^2".$played." ^3[^5TOP5^3]", "");
	  rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."^1 ".$infoohddd.": ^2 ".$ipm." ^3[^5TOP5^3]", "");
	}

require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }

	
	++$x_number;	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
 
//fclose($connect);
////fclose($fpX);

echo '    '.$tfinishh = (microtime(true) - $start);

++$x_stop_lp;    //return;			 
	}	
	











if ((strpos($msgr, ixz.'kills') !== false) || (strpos($msgr, ''.ixz.'kills ') !== false) && ($x_nmbrf == 0))
{
 
   
   
 try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
    
	
 $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_3) 
 t2 ON 
 t1.s_pg = t2.s_pg where t1.s_kills>=100 and t0.s_port='.$svipport.' ORDER BY (s_kills+0) DESC LIMIT 5'); 	
	

	$number = 0;	
 	
    foreach($result as $row)
    {	
	    $playername = 	$row['s_player'];
		$ipm = 			$row['s_kills'];
	
	
	
	rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."^1 ".$infoofrag.": ^2 ".$ipm." ^3[^5TOP5^3]", "");
	++$x_number;
	++$x_nmbrf;
	//}	
}		
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
 
 

echo '    '.$tfinishh = (microtime(true) - $start);
  
++$x_stop_lp;    //return;			 
	}	





if ( ($msgr == ''.ixz.'suicid')&& ($x_number == 0) || ($msgr == ixz.'suicides')&& ($x_number == 0))

{
 
 try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
   
   
  $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_3) 
 t2 ON 
 t1.s_pg = t2.s_pg where t1.s_suicids>=1 and t0.s_port='.$svipport.' ORDER BY (s_suicids+0) DESC LIMIT 5');   
   
 
	$number = 0;	
 	
    foreach($result as $row)
    {	
	    $playername = 	$row['s_player'];
		$ipm = 			$row['s_suicids'];
	
	
	
	rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."^1 ".$infoosuic.": ^2 ".$ipm." ^3[^5TOP5^3]", "");
	++$x_number;
	++$x_nmbrf;
	//}	
}		
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
 
 

echo '    '.$tfinishh = (microtime(true) - $start);
  
++$x_stop_lp;    //return;			 
	}	

	

if (($msgr == ''.ixz.'bash')&& ($x_number == 0) || ($msgr == ''.ixz.'mellee')&& ($x_number == 0))
{
 
 try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }

  $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_3) 
 t2 ON 
 t1.s_pg = t2.s_pg where t1.s_melle>=10 and t0.s_port='.$svipport.' ORDER BY (s_melle+0) DESC LIMIT 5');   
    
 
 
	$number = 0;	
 	
    foreach($result as $row)
    {	
	    $playername = 	$row['s_player'];
		$ipm = 			$row['s_melle'];
	
	
	
	rcon("say  ^3    [^6 " . ++$number . " ^3] ^7 ".$playername."^1 ".$infoobash.": ^2 ".$ipm." ^3[^5TOP5^3]", "");
	++$x_number;
	++$x_nmbrf;
	//}	
}		
require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
 
 

echo '    '.$tfinishh = (microtime(true) - $start);
  
++$x_stop_lp;    //return;			 
	}	


	
	
if ( ($msgr == ''.ixz.'toprank')&& ($x_number == 0) || ($msgr == ''.ixz.'TOPRANK')&& ($x_number == 0))
{
      
	  
 try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
   
 
  $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t2.w_skill>=100 and t0.s_port='.$svipport.' ORDER BY (t2.w_skill+0) DESC LIMIT 5');   
    
 
 
 $num = 0;
 $number = 0;
    foreach($result as $row)
    {	  	
	    $playername = 	$row['s_player'];
		$skilll = 			$row['w_skill'];
		$ply = $playername;

$xhcv = $skilll;
    if($skilll < '-15000')
	{
		$skill2 = "NOOB 99 LVL";
		$lbr = "N-O-O-B";
		$lvll = "0";
	}
    if($skilll < '-10000')
	{
		$skill2 = "Flotsam and jetsam";
		$lbr = "PAJ";
		$lvll = "1";
	}
	else if($skilll < '-5000')
	{
		$skill2 = "Prisoner Of War";
		$lbr = "POW";
		$lvll = "2";
	}
	else if($skilll < '-4000')
	{
		$skill2 = "Missing In Action";
		$lbr = "MIA";
		$lvll = "3";
	}
	else if($skilll < '-3000')
	{
		$skill2 = "Behind Enemy Lines";
		$lbr = "BEL";
		$lvll = "4";
	}
	else if($skilll < '-2000')
	{
		$skill2 = "Lost";
		$lbr = ". Lost";
		$lvll = "5";
	}
	else if($skilll < '-1000')
	{
		$skill2 = "Overrun";
		$lbr = "- OR";
		$lvll = "6";
	}
	else if($skilll < '-500')
	{
		$skill2 = "Overrun II";
		$lbr = "- OR II";
		$lvll = "7";
	}
	else if($skilll < '-300')
	{
		$skill2 = "Overrun II";
		$lbr = "- OR III";
		$lvll = "8";
	}
	else if($skilll < '-100')
	{
		$skill2 = "Overrun IV";
		$lbr = "- OR IV";
		$lvll = "9";
	}	
   else if($skilll < '10')
	{
		$skill2 = "Fighter LEVEL I";
		$lbr = "F";
		$lvll = "9";
	}
	
	else if($skilll < '220')
	{
		$skill2 = "Fighter LEVEL II";
		$lbr = "F II";
		$lvll = "10";
	}
	
	else if($skilll < '330')
	{
		$skill2 = "Fighter LEVEL III";
		$lbr = "F III";
		$lvll = "11";
	}
	
	else if($skilll < '440')
	{
		$skill2 = "Fighter LEVEL IV";
		$lbr = "F IV";
		$lvll = "12";
	}
	
	else if($skilll < '550')
	{
		$skill2 = "Fighter LEVEL V";
		$lbr = "F V";
		$lvll = "13";
	}	
	else if($skilll < '1000')
	{
		$skill2 = "Silver I";
		$lbr = ">";
		$lvll = "14";
	}
	
	else if($skilll < '1500')
	{
		$skill2 = "Silver II";
		$lbr = ">>";
		$lvll = "15";
	}
	
	else if($skilll < '3300')
	{
		$skill2 = "Silver III";
		$lbr = ">>>";
		$lvll = "16";
	}
	
	else if($skilll < '4400')
	{
		$skill2 = "Silver IV";
		$lbr = ">>>>";
		$lvll = "17";
	}
	
	else if($skilll < '5000')
	{
		$skill2 = "Silver Mater";
		$lbr = "SM>>>>";
		$lvll = "18";
	}	
	
	else if($skilll < '6100')
	{
		$skill2 = "Bronze I";
		$lbr = "B>";
		$lvll = "19";
	}
	
	else if($skilll < '7200')
	{
		$skill2 = "Bronze II";
		$lbr = "B>>";
		$lvll = "20";
	}
	
	else if($skilll < '8300')
	{
		$skill2 = "Bronze III";
		$lbr = "B>>>";
		$lvll = "21";
	}
	
	else if($skilll < '9400')
	{
		$skill2 = "Bronze IV";
		$lbr = "B>>>>";
		$lvll = "22";
	}
	
	else if($skilll < '10000')
	{
		$skill2 = "Bronze MASTER";
		$lbr = "<BM>";
		$lvll = "23";
	}
	else if($skilll < '11000')
	{
		$skill2 = "GOLD I";
		$lbr = "G>";
		$lvll = "24";
	}
	
	else if($skilll < '12200')
	{
		$skill2 = "GOLD II";
		$lbr = "G>>";
		$lvll = "25";
	}
	
	else if($skilll < '13300')
	{
		$skill2 = "GOLD III";
		$lbr = "G>>>";
		$lvll = "26";
	}
	
	else if($skilll < '14400')
	{
		$skill2 = "GOLD IV";
		$lbr = "G>>>>";
		$lvll = "27";
	}
	
	else if($skilll < '15000')
	{
		$skill2 = "GOLD MASTER";
		$lbr = "<GM>";
		$lvll = "28";
	}
	else if($skilll < '15500')
	{
		$skill2 = "Private"; 
		$lbr = "> PFC";
		$lvll = "29";
	}
	else if($skilll < '19000')
	{
		$skill2 = "Private First Class";  
		$lbr = "> PFC";
		$lvll = "30";
	}
	else if($skilll < '25000')
	{
		$skill2 = "Specialist";  
		$lbr = "x> SPC";
		$lvll = "31";
	}
	else if($skilll < '35000')
	{
		$skill2 = "Corporal";  
		$lbr = "x>> Cpl";
		$lvll = "32";
	}
	else if($skilll < '50000')
	{
		$skill2 = "Sergeant";  
		$lbr = "x>>> Sgt";
		$lvll = "33";
	}
	else if($skilll < '60000')
	{
		$lvll = "34";
		$skill2 = "Staff Sergeant";
		$lbr = "(x>>> SSG";
	}
	else if($skilll < '70000')
	{
		$lvll = "35";
		$skill2 = "Sergeant First Class";
		$lbr = "((x>>> SFC";
	}
	else if($skilll < '80000')
	{
		$lvll = "36";
		$skill2 = "Master Sergeant";
		$lbr = "(((x>>> MSG";
	}
	else if($skilll < '90000')
	{
		$lvll = "37";
		$skill2 = "First Sergeant";
		$lbr = "((((*>>> 1SG";
	}
	else if($skilll < '100000')
	{
		$lvll = "38";
		$skill2 = "Sergeant Major";
		$lbr = "((((X>>> SGM";
	}
	else if($skilll < '110000')
	{
		$lvll = "39";
		$skill2 = "Commander Sergeant Major";
		$lbr = "((((X>>> CSM";
	}
	else if($skilll < '130000')
	{
		$lvll = "40";
		$skill2 = "Sergeant Major of the Army";
		$lbr = "((((X>>> SMA";
	}
	else if($skilll < '150000')
	{
		$lvll = "41";
		$skill2 = "Second Lieutenant";
		$lbr = "I 2LT";
	}
	else if($skilll < '160000')
	{
		$lvll = "42";
		$skill2 = "First Lieutenant";
		$lbr = "I 1LT";
	}
	else if($skilll < '200000')
	{
		$lvll = "43";
		$skill2 = "Captain";
		$lbr = "II CPT";
	}
	else if($skilll < '250000')
	{
		$lvll = "44";
		$skill2 = "Major";
		$lbr = "@ MAJ";
	}
	else if($skilll < '260000')
	{
		$lvll = "45";
		$skill2 = "Lieutenant Colonel";
		$lbr = "# LTC";
	}
	else if($skilll < '310000')
	{
		$lvll = "46";
		$skill2 = "Colonel";
		$lbr = "* COL";
	}
	else if($skilll < '360000')
	{
		$lvll = "47";
		$skill2 = "Brigadier General";
		$lbr = "** BG";
	}
	else if($skilll < '3')
	{
		$lvll = "48";
		$skill2 = "Major General";
		$lbr = "*** MG";
	}
	else if($skilll < '400000')
	{
		$lvll = "49";
		$skill2 = "Lieutenant General";
		$lbr = "**** LTG";
	}
	else if($skilll < '500000')
	{
		$lvll = "50";
		$skill2 = "General";
		$lbr = "***** GEN";
	}
	else if($skilll < '600000')
	{
		$lvll = "51";
		$skill2 = "General of the Army";
		$lbr = "$ GOA";
	}
	else if($skilll < '700000')
	{
		$lvll = "52";
		$skill2 = "Caesar";
		$lbr = "$$ Czar";
	}
	else if($skilll < '800000')
	{
		$lvll = "53";
		$skill2 = "King";
		$lbr = "$$$ King";
	}
	
	else if($skilll < '900000')
	{
		$lvll = "54";
		$skill2 = "Emperor";
		$lbr = "EmR";
	}
	
	else if($skilll < '1000000')
	{
		$lvll = "55";
		$skill2 = "Pharoah";
		$lbr = "$$$$ Ph";
	}	
	else if($skilll < '1100000')
	{
		$lvll = "56";
		$skill2 = "Pharoah II";
		$lbr = "$$$$ Ph II";
	}	
	else if($skilll < '1200000')
	{
		$lvll = "57";
		$skill2 = "Pharoah III";
		$lbr = "$$$$ Ph III";
	}	
	else if($skilll < '1300000')
	{
		$lvll = "58";
		$skill2 = "Pharoah IV";
		$lbr = "$$$$ Ph IV";
	}	
	else if($skilll < '1400000')
	{
		$lvll = "59";
		$skill2 = "Pharoah V";
		$lbr = "$$$$ Ph V";
	}
	else if($skilll < '1500000')
	{
		$lvll = "60";
		$skill2 = "Lord of Scilly";
		$lbr = "$$$$ LRS";
	}
	else if($skilll < '1600000')
	{
		$lvll = "61";
		$skill2 = "Lord of Skill I";
		$lbr = "$$$$ LRS I";
	}
	else if($skilll < '1700000')
	{
		$lvll = "62";
		$skill2 = "Lord of Skill II";
		$lbr = "$$$$ LRS II";
	}
	else if($skilll < '1750000')
	{
		$lvll = "63";
		$skill2 = "Lord of Skill III";
		$lbr = "$$$$ LRS III";
	}	
	else if($skilll < '1800000')
	{
		$lvll = "64";
		$skill2 = "Demi-God";
		$lbr = "$$$$$$ DemiGod";
	}
	else if($skilll < '2000000')
	{
		$lvll = "65";
		$skill2 = "God";
		$lbr = "$$$$$$$ God";
	}	
	else if($skilll < '5000000')
	{
		$lvll = "66";
		$skill2 = "God lvl 999";
		$lbr = "$$$$$$$ God lvl 999";
	}

	
  
  rcon("say   [^6 ". ++$num ." ^6]  ^7".$ply." ^1".$infoorrnk.":^2  ".$xhcv." ^1 ".$infoorank.":^2 ".$skill2."  ^1 ".$infoolvvl.":^2 ".$lvll." / 66 ", "");	
	++$x_number;	
	}

require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	
	++$x_number;	
	AddToLogInfo("[".$datetime."] TOP: (" . $nickr . ") (" . $msgr . ") reason: TOP"); 
 

echo '    '.$tfinishh = (microtime(true) - $start);
 
++$x_stop_lp;    //return;			 
	}
}

if ((strpos($msgr, ixz.'worst') !== false) && ($x_number != 1))
    { 

 try
  {
 if(empty(SqlDataBase))
{
$db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
                 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db3 = $msqlconnect;
 
   }
 
  $result = $db3->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t2.w_skill>=100 and t0.s_port='.$svipport.' ORDER BY (t2.w_skill+0) ASC LIMIT 5');   
    	
	
	
	$number1 = 0;	
    foreach($result as $row)
    { 
		
	    $playername = 	$row['s_player'];
		$ipm = 			$row['s_skill'];
	
	rcon("say  ^3    [^6 " . ++$number1 . " ^3] ^7 ".$playername."^1 ".$infoorrnk.": ^2 ".$ipm."", "");
	}
	++$x_number;
	AddToLogInfo("[".$datetime."] TOP: (" . $playername . ") (" . $i_id . ") reason: TOP"); 
 
echo '    '.$tfinishh = $tfinishh = (microtime(true) - $start);
++$x_stop_lp;
++$x_number;
++$x_return;

require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  		
        }
   

?>
 