<?php
if (!empty($stats_array)) {
	
	$stpp = 0;
	
                            if (!file_exists($cpath . 'ReCodMod/cache/loader_opt/')) mkdir($cpath . 'ReCodMod/cache/loader_opt/', 0777, true);
                            $string = str_replace(".", "_", $server_ip);
                            if (!file_exists($cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/')) mkdir($cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/', 0777, true);
                            //$statscronx = $cpath.'ReCodMod/cache/loader_opt/fast_up_'.$string.'_'.$server_port.'/';
                            if (!file_exists($cpath . 'ReCodMod/cache/loader_opt/fast_up_' . $string . '_' . $server_port . '/')) mkdir($cpath . 'ReCodMod/cache/loader_opt/fast_up_' . $string . '_' . $server_port . '/', 0777, true);
                            if (!file_exists($cpath . 'ReCodMod/cache/stats_register/')) mkdir($cpath . 'ReCodMod/cache/stats_register/', 0777, true);
                            if (!file_exists($cpath . 'ReCodMod/cache/stats_register/' . $server_ip . '_' . $server_port)) mkdir($cpath . 'ReCodMod/cache/stats_register/' . $server_ip . '_' . $server_port, 0777, true);
                          

        //$loadopt = $cpath . 'ReCodMod/cache/server_update_lock.log';
        //if (!file_exists($loadopt)) 
		///	touch($loadopt);


						  
  ////////////////////////лимит нагрузок
  if (empty($activate_opt)) {
    $geoonqx = 100;
    $limitindb = 100;
    $timeap = 1; $rand = 30;
	
	//debuglog(" [ $datetime ] " . (__FILE__) ."  ENDMAP $servername FINAL UPDATE");	
	
	$sleeping = (rand(100, 400))*15; //* 40
  }
  else {
    $geoonqx = 40;
    $limitindb = 40;
	if(!empty($rand))
		$timeap = rand(10, 100);
	else
        $timeap = 30;
	
	$sleeping = (rand(100, 1500))*3; //* 10
  }
  echo "\n \033[38;5;202m OPT $limitindb USERS LIMIT / SYNC STATS update \033[38;5;46m";
  if (empty($date)) $date = date('Y-m-d H:i:s');
  $okyopt = 0;
  $whileoptx = 0;
  $whileopt = 0;
  
if(empty($stpp))
{ 
	  $stpp = 1;
 
  
    foreach ($stats_array as $player_server_uid => $v) {
      $g = '';
      $o = '';
      $data = '';
      //$player_server_uid = 0;
      /////////////////// ОПТИМИЗАЦИЯ
      if ($whileoptx < $limitindb) {
        $string = str_replace(".", "_", $server_ip);
        $loadopt = $cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/' . $player_server_uid . '.log';
        if (!file_exists($loadopt)) touch($loadopt);
        $ciopt = filemtime($loadopt);
		
		
	if((!empty($stats_array[$player_server_uid]['scores;kills']))&&(!empty($stats_array[$player_server_uid]['scores;deaths'])))
	{
	  if(($stats_array[$player_server_uid]['scores;kills']) > 4)
		{
			if (!empty($activate_opt)) 
		           $ciopt = $ciopt * 10;
		}	
	}
		
		
        if (time() - $ciopt >= $timeap) {
          echo "\n ===> ", $player_server_uid;
		 
          /////////////////// ОПТИМИЗАЦИЯ
          $date = date('Y-m-d H:i:s');
          $czr = count($v);
          $counter = 0;
          $guid = '';
          $nickname = '';
		  if(!empty($table_hits))
			  unset($table_hits);
		  if(!empty($table_insert))
			  unset($table_insert);
		  if(!empty($valueSets))
			  unset($valueSets);
		  if(!empty($valueSetsw))
			  unset($valueSetsw);			
		  if(!empty($valueSetsz))
			  unset($valueSetsz); 
		  if(!empty($weaponSets))
			  unset($weaponSets);		  
                      
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
          $mod_melee = 0;
          $damage = 0;
          $city = '';
          $ping = 0;
		  //special
		  $flags = 0;
		  $saveflags = 0;
		  $camps = 0;
          $bomb_plant  = 0; 
		  $bomb_defused  = 0; 
		  $juggernaut_kill  = 0; 
		  $destroyed_helicopter = 0; 
		  $rcxd_destroyed = 0; 
		  $turret_destroyed = 0; 
		  $sam_kill = 0;
		  //special end		  
          foreach ($v as $g => $o) {
            if (strpos($g, 'guid') !== false) $guid = $o;
            else if (strpos($g, 'nickname') !== false) $nickname = $o;
            else if (strpos($g, 'scores;skill') !== false) $skill = $o;
            else if (strpos($g, 'scores;kills') !== false) $kills = $o;
            else if (strpos($g, 'scores;deaths') !== false) $deaths = $o;
            else if (strpos($g, 'scores;suicides') !== false) $suicides = $o;
			//special start
			else if (strpos($g, 'scores;camps') !== false) $camps = $o;
			else if (strpos($g, 'scores;flags') !== false) $flags = $o;
			else if (strpos($g, 'scores;saveflags') !== false) $saveflags = $o;
			else if (strpos($g, 'scores;bomb_plant') !== false) $bomb_plant = $o;
			else if (strpos($g, 'scores;bomb_defused') !== false) $bomb_defused = $o;
			else if (strpos($g, 'scores;juggernaut_kill') !== false) $juggernaut_kill = $o;
			else if (strpos($g, 'scores;destroyed_helicopter') !== false) $destroyed_helicopter = $o;
			else if (strpos($g, 'scores;rcxd_destroyed') !== false) $rcxd_destroyed = $o;
			else if (strpos($g, 'scores;turret_destroyed') !== false) $turret_destroyed = $o;			
			else if (strpos($g, 'scores;sam_kill') !== false) $sam_kill = $o;			
			//special end			
            else if ($g == 'scores;kill_series') $kill_series = $o;
            else if (strpos($g, 'scores;kill_series_db') !== false) $kill_series_db = $o;
            else if (strpos($g, 'scores;kill_series_minute_db') !== false) $kill_series_minute_db = $o;
            else if (strpos($g, 'scores;kill_series_head_db') !== false) $kill_series_head_db = $o;
            else if (strpos($g, 'scores;kill_series_minute_head_db') !== false) $kill_series_minute_head_db = $o;
            else if ($g == 'scores;death_series') $death_series = $o;
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
            else if (strpos($g, 'hitzones;') !== false) {
              list($table, $hit) = explode(';', $g);
              //$h hits zones
              $table_hits[$hit] = $o;
              if ($hit == 'head') $heads = $o;
			  if (empty($activate_opt))
              unset($stats_array[$player_server_uid]['hitzones;' . $hit]);
            }
            else if (strpos($g, 'weapons;') !== false) {
              list($table, $weap) = explode(';', $g);
              //$w weapons
              $w[$weap] = $o;
			  if (empty($activate_opt))
              unset($stats_array[$player_server_uid]['weapons;' . $weap]);
              ////////////////////############################################/////////////////////////
              ////////////////////###   STOCK COD1 - COD5 WEAPONS UPDATE   ###/////////////////////////
			  if(empty($table_update))
              $table_update = stock_weapons($w);
              ////////////////////###   STOCK COD1 - COD5 WEAPONS UPDATE   ###/////////////////////////
              ////////////////////############################################/////////////////////////
              
            }
            ++$counter;
            if ($counter == $czr) {
              if (!empty($guid)) {
                if (empty($ip)) list($ping, $ip, $i_name, $i_guid, $city) = explode(';', (rconExplode($guid)));
               
			   
		  //debuglog(" [ $datetime ] " . (__FILE__) ."  / $guid / $ip / $nickname / $servername ");
		   
	if (!empty($activate_opt)) {			
if (!empty($ip)){
				echo " \n MAMBA UP + x_db_players  ";
                $nickname = clearSymbols($nickname);
                $nickname = htmlentities($nickname);
	$sql = "INSERT INTO x_db_players 
				  (s_port,x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, x_db_conn, x_db_date, x_db_warn, x_date_reg, stat)
         VALUES ('$svipport','" . $nickname . "', '0', '$ip', '0', '$ping', '$guid', '1', '$date', '0', '$date', '1')
ON DUPLICATE KEY UPDATE x_db_date='" . $date . "', x_db_ip='" . $ip . "', x_db_name = '" . $nickname . "', x_db_conn=x_db_conn+1, x_db_guid='" . $guid . "'"; 
   $gt = dbInsert('',$sql);			
							if(!$gt) 
							{
                             errorspdo('[' . $datetime . '] 408  ' . __FILE__ . '  Exception : ' . $sql);							
							}				
 
 
 
 
 
 	$sql = "INSERT INTO x_up_players (name, ip, guid) VALUES ('" . $nickname . "','$ip','$guid')
ON DUPLICATE KEY UPDATE name = '" . $nickname . "', ip='" . $ip . "', guid='" . $guid . "'"; 
   $gtx = dbInsert('',$sql);			
							if(!$gtx) 
							{
                             errorspdo('[' . $datetime . '] 408  ' . __FILE__ . '  Exception : ' . $sql);							
							}
 
}
/*
else 
   { 
	errorspdo('[' . $date . '] 222 строка: нету rcon ответа! 
	' . __FILE__ . '  Exception : ' . $ping.', '.$ip.', '.$i_name.' '.$i_guid.' '.$city.' (Почему от rcon запроса не получили ответа, скорей должен знать администратор проекта, тут будет ip = 0 и ip = 1, 
	но мы не дали записать ИП 0 или 1, значит и игрока не будет в бд из-за этой проблемы!!)');
	}
*/


				
	}			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
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
                  if (!empty($maps_array)) {
                    foreach ($maps_array as $mapx => $a) {
                      foreach ($a as $killsx => $b) {
                        foreach ($b as $deathsx => $c) {
                          foreach ($c as $roundsx => $gametypex) {
                            unset($maps_array['' . $mapx . ''][$killsx][$deathsx][$roundsx]);
                            if ((!empty($kills)) && (!empty($deaths))) $maps_array['' . $mapx . ''][$killsx + $kills][$deathsx + $deaths][0] = '' . $gametypex . '';
                            else if ((!empty($kills)) && (empty($deaths))) $maps_array['' . $mapx . ''][$killsx + $kills][$deathsx][0] = '' . $gametypex . '';
                            else if ((empty($kills)) && (!empty($deaths))) $maps_array['' . $mapx . ''][$killsx][$deathsx + $deaths][0] = '' . $gametypex . '';
                          }
                        }
                      }
                    }
                  }
                  if (!empty($maps_array)) {
                    foreach ($maps_array as $mapname => $a) {
                      foreach ($a as $killsx => $b) {
                        foreach ($b as $deathsx => $c) {
                          foreach ($c as $roundsx => $gametypex) {
                            $xzet = trim($svipport . $guid . $mapname . $gametypex);
                            $gt_map_shid = abs(hexdec(crc32($xzet)));
							usleep($sleeping);
                            $sql = "INSERT INTO `playermaps` (`gt_map_shid`,`mapname`,`gametype`,`port`,`guid`,`kills`
							,`deaths`,`teamkills`,`teamdeaths`,`suicides`,`rounds`)
VALUES ('" . $gt_map_shid . "', '" . $mapname . "', '" . $gametypex . "', '" . $svipport . "', '" . $guid . "', '" . $kills . "', '" . $deaths . "', '0','0', '" . $suicides . "','" . $roundsx . "') 
ON DUPLICATE KEY
    UPDATE gt_map_shid='" . $gt_map_shid . "', mapname='" . $mapname . "', gametype='" . $gametypex . "', port='" . $svipport . "', guid='" . $guid . "', kills=kills + " . $kills . ", deaths=deaths + " . $deaths . ", rounds=rounds+'" . $roundsx . "'";
                             
							$ok = dbInsert('',$sql);
							 
                            echo "\n  \033[38;5;178m USER MAP UPDATE $gt_map_shid  \033[38;5;48m  # PORT $svipport # map - ", $mapname, " gametype - ", $gametypex, " kills - ", $kills, " deaths - ", $deaths;
                             
							if(!$ok) 
							{
                             errorspdo('[' . $datetime . '] 408  ' . __FILE__ . '  Exception : ' . $sql);							
							}
							$ok = null;
							
                          }
                        }
                      }
                    }
                  }
                  ////////////////////////////////////////////////////////////////////////////////////////////////
                  ////////////////////////////////////////////////////////////////////////////////////////////////
                  ///////////////////////////////////       PLAYER MAPS      /////////////////////////////////////
                  ////////////////////////////////////////////////////////////////////////////////////////////////
                  ////////////////////////////////////////////////////////////////////////////////////////////////
				  
				  
 


				  
				  
				  
                  ++$okyopt;
				  
				  
				  
 
 
 
 
 
 
 
  
//Оптимизация РЦМ 5.9 версия
//Если сумма ноль, не дергаем бд				
if(((int)$camps + (int)$flags + (int)$saveflags + (int)$bomb_plant + (int)$bomb_defused + (int)$juggernaut_kill + (int)$destroyed_helicopter
+ (int)$rcxd_destroyed + (int)$turret_destroyed + (int)$sam_kill) > 0)
{ 				
usleep($sleeping);
$querySQL = "update db_stats_3 set 
								camp=camp + " . $camps . ",
								flags=flags + " . $flags . ",
								saveflags=saveflags + " . $saveflags . ",
                                bomb_plant=bomb_plant + " . $bomb_plant . ",
								bomb_defused=bomb_defused + " . $bomb_defused . ",
								juggernaut_kill=juggernaut_kill + " . $juggernaut_kill . ",
								destroyed_helicopter=destroyed_helicopter + " . $destroyed_helicopter . ",
								rcxd_destroyed=rcxd_destroyed + " . $rcxd_destroyed . ",
								turret_destroyed=turret_destroyed + " . $turret_destroyed . ",
								sam_kill=sam_kill + " . $sam_kill . "  where s_pg=".$player_server_uid."";
 
                             $query = dbInsert('',$querySQL);
							 
							if(!$query) 
							{
                             errorspdo('[' . $datetime . '] 509  ' . __FILE__ . '  Exception : ' . $querySQL);							
							}						
 							$query = null;	
echo "\n  \033[38;5;178m db_stats_3 \033[38;5;46m",$player_server_uid;																
}												
			 
 
 





 
 
 
 

  /////////////////////////////////////// update skill
                if (!empty($skill)) {
					
		$xx = dbLazy('','select s_pg,s_kills,s_deaths from db_stats_1 WHERE s_pg = "' . $player_server_uid . '" and s_kills>=1  and s_deaths>=1 limit 1');	
$killsfrom = '0.2';
$deathsfrom = '1';
if(is_object($xx))
  foreach ($xx as $keym => $value) {
    if ($keym == 's_kills') $killsfrom = $value;
    else if ($keym == 's_deaths') $deathsfrom = $value;
  }    
  
  echo "\n skill: ", $player_server_uid, " - ", $skill, " ~~~~~ ";
                  usleep($sleeping);
                  if ($skill < 0) $skill = 100;
				  usleep(10000);
  $gt = dbInsert('',"INSERT INTO db_stats_2 
(s_pg, s_port, w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min) 
VALUES ('" . $player_server_uid . "','$svipport','0','1000','0','0','0','0','$ip','0','0','0','0','0','0')
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', w_skill=" . $skill . ", w_ratio=" . $killsfrom/$deathsfrom . ",w_ip='" . $ip . "'");
	 
 							if(!$gt) 
							{
                             errorspdo('[' . $datetime . '] 524  ' . __FILE__ . '  Exception : ' . $querySQL);							
							}                 
				  $gt = null;
                  $player_skill_reg = $cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/ID_SPG_' . $player_server_uid . '.log';
                  if (!file_exists($player_skill_reg)) touch($player_skill_reg);
                  if (file_exists($player_skill_reg)) {
                    $fpl = fopen($player_skill_reg, 'w');
                    fwrite($fpl, $skill . "%" . $player_server_uid . "\n");
                    fclose($fpl);
                  }
                  $skillog = $cpath . 'ReCodMod/cache/x_logs/' . $server_ip . '_' . $server_port . '_players_skill.log';
                  if (!file_exists($skillog)) touch($skillog);
                  if (!empty(skill_log)) {
                    if (file_exists($skillog)) {
                      $fpl = fopen($skillog, 'a');
                      fwrite($fpl, "=== SKILL update #1: " . $skill . "%" . $player_server_uid . " === \n\n");
                      fclose($fpl);
                    }
                  }
                  unset($stats_array[$player_server_uid]['scores;skill']);
                }
				else
				{ 	
//###############################################################					
usleep(10000);
		$xx = dbLazy('','select s_pg,s_kills,s_deaths from db_stats_1 WHERE s_pg = "' . $player_server_uid . '" and s_kills>=1  and s_deaths>=1 limit 1');	
$killsfrom = '0.2';
$deathsfrom = '1';
if(is_object($xx))
  foreach ($xx as $keym => $value) {
    if ($keym == 's_kills') $killsfrom = $value;
    else if ($keym == 's_deaths') $deathsfrom = $value;
  }

  $gt = dbInsert('',"INSERT INTO db_stats_2 
(s_pg, s_port, w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min) 
VALUES ('" . $player_server_uid . "','$svipport','0','1000','" . $killsfrom/$deathsfrom . "','0','0','0','$ip','0','0','0','0','0','0')
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', w_ratio=" . $killsfrom/$deathsfrom . ",w_ip='" . $ip . "'");					
//###############################################################						
					
				}
/////////////////////////////////////// update skill
	



 		  
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
	$querySQL = "INSERT INTO db_stats_1 (s_pg,s_kills,s_deaths,s_heads,s_suicids,s_fall,s_melle,s_dmg) 
				  VALUES ('$player_server_uid','$kills','$deaths','$heads','$suicides','0','$mod_melee','$damage')
ON DUPLICATE KEY UPDATE s_pg='" . $player_server_uid . "', $summdb1 s_dmg=s_dmg + $damage";		  
				  
 $t = dbInsert('',$querySQL);
	
				   			if(empty($t))
							{
                             errorspdo('[' . $datetime . '] 556  ' . __FILE__ . '  Exception : ' . $querySQL);							
							}
                  $t = null; 
                  echo "\n  \033[38;5;175m opt db_stats_1 update: $summdb1 \033[38;5;46m", $player_server_uid;
                
/*	*/			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			
				
	 			if (empty($activate_opt)) {		
                usleep($sleeping);
                 $player_main_id = '';
             $result = dbLazy('',"SELECT id,s_pg,n_kills,n_deaths,n_heads,n_kills_min FROM db_stats_2 where s_pg='$player_server_uid' LIMIT 1");					
                if (!empty($result)) {
                  foreach ($result as $key => $value) {
                    if (!empty($key)) {
                      if ($key == 'n_deaths') $n_deaths = $value;
                      if ($key == 'n_kills') $n_kills = $value;
                      if ($key == 'n_heads') $n_heads = $value;
                      if ($key == 'n_kills_min') $n_kills_min = $value;
                      if ($key == 'id') $player_main_id = $value;
                      usleep($sleeping);
                      if (empty($n_deaths)) $n_deaths = 0;
                      if (empty($n_kills)) $n_kills = 0;
                      if (empty($n_kills_min)) $n_kills_min = 0;
                      if (empty($n_heads)) $n_heads = 0;
                      if ($kill_series_minute_db > $n_kills_min) 
					  $ec = dbInsert('',"update db_stats_2 set n_kills_min=" . $kill_series_minute_db . " where id='" . $player_main_id . "'");
					  if (($death_series_db > $n_deaths) && ($kill_series_db > $n_kills)) 
					  $ec = dbInsert('',"update db_stats_2 set n_kills=" . $kill_series_db . ",n_deaths= " . $death_series_db . " where id='" . $player_main_id . "'");
					  else if ($death_series_db > $n_deaths)
                      $ec = dbInsert('',"update db_stats_2 set n_deaths= " . $death_series_db . " where id='" . $player_main_id . "'");
					  else if ($kill_series_db > $n_kills) 
                      $ec = dbInsert('',"update db_stats_2 set n_kills=" . $kill_series_db . " where id='" . $player_main_id . "'");
					  if ($kill_series_head_db > $n_heads) 
                      $ec = dbInsert('',"update db_stats_2 set n_heads=" . $kill_series_head_db . " where id='" . $player_main_id . "'");
                    }
                  }
				   $result = null;
                }
                /////////////////////////////////////// update scores db
//////////////////////////////////////////////////////////////////////////////
				}

/*	*/



				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
 				
				
		if (empty($activate_opt)) {			
				
                /////////////////////////////////////// update user db
                if (!empty($nickname)) {
					usleep($sleeping);
                  $w_n = clearSymbols($nickname);
                  $w_n = htmlentities($w_n);
				  
				  $nickname = str_replace("'", "", $nickname);
				  $nickname = str_replace("`", "", $nickname);
				  
				  $w_n = str_replace("'", "", $w_n);
				  $w_n = str_replace("`", "", $w_n);
				  $w_n = str_replace('"', '', $w_n);
				   $w_n = str_replace('{', '', $w_n);
				   $w_n = str_replace('}', '', $w_n);
				  
                  if (strlen($w_n) > 25) $w_n = mb_strimwidth($w_n, 0, 25, "");
	   
$querySQL = "INSERT INTO db_stats_0 (s_pg,s_guid,s_port,servername,s_player,s_time,s_lasttime) 
VALUES ('$player_server_uid','$guid', '$svipport', '" . $servername . "','" . $w_n . "','$date','$date')
ON DUPLICATE KEY UPDATE s_pg='" . $player_server_uid . "', s_lasttime='" . $date . "', s_player='" . $w_n . "'";		

$t = dbInsert('',$querySQL);		  
				   
                  usleep(10000);
				   
				   			if(!$t) 
							{
                             errorspdo('[' . $datetime . '] 556  ' . __FILE__ . '  Exception : ' . $querySQL);							
							}
                  $t = null;
                }
                /////////////////////////////////////// update user db
				//////////////////////////////////////////////////////////////////////////////
    			unset($stats_array[$player_server_uid]['nickname']);
                unset($stats_array[$player_server_uid]['date']); 
		}	
				
 		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
	 			
	if (empty($activate_opt)) {			
				
                /////////////////////////////////////// update hit zones db
                if (!empty($table_hits)) {
                  $valueSetsw = array();
                  foreach ($table_hits as $key => $value) {
                    $valueSetsw[] = $key . " =  " . $key . " + " . $value . "";
                    //txt_db($server_ip, $server_port, $guid, 'hitzones;' . $key, $value, 1);
                  }
				  if(!empty($valueSetsw))
                  $joi = join(",", $valueSetsw);
                  if (!empty($joi)) {
                    usleep($sleeping);
					 
$querySQL = "INSERT INTO db_stats_hits (s_pg,head,torso_lower,torso_upper,right_arm_lower,left_leg_upper,neck,right_arm_upper,left_hand,
left_arm_lower,none,right_leg_upper,left_arm_upper,right_leg_lower,left_foot,right_foot,right_hand,left_leg_lower)
 VALUES ('$player_server_uid','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0')
ON DUPLICATE KEY UPDATE s_pg=" . $player_server_uid . ", " . $joi . "";	
$query = dbInsert('',$querySQL);	
 
							if(!$query) 
							{
                             errorspdo('[' . $datetime . '] 578  ' . __FILE__ . '  Exception : ' . $querySQL);							
							}
                    $query = null;
                    echo "\n  \033[38;5;175m opt db_stats_hits UPDATE: $joi \033[38;5;46m", $player_server_uid;
                  }
                }
                /////////////////////////////////////// update hit zones db
				//////////////////////////////////////////////////////////////////////////////
    			unset($stats_array[$player_server_uid]['nickname']);
                unset($stats_array[$player_server_uid]['scores;kills']);
                unset($stats_array[$player_server_uid]['scores;deaths']);
                unset($stats_array[$player_server_uid]['scores;suicides']);
				unset($stats_array[$player_server_uid]['mod;MOD_MELEE']);
                unset($stats_array[$player_server_uid]['date']);
                unset($stats_array[$player_server_uid]['damage;damage']);
                
	}		
				
				
 			
				
				
				
				
				
				
				
				
		


















		
				
				
				
				
 		
				
				
				
				
        		////////////////////############################################/////////////////////////
                ////////////////////###   STOCK COD1 - COD5 WEAPONS INSERT   ###/////////////////////////
                // $wp = ''; $wps = ''; $wprg = ''; $wpnm = ''; $table_insert = ''; $wweapons = '';
                if (!empty($wp)) unset($wp);
                require $cpath . 'ReCodMod/functions/costum_array/weapons/cod.php';
                $table_insert = stock_weapons($wp);
                ////////////////////###   STOCK COD1 - COD5 WEAPONS INSERT   ###/////////////////////////
                ////////////////////############################################///////////////////////// 
				/////////////////////////////////////// update weapons db
                for ($i = 1;$i <= 20;$i++) {
                  if (!empty($table_update[$i])) {
//////////////////////////////////////					  
                  if (!empty($table_insert[$i])) {
                    $valueSetsz = array();
                    foreach ($table_insert[$i] as $wweapons => $value) {
                      $valueSetsz[] = "'0'"; //'' . $value . '';
                      $weaponSets[] = $wweapons;
                      //txt_db($server_ip, $server_port, $guid, 'weapons;' . $wweapons, $value, 1);
                    } 
                    $join_values = join(",", $valueSetsz);
				   if(!empty($weaponSets))
                    $join_weapon = join(",", $weaponSets);	  
                  }					  
//////////////////////////////////////    
                    $valueSets = array();
                    foreach ($table_update[$i] as $key => $value) {
                      $valueSets[] = $key . " =  " . $key . " + " . $value . "";
                      //txt_db($server_ip, $server_port, $guid, 'weapons;' . $key, $value, 1);
                    }
					if(!empty($valueSets))
                    $join = join(",", $valueSets);
                    if (!empty($join)) {
                      usleep($sleeping);
$querySQL = "INSERT INTO db_weapons_$i (s_pg,$join_weapon) VALUES ('$player_server_uid',$join_values) 
ON DUPLICATE KEY UPDATE s_pg=" . $player_server_uid . ", " . $join . "";	
$query = dbInsert('',$querySQL);	
                      unset($table_insert[$i]);					  
					  	if(!$query) 
							{
                             errorspdo('[' . $datetime . '] 603  ' . __FILE__ . '  Exception : ' . $querySQL);							
							}
                      $query = null;
                      echo "\n  \033[38;5;175m opt db_weapons_$i UPDATE: $join \033[38;5;46m", $player_server_uid;
                      unset($table_update[$i]);
                    }
                    unset($join);
					$join_values = '';
                    $join_weapon = ''; 
                    unset($valueSetsz);
                    unset($weaponSets);
                  }
                }
                /////////////////////////////////////// update weapons db
                /////////////////////////////////////////////////////////////////
				 
				
 				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
 		
	if (empty($activate_opt)) {	 			
		 			
                ///////////////////////////  DAY AND WEEK STATS //////////////////////////////////////////////////
                
                if (!empty($nickname)) {
                  if (((int)$kills + (int)$deaths + (int)$heads) > 0) {
					usleep($sleeping);  
                    if (empty($w_n)) $sql = "INSERT INTO db_stats_day (servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . "," . $deaths . "," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_kills=s_kills + " . $kills . ", s_deaths=s_deaths + " . $deaths . ", s_heads=s_heads + " . $heads . ",s_lasttime='" . $date . "'";
                    else $sql = "INSERT INTO db_stats_day 
					(servername,s_pg,w_guid,w_port,s_player,s_kills,s_deaths,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . "," . $deaths . "," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_player='" . $w_n . "', s_kills=s_kills + " . $kills . ", s_deaths=s_deaths + " . $deaths . ", s_heads=s_heads + " . $heads . ",s_lasttime='" . $date . "'";
                    
					if (empty($w_n)) $sql2 = "INSERT INTO db_stats_week 
					(servername,s_pg,w_guid,w_port,s_player,s_kills,s_killsweap,s_killsweap_min,s_deaths,s_deathsweap_min,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . ",0,0," . $deaths . ",0," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_kills=s_kills + " . $kills . ", s_deaths=s_deaths + " . $deaths . ", s_heads=s_heads + " . $heads . ",s_lasttime='" . $date . "'";
                    else $sql2 = "INSERT INTO db_stats_week 
					(servername,s_pg,w_guid,w_port,s_player,s_kills,s_killsweap,s_killsweap_min,s_deaths,s_deathsweap_min,s_heads,s_time,s_lasttime)
VALUES ('" . $servername . "','" . $player_server_uid . "','" . $guid . "','" . $svipport . "','" . $w_n . "'," . $kills . ",0,0," . $deaths . ",0," . $heads . ",'" . $date . "','" . $date . "') 
ON DUPLICATE KEY
    UPDATE s_pg='" . $player_server_uid . "', s_player='" . $w_n . "', s_kills=s_kills + " . $kills . ", s_deaths=s_deaths + " . $deaths . ", s_heads=s_heads + " . $heads . ",s_lasttime='" . $date . "'";
                   
 
               $cc = dbInsert('',$sql2);
               $ff = dbInsert('',$sql); 
			   
							if(!$cc) 
							{
                             errorspdo('[' . $datetime . '] 639  ' . __FILE__ . '  Exception : ' . $sql);							
							}
							if(!$ff) 
							{
                             errorspdo('[' . $datetime . '] 643  ' . __FILE__ . '  Exception : ' . $sql);							
							}
					$cc = null;
					$ff = null;
                    echo "\n  \033[38;5;178m db_stats_week \033[38;5;46m", $player_server_uid;
                    echo "\n  \033[38;5;178m db_stats_day \033[38;5;46m Ф: $kills + П: $deaths + Г: $heads ", $player_server_uid;
                  }
                }
                ///////////////////////////  DAY AND WEEK STATS ////////////////////////
			   
//////////////////////////////////////////////////////////////////////////////
    			unset($stats_array[$player_server_uid]['nickname']);
                unset($stats_array[$player_server_uid]['scores;kills']);
                unset($stats_array[$player_server_uid]['scores;deaths']);
                unset($stats_array[$player_server_uid]['scores;suicides']);
				unset($stats_array[$player_server_uid]['mod;MOD_MELEE']);
                unset($stats_array[$player_server_uid]['date']);
                unset($stats_array[$player_server_uid]['damage;damage']);
	} 				
				
  		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                unset($table_insert);
                ++$whileoptx;
                $g = '';
                $o = '';
                //unset($stats_array[$player_server_uid]['scores;skill']);
 
            //specials start
			unset($stats_array[$player_server_uid]['scores;camps']);
			unset($stats_array[$player_server_uid]['scores;flags']);
			unset($stats_array[$player_server_uid]['scores;saveflags']);
			unset($stats_array[$player_server_uid]['scores;bomb_plant']);
			unset($stats_array[$player_server_uid]['scores;bomb_defused']);
			unset($stats_array[$player_server_uid]['scores;juggernaut_kill']);
			unset($stats_array[$player_server_uid]['scores;destroyed_helicopter']);
			unset($stats_array[$player_server_uid]['scores;rcxd_destroyed']);
			unset($stats_array[$player_server_uid]['scores;turret_destroyed']);			
			unset($stats_array[$player_server_uid]['scores;sam_kill']);					
			//specials end	
                //unset($stats_array[$player_server_uid]['scores;kill_series_db']);
                //unset($stats_array[$player_server_uid]['scores;kill_series_minute_db']);
                //unset($stats_array[$player_server_uid]['scores;kill_series_head_db']);
                //unset($stats_array[$player_server_uid]['scores;kill_series_minute_head_db']);
                //unset($stats_array[$player_server_uid]['death_series_db']);
                //unset($stats_array[$player_server_uid]['scores;death_series_minute_db']);
                //unset($stats_array[$player_server_uid]['death_series_head_db']);
                //unset($stats_array[$player_server_uid]['death_series_minute_head_db']);
                //unset($stats_array[$player_server_uid]['weapons;']);
                //unset($stats_array[$player_server_uid]['hitzones;']);
			 
		if($geoonqx > 10)
		{	
       if(!empty($chat_flooder_time[$player_server_uid]))
	   {		   
		  unset($chat_flooder_time[$player_server_uid]);
          unset($chat_flooder_warns[$player_server_uid]);
          unset($chat_flooder_msg[$player_server_uid]);
        }
		}		
			 	
                
              } //if gui not empty
              
            }
            ///
            
          }
		  
        echo "\n\n  \033[38;5;178m Unset: GUID $guid / SERVER_GUID ", $player_server_uid, "  sql inserts -> ", $okyopt, "\033[38;5;46m \n\n";
        ++$whileopt;
        file_put_contents($loadopt, "" . $player_server_uid . "");		  
        }
      } /////////opt end in loop
      //if ($okyopt > 0) {
      //
      //   }
    }
    /////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////       MAPS      /////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
 
    if (empty($activate_opt)) {
      if (!empty($maps_array)) {
        $kills = 0;
        $deaths = 0;
        $rounds = 0;
        foreach ($maps_array as $name => $a) {
          foreach ($a as $kills => $b) {
            foreach ($b as $deaths => $c) {
              foreach ($c as $rounds => $gametype) {
                
                //INSERT INTO maps (s_port,name,gametype,kills,deaths,rounds)
                //VALUES (9531589043328961,'mp_carentan','war',4,0,0)
                //ON DUPLICATE KEY
                //UPDATE s_port='9531589043328961', name='mp_carentan', gametype='war', kills=4, deaths=0, rounds=0;
                
                if ((int)$kills + (int)$deaths > 0) {
					usleep($sleeping);
                  $sql = "INSERT INTO maps (s_port,name,gametype,kills,deaths,rounds)
VALUES (" . $svipport . ",'" . $name . "','" . $gametype . ";" . $name . "'," . $kills . "," . $deaths . "," . $rounds . ") 
ON DUPLICATE KEY
    UPDATE s_port='" . $svipport . "', gametype='" . $gametype . ";" . $name . "', kills=kills + " . $kills . ", 
	deaths=deaths + " . $deaths . ", rounds=rounds+'" . $rounds . "'";
           
		   
	$ok = dbInsert('',$sql);			  
				  
				  
                  //print $mysqlcon->lastInsertId();
                  echo "\n  \033[38;5;178m MAP UPDATE \033[38;5;46m  # PORT $svipport # map - ", $name, " gametype - ", $gametype, " kills - ", $kills, " deaths - ", $deaths;
                  if ($ok) unset($maps_array['' . $name . ''][$kills][$deaths][$rounds]);
							if(!$ok) 
							{
                             errorspdo('[' . $datetime . '] 692  ' . __FILE__ . '  Exception : ' . $sql);							
							}	
                   $ok = null;							
                }
              }
            }
          }
        }
      }
    }
	 
    /////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////       MAPS      /////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////
    if ($whileopt < $limitindb) $x_stop_lp = 7000; //break;
 
  
 $stpp = 0; 
}



}
//Обновление статистики *Начало
//exit;
//Обновление статистики *Конец
$spps = 50000;
$activate_opt = 0;
//sleep(5);

?>