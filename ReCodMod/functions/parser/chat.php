<?php
if ($x_stop_lp == 0) {
  if (preg_match('/tell;/', $parseline, $xm)) {
    foreach (count_chars($parseline, 1) as $i => $val) {
      if (((chr($i)) == ";") && ($val < 9)) list($f, $forguidn, $foridnum, $fornick, $guidn, $idnum, $nickr, $msgr) = explode(';', $parseline);
    }
  }
  else {
    list($f, $guidn, $idnum, $nickr, $msgr) = explode(';', $parseline);
    $guidnk = $guidn;
  }
  $msgOclear = '';
  if (empty($nickr)) $nickr = '';
  if (empty($msgr)) $msgr = '???';
  $nickr = str_replace("'", "", $nickr);
  $nickr = str_replace("~", "", $nickr);
  $nickr = str_replace('"', '', $nickr);
  $nickr = str_replace(';', '', $nickr);
  $nickr = str_replace('*', '', $nickr);
  $nickr = str_replace('`', '', $nickr);
  // $msgr      = mb_strtolower($msgr, 'cp1251');
  $originalz = $nickr;
  $msgr = trim(dddzz($msgr));
  if (strpos($f, ' ') !== false) list($n, $f) = explode(' ', $f);
  echo "\n\033[38;5;202m[$f]\033[38;5;46m: [", $datetime, "] : ", $nickr, " : ", $msgr;
  AddToLog1clear("[" . $datetime . "] " . $guidn . " : " . $nickr . " : " . $msgr . "");
  if ((preg_match("/^" . ixz . "/", $msgr)) || (preg_match("/^" . ixzadmins . "/", $msgr))) {
    $iiiii = @iconv("windows-1251", "utf-8", $msgr);
    $iiiii = rus2translit($iiiii);
    $msgr = @iconv("windows-1251", "utf-8", $iiiii);
    require $cpath . 'ReCodMod/functions/funcx/commands_array.php';
    if (strpos($game_patch, 'cod1_1.1') === false) {
      if (empty($stats_array[$conisq]['ip_adress'])) {
        list($i_ping, $i_ip, $i_name, $i_guid, $xxccode, $city, $country) = explode(';', (rconExplode($guidn)));
        $stats_array[$conisq]['ip_adress'] = $i_ip;
        if (empty($stats_array[$conisq]['city'])) $stats_array[$conisq]['city'] = $xxccode;
        if (empty($stats_array[$conisq]['ping'])) $stats_array[$conisq]['ping'] = $i_ping;
      }
    }
    if ($validCommand == 1) {
      echo "\n[" . $stats_array[$conisq]['user_status'] . "-CMD] : [", $datetime, "] : " . $nickr . " : " . $msgr;
      if ($stats_array[$conisq]['user_status'] != 'registered') {
        /* CONTROL PLUGINS */
        $allplugs = getDirContents($cpath . 'ReCodMod/plugins/admin/');
        foreach ($allplugs AS $va) {
          if (strpos($va, '.php') !== false) {
            require $va;
          }
        }
      }
      /* ANOTHER PLUGINS */
      $allplugs = getDirContents($cpath . 'ReCodMod/plugins/cmd/');
      foreach ($allplugs AS $va) {
        if (strpos($va, '.php') !== false) {
          require $va;
        }
      }
      /* VOTE PLUGINS */
      //.vote.ini LOADER
      $config_data = parse_ini_file($cpath . "cfg/vote.ini", true);
      foreach ($config_data as $section => $r) {
        foreach ($r as $string => $value) {
          if (!defined($string)) define($string, $value);
        }
      }
      //.vote.ini LOADER
      $allplugs = getDirContents($cpath . 'ReCodMod/plugins/vote/');
      foreach ($allplugs AS $va) {
        if (strpos($va, '.php') !== false) {
          require $va;
        }
      }
    }
    //
    if ((empty($validCommand)) && (empty($vcs))) {
      if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^7' . $nickr . ' ^3' . $nocommand . ' ^1!cmd ^2https:^2/^2/github.com^2/EXRecod^2/RCM-Admintool-V5^2/wiki^2/Commands', '');
      else rcon('tell ' . $idnum . ' ^3' . $nocommand . ' ^1!cmd ^2https:^2/^2/github.com^2/EXRecod^2/RCM-Admintool-V5^2/wiki^2/Commands', '');
    }
    else if (empty($validCommand)) {
      if ($stats_array[$conisq]['user_status'] != 'registered') {
        if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^7' . $nickr . ' ^1NO PERMISSIONS FOR THIS COMMAND!', '');
        else rcon('tell ' . $idnum . ' ^1NO PERMISSIONS FOR THIS COMMAND!', '');
      }
      else {
        if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ^7' . $nickr . ' ^3NO PERMISSIONS FOR THIS COMMAND, use ^7!register ^1!', '');
        else rcon('tell ' . $idnum . ' ^3NO PERMISSIONS FOR THIS COMMAND, use ^7!register ^1!', '');
      }
    }
  }
  if (strpos($msgr, 'QUICKMESSAGE_') === false) {
    if (!empty($guidn)) {
      try {
        $dbc = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/chatdb.sqlite');
        if (!empty(SqlDataBase)) {
          $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
          if (empty($msqlcc)) $msqlcc = new PDO($dsn, db_user, db_pass);
          $dbx = $msqlcc;
        }
        $dhgsj = addslashes(clearSymbols($nickr));
        $dhgsj = preg_replace('/[^ a-zа-яё\d]/ui', '', $dhgsj);
        $dayzstamp = date('Y-m-d');
        if (!empty(SqlDataBase)) {
          $msgO1 = @iconv("windows-1251", "utf-8", $msgr);
          $msgr = $msgO1;
        }
        //$ipwadrr = 0;
        $ipq = 0;
        $x = '';
        $msgr = str_replace("`", "", $msgr);
        $msgr = str_replace("'", "", $msgr);
        $dhgsj = htmlentities($dhgsj);
        $xxccode = '0';
        if (empty($stats_array[$conisq]['ip_adress'])) {
          $t_ip = '';
          $stoparr = 0;
          foreach ($stats_array as $player_server_uid => $v) {
            $g = '';
            $o = '';
            $czr = count($v);
            $counter = 0;
            foreach ($v as $g => $o) {
              $guid = '';
              $nickname = '';
              $ip = '';
              if (strpos($g, 'guid') !== false) $guid = $o;
              else if (strpos($g, 'nickname') !== false) $nickname = $o;
              else if (strpos($g, 'ip_adress') !== false) $ip = $o;
              else if (strpos($g, 'city') !== false) $city = $o;
              ++$counter;
              if ($counter == $czr) {
                if ($stoparr == 0) {
                  if (trim($guidn) == trim($guid)) {
                    $stoparr = 1;
                    $ipwadrr = $ip;
                    $xxccode = $city;
                  }
                }
              }
            }
          }
        }
        if (empty(SqlDataBase)) {
          $sqll = "INSERT INTO chat (servername, s_port, guid, nickname, time, timeh, text, st1, st1days, st2, st2days, ip, geo, z, t, x, c) 
VALUES ('" . $servername . "', '" . $svipport . "', '" . $guidn . "', '" . $dhgsj . "', '" . $datetime . "', '" . $dayzstamp . "', '" . $msgr . "', '0', '0', '0', '0', '" . $stats_array[$conisq]['ip_adress'] . "', '" . $xxccode . "', '0', 'xl', '0', '0')";
          $dbc->query($sqll);
          $dbc = null;
        }
        if (!empty(SqlDataBase)) {
          /*
                    DROP TABLE IF EXISTS `chat_opt_new`;
                    CREATE TABLE `chat_opt_new` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `s_port` bigint(28) NOT NULL,
                    `guid` varchar(32) NOT NULL,
                    `nickname` varchar(100) NOT NULL,
                    `time` datetime NOT NULL,
                    `text` varchar(255) NOT NULL,
                    `ip` varchar(16) NOT NULL,
                    `var` smallint(2) NOT NULL,
                    `vartwo` smallint(2) NOT NULL,
                    PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
          */
          $msgOclear = $msgr;
          $msgOclear = str_replace("'", "", $msgOclear);
          $msgOclear = str_replace("`", "", $msgOclear);
          $msgOclear = str_replace('"', '', $msgOclear);
          $msgOclear = str_replace(';', '', $msgOclear);
          $msgOclear = str_replace('*', '', $msgOclear);
          $msgOclear = str_replace('$', '', $msgOclear);
          $msgOclear = str_replace('/', '', $msgOclear);
          $msgOclear = str_replace("\\", '', $msgOclear);
          $msgOclear = str_replace("\/", '', $msgOclear);
          //$msgOclear = htmlentities($msgOclear);
          /*
                    $sql = "INSERT INTO `chat_opt_new` (`s_port`, `guid`, `nickname`, `time`, `text`, `ip`, `var`, `vartwo`)
                    VALUES ('".$svipport."', '".$guidn."', '".$dhgsj."', '".$datetime."', '".$msgOclear."', '".$stats_array[$conisq]['ip_adress']."', '0', '0')";
          */
          $sql = "INSERT INTO `chat` (`servername`, `s_port`, `guid`, `nickname`, `time`, `timeh`, `text`, `st1`, `st1days`, `st2`, `st2days`, `ip`, `geo`, `z`, `t`, `x`, `c`) 
VALUES ('" . $servername . "', '" . $svipport . "', '" . $guidn . "', '" . $dhgsj . "', '" . $datetime . "', '" . $dayzstamp . "', '" . $msgOclear . "', '0', '0', '0', '0', '" . $stats_array[$conisq]['ip_adress'] . "', '" . $xxccode . "', '0', 'xl', '0', '0')";
          $dbx->query($sql);
          $dbx = null;
          $msqlcc = null;
        }
        require $cpath . 'ReCodMod/functions/null_db_connection.php';
        if (empty($msgOclear)) $msgOclear = '';
      }
      catch(PDOException $e) {
        errorspdo('[' . $datetime . '] 391  VALUES (' . $svipport . ', ' . $guidn . ', ' . $nickr . ', ' . $datetime . ', ' . $msgOclear . ', ' . $stats_array[$conisq]['ip_adress'] . ', 0, 0)	 ' . __FILE__ . '  Exception : ' . $e->getMessage());
      }
    }
  }
  /*
    $iiiii      = mb_strtolower($msgr, 'cp1251');
    
     if (preg_match('/[а-яёА-ЯЁ]+/', $iiiii))
     {
      if (preg_match("/(^!+([a-zA-Z]*))$/", $iiiii))
       $iiiii = rus2translit($iiiii);
    }
  */
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  //////////////////////                                        //////////////////////
  //////////////////////        CHAT SQLITE WALL ON SITE        //////////////////////
  //////////////////////                                        //////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////
  if (strpos($msgr, 'QUICKMESSAGE_') === false) {
    if (!empty($msgr)) {
      if (!empty(chatdb)) {
        if ((filesize(chatdb) > (chatdbsize * 1000000))) {
          //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> Chat database chatdbsize mb auto reset! </font> ");
          echo "OK ...";
          if (file_exists(chatdb)) {
            $file = chatdb;
            $newfile = $cpath . "ReCodMod/cache/x_logs/archive/chat/chat";
            $datetime = date('Y.m.d H:i:s');
            if (!copy($file, $newfile . "_" . $datetime . ".db")) {
              echo "Error copy $file...\n";
            }
            else {
              if (file_exists(chatdb)) {
                try {
                  $dbc = new PDO('sqlite:' . chatdb);
                  $sql = $dbc->prepare("DROP TABLE chat");
                  if ($sql->execute()) {
                    echo " Table deleted ";
                  }
                  else {
                    print_r($sql->errorInfo());
                  }
                  unlink(chatdb);
                  $dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(90)  NOT NULL,
			s_port int(6)  NOT NULL,
			guid varchar(40)  NOT NULL,
			nickname varchar(90)  NOT NULL,
			time datetime  NOT NULL,
			timeh datetime  NOT NULL,			
			text varchar(175)  NOT NULL,			
			st1 varchar(40)  NOT NULL,
			st1days varchar(40)  NOT NULL,			
			st2 varchar(40)  NOT NULL,
            st2days varchar(40)  NOT NULL,			
			ip varchar(16)  NOT NULL,
			geo varchar(40)  NOT NULL,
			z varchar(10)  NOT NULL,
			t varchar(10)  NOT NULL,
			x varchar(10)  NOT NULL,
			c varchar(10)  NOT NULL)');
                  $st = $dbc->query('SELECT image FROM chat');
                  $result = $st->fetch();
                  if (sizeof($result) == 0) {
                    echo 'Table created successfully' . "\n";
                  }
                  $dbc = null;
                  $st = null;
                  $result = null;
                  require $cpath . 'ReCodMod/functions/null_db_connection.php';
                }
                catch(PDOException $e) {
                  errorspdo('[' . $datetime . '] 1504  ' . __FILE__ . '  Exception : ' . $e->getMessage());
                }
              }
            }
          }
        }
      }
    }
  }
  echo '.' . $tfinishh = (microtime(true) - $start);
  ++$x_stop_lp;
}
?>