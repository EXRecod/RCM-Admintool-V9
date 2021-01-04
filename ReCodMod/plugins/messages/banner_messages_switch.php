<?php
switch ($command) {
    //######################################################
    //################################################# top_total
    //######################################################
    
  case 'top_total':
    $dbSelArray = dbSelectArray('', 'SELECT t1.*, t2.* from db_stats_0 t1 join (select * from db_stats_1) t2 ON t1.s_pg = t2.s_pg where t1.s_port = "' . $svipport . '" ORDER BY (t2.s_kills+0)  DESC LIMIT 3');
    rcon("say  ^3[ ^6" . $stats_top . " 3 ^7by ^1kills ^7& ^2" . $played_top . "^3]", "");
    if (!empty($dbSelArray)) {
      foreach ($dbSelArray as $row) {
        $playername = $row['s_player'];
        $ipm = $row['s_kills'];
        $r = $row['s_time'];
        $lasttime = $k;
        $time = $r;
        if (strpos($lasttime, '-') !== false) {
          if (strpos($time, '-') !== false) {
            $datetime1 = date_create($lasttime);
            $datetime2 = date_create($time);
            $interval = date_diff($datetime1, $datetime2);
            $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
            $played = cleart($playedp);
          }
        }
        if (empty($played)) $info_play = '';
        else $info_play = $played;
        rcon("say ^3[^6" . ++$number . "^3] ^7 " . html_entity_decode($playername) . "^0 : ^1" . substr($ipm, 0, 8) . " ^2" . $info_play, "");
      }
    }
    break;
    //######################################################
    //################################################# today
    //######################################################
    
  case 'today':
    $message = "today";
    $number = 0;
    try {
        $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
        if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass);
        $db3 = $msqlconnect;
      $today = date("Y-m-d");
      $sql = 'SELECT COUNT(*) AS id FROM db_stats_0 where s_lasttime LIKE :today';
      $reponse = $db3->prepare($sql);
      $reponse->bindValue(':today', '%' . $today . '%');
      $reponse->execute();
      $number_of_rows = $reponse->fetchColumn();
      $number = 0;
      rcon("say  ^3[ ^6" . $ntodayz . " ^7" . $number_of_rows . " ^3]", "");
      require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
    }
    catch(PDOException $e) {
      errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
    }
    echo " \n\n [" . $datetime . "] Message -> " . meessagee($message) . " \n Paused -> " . $tfinishh = (microtime(true) - $start) . " seconds \n";
    break;
    //######################################################
    //################################################# top_skill
    //######################################################
    
  case 'top_skill':
    $dbSelArray = dbSelectArray('', "SELECT P.servername,
  P.s_pg,P.s_port,P.s_player,P.s_lasttime,P.s_time,
  C.s_pg,C.w_skill
      FROM db_stats_0 P INNER JOIN db_stats_2 C 
	     ON P.s_pg = C.s_pg where P.s_port = '" . $svipport . "' ORDER BY (w_skill+0) DESC LIMIT 3");
    $number = 0;
    rcon("say  ^3[ ^6" . $stats_top . " 3 ^7by ^1" . $stats_skill . " ^7& ^2" . $played_top . "^3]", "");
    if (!empty($dbSelArray)) {
      foreach ($dbSelArray as $row) {
        $playername = $row['s_player'];
        $ipm = $row['w_skill'];
        $k = $row['s_lasttime'];
        $r = $row['s_time'];
        $lasttime = $k;
        $time = $r;
        if (strpos($lasttime, '-') !== false) {
          if (strpos($time, '-') !== false) {
            $datetime1 = date_create($lasttime);
            $datetime2 = date_create($time);
            $interval = date_diff($datetime1, $datetime2);
            $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
            $played = cleart($playedp);
          }
        }
        if (empty($played)) $info_play = '';
        else $info_play = $played;
        rcon("say ^3[^6" . ++$number . "^3] ^7 " . html_entity_decode($playername) . "^0 : ^1" . substr($ipm, 0, 8) . " ^2" . $info_play, "");
      }
    }
    break;
    //######################################################
    //################################################# top_day
    //######################################################
    
  case 'top_day':
    $dbSelArray = dbSelectArray('', "SELECT * FROM db_stats_day WHERE s_kills>=50 and w_port='$svipport' ORDER BY (s_kills+0) DESC LIMIT 3");
    $number = 0;
    rcon("say  ^3[ ^6" . $day_top . " 3 ^7by ^1kills ^7& ^2" . $played_top . "^3]", "");
    if (!empty($dbSelArray)) {
      foreach ($dbSelArray as $row) {
        $playername = $row['s_player'];
        $ipm = $row['s_kills'];
        $k = $row['s_lasttime'];
        $r = $row['s_time'];
        $lasttime = $k;
        $time = $r;
        if (strpos($lasttime, '-') !== false) {
          if (strpos($time, '-') !== false) {
            $datetime1 = date_create($lasttime);
            $datetime2 = date_create($time);
            $interval = date_diff($datetime1, $datetime2);
            $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
            $played = cleart($playedp);
          }
        }
        if (empty($played)) $info_play = '';
        else $info_play = $played;
        rcon("say ^3[^6" . ++$number . "^3] ^7 " . html_entity_decode($playername) . "^0 : ^1" . substr($ipm, 0, 8) . " ^2" . $info_play, "");
      }
    }
    break;
    //######################################################
    //################################################# top_week
    //######################################################
    
  case 'top_week':
    $dbSelArray = dbSelectArray('', "SELECT * FROM db_stats_week WHERE s_kills>=100 and w_port='$svipport' ORDER BY (s_kills+0) DESC LIMIT 3");
    $number = 0;
    rcon("say  ^3[ ^6" . $week_top . " 3 ^7by ^1kills ^7& ^2" . $played_top . "^3]", "");
    if (!empty($dbSelArray)) {
      foreach ($dbSelArray as $row) {
        $playername = $row['s_player'];
        $ipm = $row['s_kills'];
        $k = $row['s_lasttime'];
        $r = $row['s_time'];
        $lasttime = $k;
        $time = $r;
        if (strpos($lasttime, '-') !== false) {
          if (strpos($time, '-') !== false) {
            $datetime1 = date_create($lasttime);
            $datetime2 = date_create($time);
            $interval = date_diff($datetime1, $datetime2);
            $playedp = $interval->format('%y years %M months %D days %H h. %I min.');
            $played = cleart($playedp);
          }
        }
        if (empty($played)) $info_play = '';
        else $info_play = $played;
        rcon("say ^3[^6" . ++$number . "^3] ^7 " . html_entity_decode($playername) . "^0 : ^1" . substr($ipm, 0, 8) . " ^2" . $info_play, "");
      }
    }
    break;
    //######################################################
    //################################################# next_map
    //######################################################
    
  case 'next_map':
$getinf = 'sv_mapRotation';
require $cpath.'ReCodMod/functions/getinfo/_main_getinfo.php';
    fclose($connx);
    //$emaprun - current map
    //$mapsxc - current game type and map rotation.
    if (empty($emaprun)) {
      $status = new COD4xServerStatus($server_ip, $server_port);
      if ($status->getServerStatus()) {
        $status->parseServerData();
        $serverStatus = $status->returnServerData();
        if (empty($emaprun)) echo $emaprun = $serverStatus['mapname'];
      }
    }
    if (preg_match('/\b' . $emaprun . '\b\s\b(.+)/iu', $mapsxc, $match)) {
      $mapnamekl = explode(trim($emaprun) , $mapsxc);
      $mapnamekl[1] = preg_replace("/\b[a-z]{1,4}\b/iu", "", $mapnamekl[1]);
      $lll = preg_replace("/\W*\b/iu", "%%", $mapnamekl[1]);
      $emaprunln = explode('%%%%', $lll);
      echo "  next map";
      echo '---> ' . $emaprunl = $emaprunln[1];
    }
    if (empty($emaprunl)) $emaprunl = 'Unknown';
    rcon('say ' . $infoomnxtt . ' ^7' . $emaprunl . '', '');
    break;
  }
?>