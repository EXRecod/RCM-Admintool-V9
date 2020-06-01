<?php
if (!empty($stats_array))
{
    ////////////////////////лимит нагрузок
    if(empty($activate_opt))
	{	
    $geoonqx = 60;
	$limitindb = 60;
	$timeap = 99999;
	}
else
{
	$geoonqx = 1;
	$limitindb = 2;
	$timeap = 30;
}	

    echo "\n \033[38;5;202m OPT $limitindb USERS LIMIT / SYNC STATS update \033[38;5;46m";

    if (empty($date)) $date = date('Y-m-d H:i:s');
 
    $okyopt = 0;
    $whileoptx = 0;
    $whileopt = 0;
    try
    {
        if (empty($Msql_support))
        {
            $db4 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
            $db3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
            $dbw3 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/dbw3.sqlite');
            $dbm3day = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/dbm3.sqlite');
            $dbw3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbm3day->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        else
        {
            $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
            if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, $db_user, $db_pass);
            $db3 = $msqlconnect;
            $dbw3 = $msqlconnect;
            $dbm3day = $msqlconnect;
            $db4 = $msqlconnect;
        }
  
        foreach ($stats_array as $player_server_uid => $v)
        {
            $g = '';
            $o = '';
            $data = '';
            //$player_server_uid = 0;
            /////////////////// ОПТИМИЗАЦИЯ
            if ($whileoptx < $limitindb)
            {
                $string = str_replace(".", "_", $server_ip);
                $loadopt = $cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/' . $player_server_uid . '.log';
                if (!file_exists($loadopt)) touch($loadopt);
                $ciopt = filemtime($loadopt);
                if (time() - $ciopt >= $timeap)
                {
                    echo "\n ===> ", $player_server_uid;
                    /////////////////// ОПТИМИЗАЦИЯ
					
					$date = date('Y-m-d H:i:s');
                 	
					 $czr     = count($v);	  
						$counter = 0;
                        $guid = '';
                        $nickname = '';
						$ip = ''; 
                        $skill = '';
                        $kills = 0;
                        $deaths = 0;
						$heads = 0;
                        $suicides = 0;
						$kill_series = '';
                        $kill_series_db = '';
                        $kill_series_minute_db = '';
						$kill_series_head_db = '';
                        $death_series = '';
                        $death_series_db = '';
                        $death_series_minute_db = '';
						$death_series_head_db = '';
                        $mod_melee = '';
                        $damage = '';
						$city = '';
						$ping = '';
						
					foreach ($v as $g => $o)
                    {
						 
                        if (strpos($g, 'guid') !== false) $guid = $o;
                        else if (strpos($g, 'nickname') !== false) $nickname = $o;
                        else if (strpos($g, 'scores;skill') !== false) $skill = $o;
                        else if (strpos($g, 'scores;kills') !== false) $kills = $o;
                        else if (strpos($g, 'scores;deaths') !== false) $deaths = $o;
                        else if (strpos($g, 'scores;suicides') !== false) $suicides = $o;
						else if ($g=='scores;kill_series') $kill_series = $o;
                        else if (strpos($g, 'scores;kill_series_db') !== false) $kill_series_db = $o;
                        else if (strpos($g, 'scores;kill_series_minute_db') !== false) $kill_series_minute_db = $o;
                        else if (strpos($g, 'scores;kill_series_head_db') !== false) $kill_series_head_db = $o;
                        else if (strpos($g, 'scores;kill_series_minute_head_db') !== false) $kill_series_minute_head_db = $o;
						else if ($g=='scores;death_series') $death_series = $o;
                        else if (strpos($g, 'scores;death_series_db') !== false) $death_series_db = $o;
                        else if (strpos($g, 'scores;death_series_minute_db') !== false) $death_series_minute_db = $o;
                        else if (strpos($g, 'scores;death_series_head_db') !== false) $death_series_head_db = $o;
                        else if (strpos($g, 'scores;death_series_minute_head_db') !== false) $death_series_minute_head_db = $o;
                        else if (strpos($g, 'mod;MOD_MELEE') !== false) $mod_melee = $o;
						else if (strpos($g, 'date') !== false) $date = $o;
						else if (strpos($g, 'ip_adress') !== false) $ip = $o;
						else if (strpos($g, 'city') !== false) $city = $o;
						else if (strpos($g, 'ping') !== false) $ping = $o;
                        else if (strpos($g, 'damage;damage') !== false) $damage = $o;
                        else if (strpos($g, 'hitzones;') !== false)
                        {
                            list($table, $hit) = explode(';', $g);
                            //$h hits zones
                            $table_hits[$hit] = $o;
                            if ($hit == 'head') $heads = $o;
							unset($stats_array[$player_server_uid]['hitzones;'.$hit]);
                        }
                        else if (strpos($g, 'weapons;') !== false)
                        {
                            list($table, $weap) = explode(';', $g);
                            //$w weapons
                            $w[$weap] = $o;
							
							unset($stats_array[$player_server_uid]['weapons;'.$weap]);
                            ////////////////////############################################/////////////////////////
                            ////////////////////###   STOCK COD1 - COD5 WEAPONS UPDATE   ###/////////////////////////
                                                     $table_update = stock_weapons($w);
                            ////////////////////###   STOCK COD1 - COD5 WEAPONS UPDATE   ###/////////////////////////
                            ////////////////////############################################/////////////////////////
                         }
						  
                        ++$counter;
						
						if($counter == $czr)
						{
							if(!empty($guid))
							{
								
if(empty($ip))
    list($ping,$ip,$i_name,$i_guid,$city) = explode(';', (rconExplode($guid))); 
							   
////// save in      ReCodMod/databases/players_score_db/     data
if(!empty($skill))
 txt_db($server_ip,$server_port,$guid,$nickname,'skill',$skill,1); 
if(!empty($kills))
 txt_db($server_ip,$server_port,$guid,$nickname,'kills',$kills,1);
if(!empty($deaths))
 txt_db($server_ip,$server_port,$guid,$nickname,'deaths',$deaths,1);
if(!empty($suicides))
 txt_db($server_ip,$server_port,$guid,$nickname,'suicides',$suicides,1);
if(!empty($kill_series_db))
{
$v = txt_db($server_ip,$server_port,$guid,$nickname,'kill_series_db',$kill_series_db,1);
if(!empty($v))
{
	if($v < $kill_series)
		txt_db($server_ip,$server_port,$guid,'kill_series_db',$kill_series,1);
}	
}
if(!empty($kill_series_minute_db))
 txt_db($server_ip,$server_port,$guid,'kill_series_minute_db',$kill_series_minute_db,1);
if(!empty($kill_series_head_db))
 txt_db($server_ip,$server_port,$guid,'kill_series_head_db',$kill_series_head_db,1);
if(!empty($kill_series_minute_head_db))
 txt_db($server_ip,$server_port,$guid,'kill_series_minute_head_db',$kill_series_minute_head_db,1);
 
if(!empty($death_series_db))
{
$v = txt_db($server_ip,$server_port,$guid,'death_series_db',$death_series_db,1);
if(!empty($v))
{
	if($v < $death_series)
		txt_db($server_ip,$server_port,$guid,'death_series_db',$death_series,1);
}	
}
$v = '';

if(!empty($death_series_minute_db))
 txt_db($server_ip,$server_port,$guid,'death_series_minute_db',$death_series_minute_db,1);
if(!empty($death_series_head_db))
 txt_db($server_ip,$server_port,$guid,'death_series_head_db',$death_series_head_db,1);
if(!empty($death_series_minute_head_db))
 txt_db($server_ip,$server_port,$guid,'death_series_minute_head_db',$death_series_minute_head_db,1);
                        //foreach ----------
                        if ((strpos($g, 'scores;skill') === false) || ($g != 'scores;kill_series') || ($g != 'scores;death_series') || ($g != 'scores;death_series_head') || ($g != 'scores;kill_series_head') || ($g != 'scores;kill_series_minute') || ($g != 'scores;death_series_minute') || ($g != 'scores;death_series_head')) unset($stats_array[$player_server_uid][$g]);
 
                            ////////////////////############################################/////////////////////////
                            ////////////////////###   STOCK COD1 - COD5 WEAPONS INSERT   ###/////////////////////////
 						   // $wp = ''; $wps = ''; $wprg = ''; $wpnm = ''; $table_insert = ''; $wweapons = '';                                   
										 if(!empty($wp))
											 unset($wp);
										 require $cpath . 'ReCodMod/functions/weapons/cod.php';                                                     
                                                     $table_insert = stock_weapons($wp);  
 												 
                        for ($i = 1;$i <= 20;$i++)
                        {
                            if (!empty($table_insert[$i]))
                            {
                                $valueSets = array();
                                foreach ($table_insert[$i] as $wweapons => $value)
                                {
									
                                    $valueSets[] = "'0'";  //'' . $value . '';
									$weaponSets[] = $wweapons;
									txt_db($server_ip,$server_port,$guid,'weapons;'.$wweapons,$value,1);
                                }
                                $join_values = join(",", $valueSets);
								$join_weapon = join(",", $weaponSets);
                                if (!empty($join_weapon))
                                {
									
			 $reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_db_weapons_' . $i . '_GID_' . $player_server_uid . '_GUID_' . $guid . '.log';
             if (!file_exists($reg)) {						
									
                                    usleep(7000);
                                    $query = $db3->query("INSERT INTO db_weapons_$i (s_pg,$join_weapon)  VALUES ('$player_server_uid',$join_values)");
									unset($table_insert[$i]);
									if($query)
									{
									//create $player_server_uid_db_stats_$i___insert
             if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl, $join_weapon . "%" . $join_values . "\n");
                fclose($fpl);
              }									
									}
                                    $query = null;
                                    echo "\n\n  \033[38;5;175m opt db_weapons_$i insert: 'INSERT INTO db_weapons_$i (s_pg," . $join_weapon . ")  VALUES ('$player_server_uid'," . $join_values . ")' \033[38;5;46m", $player_server_uid;
								echo "\n";
										
			                    }			
                                }
                            unset($valueSets);
							unset($weaponSets);
							}
                        }
                            ////////////////////###   STOCK COD1 - COD5 WEAPONS INSERT   ###/////////////////////////
                            ////////////////////############################################/////////////////////////				 
 
///$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ 						
		
		$reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_db_stats_0_GID_' . $player_server_uid . '_GUID_' . $guid . '.log';
             if (!file_exists($reg)) { 
					$query = $db3->query("INSERT INTO db_stats_0 (s_pg,s_guid,s_port,servername,s_player,s_time,s_lasttime) VALUES ('$player_server_uid','$guid', '$svipport', '" . $servername . "','" . $nickname . "','$date','$date')");									                                  
									if($query){ 
             if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl,"(s_pg,s_guid,s_port,servername,s_player,s_time,s_lasttime) %('$player_server_uid','$guid', '$svipport', '$servername','$nickname','$date','$date')\n");
                fclose($fpl);
              }}$query = null;}	
			  
/////////////////////////////////////////////////////////////////////////////////////////////////////

			 $reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_db_stats_1_GID_' . $player_server_uid . '_GUID_' . $guid . '.log';
             if (!file_exists($reg)) { 
					                 $query = $db3->query("INSERT INTO db_stats_1 (s_pg,s_kills,s_deaths,s_heads,s_suicids,s_fall,s_melle,s_dmg) VALUES ('$player_server_uid','0','0','0','0','0','0','0')"); 			                                  
									if($query){ 
             if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl,"(s_pg,s_kills,s_deaths,s_heads,s_suicids,s_fall,s_melle,s_dmg) %('$player_server_uid','0','0','0','0','0','0','0')\n");
                fclose($fpl);
              }}$query = null;}	

/////////////////////////////////////////////////////////////////////////////////////////////////////

			 $reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_db_stats_2_GID_' . $player_server_uid . '_GUID_' . $guid . '.log';
             if (!file_exists($reg)) { 
	    $query = $db3->query("INSERT INTO db_stats_2 (s_pg, s_port, w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min) VALUES ('" . $player_server_uid . "','$svipport','0','1000','0','0','0','0','$ip','0','0','0','0','0','0')");
 if($query){ 
             if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl,"(s_pg, s_port, w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min)%('" . $player_server_uid . "','$svipport','0','1000','0','$city','0','0','$ip','0','0','0','0','0','0')\n");
                fclose($fpl);
              }}$query = null;}	

 /////////////////////////////////////////////////////////////////////////////////////////////////////

			 $reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_db_stats_hits_GID_' . $player_server_uid . '_GUID_' . $guid . '.log';
             if (!file_exists($reg)) { 
                    $query = $db3->query("INSERT INTO db_stats_hits (s_pg,head,torso_lower,torso_upper,right_arm_lower,
	left_leg_upper,neck,right_arm_upper,left_hand,
left_arm_lower,none,right_leg_upper,left_arm_upper,right_leg_lower,left_foot,right_foot,
right_hand,left_leg_lower)
 VALUES ('$player_server_uid','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')");
 if($query){ 
             if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl,"(s_pg,head,torso_lower,torso_upper,right_arm_lower,
	left_leg_upper,neck,right_arm_upper,left_hand,
left_arm_lower,none,right_leg_upper,left_arm_upper,right_leg_lower,left_foot,right_foot,
right_hand,left_leg_lower)%('$player_server_uid','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')\n");
                fclose($fpl);
              }}$query = null;}	
 
 
 
 
         /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  geo+  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        echo " \n MAMBA UP + x_db_players  ";
                                $nickname = clearSymbols($nickname);
                                $nickname = htmlentities($nickname);
 

 $reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_x_db_players_GID_' . $player_server_uid . '_GUID_' . $guid . '.log';
            if (!file_exists($reg)) 
			  {
 $gtd = $db4->query("INSERT INTO x_db_players (s_port,x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, x_db_conn, x_db_date, x_db_warn, x_date_reg, stat)
    VALUES ('$svipport','" . $nickname . "', '0', '$ip', '0', '$ping', '$guid', '1', '$date', '0', '$date', '1')");            
			if($gtd){	
			 if (!file_exists($reg))touch($reg);
              if (file_exists($reg)) {$fpl = fopen($reg, 'w');
                fwrite($fpl,"(s_port,x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, x_db_conn, x_db_date, x_db_warn, x_date_reg, stat)
    VALUES ('$svipport','" . $nickname . "', '0', '$ip', '0', '$ping', '$guid', '1', '$date', '0', '$date', '1')\n");
                fclose($fpl);}
			}}else 
  $gtd = $db4->query("update x_db_players set x_db_date='" . $date . "', x_db_ip='" . $ip . "', x_db_name = '" . $nickname . "', x_db_conn=x_db_conn+1 where x_db_guid='" . $guid . "'");
  $gtd = null;                               
								 
								 
                                if ($gtgu = $db3->query("update db_stats_2 set w_ip='" . $ip . "' where s_pg='" . $player_server_uid . "'"))
                                {
                                    echo '-ok- db2 mamba up';
                                    $gtgu = null;
                                }
        
 $reg = $cpath . 'ReCodMod/databases/player_insert/' . $server_ip . '_' . $server_port . '/TABLE_x_up_players_GID_' . $player_server_uid . '_GUID_' . $guid . '_IP_' . $ip . '_md5_'.md5($nickname).'.log';
            if (!file_exists($reg)) 
			  {
 $gtd = $db4->query("INSERT INTO x_up_players (name, ip, guid) VALUES ('" . $nickname . "','$ip','$guid')");            
			if($gtd){	
			 if (!file_exists($reg))touch($reg);
              if (file_exists($reg)) {$fpl = fopen($reg, 'w');
                fwrite($fpl,"(name, ip, guid) VALUES ('" . $nickname . "','$ip','$guid')\n");
                fclose($fpl);}
			}} $gtd = null; 


   
 
	   /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  geo+  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
 
 ///$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
 
                        /////////////////////////////////////// update scores db
                        //Если сумма ноль, не дергаем бд №1
                        if (((int)$kills + (int)$deaths + (int)$heads + (int)$suicides + (int)$mod_melee + (int)$damage) > 0)
                        {
////////////////////////////////////////////////////////////////////////////////////////////////  
////////////////////////////////////////////////////////////////////////////////////////////////   
///////////////////////////////////       PLAYER MAPS      /////////////////////////////////////   
////////////////////////////////////////////////////////////////////////////////////////////////   
////////////////////////////////////////////////////////////////////////////////////////////////		
if(!empty($maps_array)){
foreach($maps_array as $mapx => $a){
foreach($a as $killsx => $b){
foreach($b as $deathsx => $c){
foreach($c as $roundsx => $gametypex){
           unset($maps_array[''.$mapx.''][$killsx][$deathsx][$roundsx]);
           if((!empty($kills))&&(!empty($deaths)))	   
                 $maps_array[''.$mapx.''][$killsx+$kills][$deathsx+$deaths][0] = ''.$gametypex.''; 
           else if((!empty($kills))&&(empty($deaths)))	
                 $maps_array[''.$mapx.''][$killsx+$kills][$deathsx][0] = ''.$gametypex.''; 
           else if((empty($kills))&&(!empty($deaths)))	
                 $maps_array[''.$mapx.''][$killsx][$deathsx+$deaths][0] = ''.$gametypex.'';           			   
}}}}}
if(!empty($maps_array)){		
foreach($maps_array as $mapname => $a){
foreach($a as $killsx => $b){
foreach($b as $deathsx => $c){
foreach($c as $roundsx => $gametypex){
	
	 $xzet         =  trim($svipport.$guid.$mapname.$gametypex);
     $gt_map_shid  =  abs(hexdec(crc32($xzet)));
	
$sql = "INSERT INTO `playermaps` (`gt_map_shid`,`mapname`,`gametype`,`port`,`guid`,`kills`,`deaths`,`teamkills`,`teamdeaths`,`suicides`,`rounds`)
VALUES ('".$gt_map_shid."', '".$mapname."', '".$gametypex."', '".$svipport."', '".$guid."', '".$kills."', '".$deaths."', '0','0', '".$suicides."','".$roundsx."') 
ON DUPLICATE KEY
    UPDATE gt_map_shid='".$gt_map_shid."', mapname='".$mapname."', gametype='".$gametypex."', port='".$svipport."', guid='".$guid."', kills=kills+".$kills.", deaths=deaths+".$deaths.", rounds=rounds+'".$roundsx."'";	
$ok = $dbmaps->query($sql); 
echo "\n  \033[38;5;178m USER MAP UPDATE $gt_map_shid  \033[38;5;48m  # PORT $svipport # map - ",$mapname, " gametype - ",$gametypex," kills - ",$kills," deaths - ",$deaths;
$ok = null;		
}}}}}
////////////////////////////////////////////////////////////////////////////////////////////////  
////////////////////////////////////////////////////////////////////////////////////////////////   
///////////////////////////////////       PLAYER MAPS      /////////////////////////////////////   
////////////////////////////////////////////////////////////////////////////////////////////////   
////////////////////////////////////////////////////////////////////////////////////////////////								
											 
                            ++$okyopt;
                            if (!empty($kills)) $sql_kills = "s_kills=s_kills + $kills,";
                            else $sql_kills = "";
                            if (!empty($deaths)) $sql_deaths = "s_deaths=s_deaths + $deaths,";
                            else $sql_deaths = "";
                            if (!empty($heads)) $sql_heads = "s_heads=s_heads + $heads,";
                            else $sql_heads = "";
                            if (!empty($suicides)) $sql_suicides = "s_suicids=s_suicids + $suicides,";
                            else $sql_suicides = "";
                            if (!empty($mod_melee)) $sql_knifes = "s_melle=s_melle + $mod_melee,";
                            else $sql_knifes = "";
                            //if(!empty($w_)) $sql_ = "s_deaths=s_deaths $deaths,"; else $sql_ = "";
                            $summdb1 = $sql_deaths . $sql_kills . $sql_heads . $sql_suicides . $sql_knifes;
                            $query = $db3->prepare("update db_stats_1 set $summdb1 s_dmg=s_dmg + $damage  where s_pg=:s_pg");
                            $query->bindParam(':s_pg', $player_server_uid);
                            $query->execute();
                            $query = null;
                            echo "\n  \033[38;5;175m opt db_stats_1 update: $summdb1 \033[38;5;46m", $player_server_uid;
                        }

                        usleep(80000);
                        $sqg = "SELECT id,s_pg,n_kills,n_deaths,n_heads,n_kills_min FROM db_stats_2 where s_pg='$player_server_uid' LIMIT 1";
                        $player_main_id = '';
                        $result = $db3->query($sqg)->fetch(PDO::FETCH_LAZY);
                        if (!empty($result))
                        {
                            foreach ($result as $key => $value)
                            {
                                if (!empty($key))
                                {

                                    if ($key == 'n_deaths') $n_deaths = $value;
                                    if ($key == 'n_kills') $n_kills = $value;
                                    if ($key == 'n_heads') $n_heads = $value;
                                    if ($key == 'n_kills_min') $n_kills_min = $value;
                                    if ($key == 'id') $player_main_id = $value;

                                    usleep(10000);
									if (empty($n_deaths)) $n_deaths = 0;
                                    if (empty($n_kills)) $n_kills = 0;
                                    if (empty($n_kills_min)) $n_kills_min = 0;
									if (empty($n_heads)) $n_heads = 0;
                                    if ($kill_series_minute_db > $n_kills_min) $db3->query("update db_stats_2 set n_kills_min=" . $kill_series_minute_db . " where id='" . $player_main_id . "'");
                                    if (($death_series_db > $n_deaths) && ($kill_series_db > $n_kills)) $db3->query("update db_stats_2 set n_kills=" . $kill_series_db . ",n_deaths= " . $death_series_db . " where id='" . $player_main_id . "'");
                                    else if ($death_series_db > $n_deaths) $db3->query("update db_stats_2 set n_deaths= " . $death_series_db . " where id='" . $player_main_id . "'");
                                    else if ($kill_series_db > $n_kills) $db3->query("update db_stats_2 set n_kills=" . $kill_series_db . " where id='" . $player_main_id . "'");
                                    if ($kill_series_head_db > $n_heads) $db3->query("update db_stats_2 set n_heads=" . $kill_series_head_db . " where id='" . $player_main_id . "'");

                                    $result = null;
                                }
                            }
                        }
                        /////////////////////////////////////// update scores db
                        /////////////////////////////////////// update skill
                        if (!empty($skill))
                        {
                            echo "\n skill: ", $player_server_uid, " - ", $skill, " ~~~~~ ";
                            usleep(10000);
                            if ($skill < 0) $skill = 100;
                            $gt = $db3->query("UPDATE db_stats_2 SET w_skill=" . $skill . " where s_pg='" . $player_server_uid . "'");
                            $gt = null;

                            $player_skill_reg = $cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/ID_SPG_' . $player_server_uid . '.log';
                            if (!file_exists($player_skill_reg)) touch($player_skill_reg);
                            if (file_exists($player_skill_reg))
                            {
                                $fpl = fopen($player_skill_reg, 'w');
                                fwrite($fpl, $skill . "%" . $player_server_uid . "\n");
                                fclose($fpl);
                            }
                            $skillog = $cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_players_skill.log';
                            if (!file_exists($skillog)) touch($skillog);
                            if (!empty($skill_log))
                            {
                                if (file_exists($skillog))
                                {
                                    $fpl = fopen($skillog, 'a');
                                    fwrite($fpl, "=== SKILL update #1: " . $skill . "%" . $player_server_uid . " === \n\n");
                                    fclose($fpl);
                                }
                            }

                            unset($stats_array[$player_server_uid]['scores;skill']);
                        }
                        /////////////////////////////////////// update skill
                        

                        /////////////////////////////////////// update user db
                        if (!empty($nickname))
                        {
                            $w_n = clearSymbols($nickname);
                            $w_n = htmlentities($w_n);

                            if (strlen($w_n) > 25) $w_n = mb_strimwidth($w_n, 0, 25, "");
                            $t = $db3->query("update db_stats_0 set s_lasttime='" . $date . "', s_player='" . $w_n . "' where s_pg='" . $player_server_uid . "'");

                            $t = null;
                        }
                        /////////////////////////////////////// update user db
                        /////////////////////////////////////// update hit zones db
                        if (!empty($table_hits))
                        {
                            $valueSets = array();
                            foreach ($table_hits as $key => $value)
                            {
                                $valueSets[] = $key . " =  " . $key . " + " . $value . "";
								txt_db($server_ip,$server_port,$guid,'hitzones;'.$key,$value,1);
                            }
                            $joi = join(",", $valueSets);
                            if (!empty($joi))
                            {
                                usleep(7000);
                                $query = $db3->prepare("UPDATE db_stats_hits SET " . $joi . "  WHERE s_pg=:s_pg");
                                $query->bindParam(':s_pg', $player_server_uid);
                                $query->execute();
                                $query = null;
                                echo "\n  \033[38;5;175m opt db_stats_hits UPDATE: $joi \033[38;5;46m", $player_server_uid;
                            }
                        }
                        /////////////////////////////////////// update hit zones db
                        /////////////////////////////////////// update weapons db
                        for ($i = 1;$i <= 20;$i++)
                        {
                            if (!empty($table_update[$i]))
                            {
                                $valueSets = array();
                                foreach ($table_update[$i] as $key => $value)
                                {
                                    $valueSets[] = $key . " =  " . $key . " + " . $value . ""; 
									txt_db($server_ip,$server_port,$guid,'weapons;'.$key,$value,1);
                                }
                                $join = join(",", $valueSets);
                                if (!empty($join))
                                {
                                    usleep(7000);
                                    $query = $db3->prepare("UPDATE db_weapons_$i SET " . $join . "  WHERE s_pg=:s_pg");
                                    $query->bindParam(':s_pg', $player_server_uid);
                                    $query->execute();
                                    $query = null;
                                    echo "\n  \033[38;5;175m opt db_weapons_$i UPDATE: $join \033[38;5;46m", $player_server_uid;
									unset($table_update[$i]);
                                }
								unset($join);
                            }
                        }
                        /////////////////////////////////////// update weapons db
                        

                        /////////////////////////////////////////////////////////////////
                        ///////////////////////////  DAY AND WEEK STATS //////////////////////////////////////////////////
                        usleep(40000);
                        if (!empty($nickname))
                        {
                            if (((int)$kills + (int)$deaths + (int)$heads) > 0)
                            {
                                if (empty($w_n)) $sql = "INSERT INTO db_stats_day (servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . "," . $deaths . "," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_kills=s_kills +" . $kills . ", s_deaths=s_deaths+" . $deaths . ", s_heads=s_heads+" . $heads . ",s_lasttime='" . $date . "'";
                                else $sql = "INSERT INTO db_stats_day (servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . "," . $deaths . "," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_player='" . $w_n . "', s_kills=s_kills +" . $kills . ", s_deaths=s_deaths+" . $deaths . ", s_heads=s_heads+" . $heads . ",s_lasttime='" . $date . "'";

                                if (empty($w_n)) $sql2 = "INSERT INTO db_stats_week (servername,s_pg,w_guid,w_port,s_player,s_kills,s_killsweap,s_killsweap_min,s_deaths,s_deathsweap_min,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . ",0,0," . $deaths . ",0," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_kills=s_kills +" . $kills . ", s_deaths=s_deaths+" . $deaths . ", s_heads=s_heads+" . $heads . ",s_lasttime='" . $date . "'";
                                else $sql2 = "INSERT INTO db_stats_week (servername,s_pg,w_guid,w_port,s_player,s_kills,s_killsweap,s_killsweap_min,s_deaths,s_deathsweap_min,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . ",0,0," . $deaths . ",0," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_player='" . $w_n . "', s_kills=s_kills +" . $kills . ", s_deaths=s_deaths+" . $deaths . ", s_heads=s_heads+" . $heads . ",s_lasttime='" . $date . "'";

                                $dbw3->query($sql2);
                                $dbm3day->query($sql);

                                echo "\n  \033[38;5;178m db_stats_week \033[38;5;46m", $player_server_uid;
                                echo "\n  \033[38;5;178m db_stats_day \033[38;5;46m Ф: $kills + П: $deaths + Г: $heads ", $player_server_uid;
                            }
                        }
                        ///////////////////////////  DAY AND WEEK STATS //////////////////////// 
					unset($table_insert);
						++$whileoptx;
  
  
                        $g = '';
						$o = '';
						
                         //unset($stats_array[$player_server_uid]['scores;skill']);
						 unset($stats_array[$player_server_uid]['nickname']);
						 unset($stats_array[$player_server_uid]['scores;kills']);
						 unset($stats_array[$player_server_uid]['scores;deaths']);
						 unset($stats_array[$player_server_uid]['scores;suicides']);
						 //unset($stats_array[$player_server_uid]['scores;kill_series_db']);
						 //unset($stats_array[$player_server_uid]['scores;kill_series_minute_db']);
						 //unset($stats_array[$player_server_uid]['scores;kill_series_head_db']);
						 //unset($stats_array[$player_server_uid]['scores;kill_series_minute_head_db']);
						 //unset($stats_array[$player_server_uid]['death_series_db']);
						 //unset($stats_array[$player_server_uid]['scores;death_series_minute_db']);
						 //unset($stats_array[$player_server_uid]['death_series_head_db']);
						 //unset($stats_array[$player_server_uid]['death_series_minute_head_db']);
						 unset($stats_array[$player_server_uid]['mod;MOD_MELEE']);
						 unset($stats_array[$player_server_uid]['date']);
						 unset($stats_array[$player_server_uid]['damage;damage']);
						 //unset($stats_array[$player_server_uid]['weapons;']);
						 //unset($stats_array[$player_server_uid]['hitzones;']);
						 
						 
					}//if gui not empty

					}   
 					/// 
					} 
                }
            } /////////opt end in loop
            if ($okyopt > 0)
            {
                echo "\n\n  \033[38;5;178m Unset: GUID $guid / SERVER_GUID ", $player_server_uid, "  sql inserts -> ", $okyopt, "\033[38;5;46m \n\n";

                ++$whileopt;
                file_put_contents($loadopt, "" . $player_server_uid . "");
            }
        }
		
		
/////////////////////////////////////////////////////////////////////////////////////////  
/////////////////////////////////////////////////////////////////////////////////////////   
///////////////////////////////////       MAPS      /////////////////////////////////////   
/////////////////////////////////////////////////////////////////////////////////////////    
/////////////////////////////////////////////////////////////////////////////////////////		
    if(empty($activate_opt))
	{
if(!empty($maps_array)){
	$kills=0;$deaths=0;$rounds=0;
foreach($maps_array as $name => $a){
foreach($a as $kills => $b){
foreach($b as $deaths => $c){
foreach($c as $rounds => $gametype){

/*
INSERT INTO maps (s_port,name,gametype,kills,deaths,rounds)
VALUES (9531589043328961,'mp_carentan','war',4,0,0) 
ON DUPLICATE KEY
    UPDATE s_port='9531589043328961', name='mp_carentan', gametype='war', kills=4, deaths=0, rounds=0;
*/  

if((int)$kills+(int)$deaths > 0)
{
$sql = "INSERT INTO maps (s_port,name,gametype,kills,deaths,rounds)
VALUES (".$svipport.",'".$name."','".$gametype.";".$name."',".$kills.",".$deaths.",".$rounds.") 
ON DUPLICATE KEY
    UPDATE s_port='".$svipport."', gametype='".$gametype.";".$name."', kills=kills+".$kills.", deaths=deaths+".$deaths.", rounds=rounds+'".$rounds."'";
	
$ok = $dbmaps->query($sql);
 
//print $dbmaps->lastInsertId();

echo "\n  \033[38;5;178m MAP UPDATE \033[38;5;46m  # PORT $svipport # map - ",$name, " gametype - ",$gametype," kills - ",$kills," deaths - ",$deaths;	 

if($ok)	
  unset($maps_array[''.$name.''][$kills][$deaths][$rounds]);
 
$dbmaps = null;
$ok = null;	

}
	
}}}}}}

/////////////////////////////////////////////////////////////////////////////////////////  
/////////////////////////////////////////////////////////////////////////////////////////   
///////////////////////////////////       MAPS      /////////////////////////////////////   
/////////////////////////////////////////////////////////////////////////////////////////    
/////////////////////////////////////////////////////////////////////////////////////////		
		 
		
        if ($whileopt < $limitindb) $x_stop_lp = 7000; //break;
        $db4 = null;
        $db3 = null;
        $dbw3 = null;
        $dbm3day = null;
        $msqlconnect = null;

        require $cpath . 'ReCodMod/functions/null_db_connection.php';
    }
    catch(PDOException $e)
    {
        echo "\n\n\n ERROR -----=--=--=--=--=-", $e->getMessage();
        echo "\n\n\n";
        errorspdo('[' . $date . '] FILE:  ' . __FILE__ . ' LOADER  Exception : ' . $e->getMessage());
    }

}
//Обновление статистики *Начало
//exit;
//Обновление статистики *Конец
$spps = 50000;
 $activate_opt = 0;					 												 
	//sleep(5);

?>