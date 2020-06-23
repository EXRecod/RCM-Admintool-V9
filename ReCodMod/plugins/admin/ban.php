<?php
if (preg_match("/^" . ixz . "ban /i", $msgr)) {
  list($x_cmd, $x_idn, $x_reason) = explode(' ', $msgr); // !ban 5 Wh ( 5 = id  wh = reason)
  if (empty($x_reason)) {
    xcon('tell ' . $idnum . ' ^1ENTER REASON PLEASE!  [!ban 5 Wallhack]', '');
  }
  else {
    list($num, $i_ping, $i_ip, $i_name, $i_guid, $xxccode) = explode(';', (rconExplodeIdnum($x_idn)));
    $a_guidcx = $nickr . ' - ' . $guidn;
    if (!empty(bans_system)) dbInsert('db2', "INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$i_name','$i_ip','$i_guid','$x_reason','$datetime','$a_guidcx','0')");
    xcon('say  ' . $chistx . ' ' . $ban_ip_all . ' ^7' . $infooreas . ': ^1' . $x_reason . '', '');
    if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5')) {
      xcon('getss ' . $x_idn, '');
      if (preg_match("/[\d]+[\d]{14,22}/", $guidn)) xcon('banUser ' . $x_idn . ' ^1' . $x_reason, '');
      else xcon('banUser ' . $x_idn . ' ^1' . $x_reason, '');
      //
      // xcon('permban ' . $i_id . ' Reason: [' . $x_reason . ']!', '');
      xcon('clientkick ' . $x_idn, '');
    }
    else {
      usleep($sleep_rcon * 2);
      xcon('clientkick ' . $x_idn, '');
    }
    AddToLog("[" . $datetime . "] BANNED: " . $i_ip . " (" . $i_name . ") (" . $i_guid . ") BY: (" . $a_guidcc . ")  R ");
    echo '  ban  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'dumpbanlist') !== false) {
  usleep($sleep_rcon * 2);
  $getinf = 'dumpbanlist';
  require $cpath . 'ReCodMod/functions/getinfo/_main_getinfo.php';
  fclose($connx);
  xcon('tell ' . $idnum . ' ' . $dumpbanlist . '', '');
  AddToLog("[" . $datetime . "] dumpbanlist: " . $i_ip . " (" . $i_namex . ") (" . $i_id . ")");
  echo '  ban  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
///ban ip range naprimer 111.222    iz    111.222.333.444   +++++  !range 111.222 WH
else if (strpos($msgr, ixz . 'range ') !== false) {
  list($x_cmd, $x_idn, $x_reason) = explode(' ', $msgr); // !ban 5 Wh ( 5 = id  wh = reason)
  if (empty($x_reason)) {
    if (($game_patch != 'cod1_1.1') || ($game_mod != 'codam')) xcon('tell  ' . $idnum . '  ^1ENTER REASON PLEASE! [!range 111.222 Wallhach]', '');
    else xcon('say  ^1ENTER REASON PLEASE! [!range 111.222 Wallhach]', '');
  }
  $ldotss = substr_count($x_idn, '.'); // 3 //6
  $ldotssx = substr_count($x_idn, '*'); // 2
  $ldotssxl = substr_count($x_idn, '/'); // 1
  if (($ldotss == 6) || ($ldotss == 3) && ($ldotssx == 2) || ($ldotss == 3) && ($ldotssxl == 1)) {
    if (empty($a_guidcc)) $a_guidcc = $x_nickx;
    if (!empty(bans_system)) dbInsert('db2', "INSERT INTO x_ranges (ip_ranges,ip_info) VALUES ('$x_idn','$x_reason')");
    xcon('say  ^1IP Range ' . $ban_ip_all . ' ^7' . $infooreas . ':^1 ' . $x_reason . '', '');
    //xcon('clientkick ' . $i_id, '');
    AddToLog("[" . $datetime . "] BANNED: " . $i_ip . " (" . $x_reason . ") (" . $i_id . ") BY: (" . $x_nickx . ")  R ");
    echo '  ban  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
  }
  else {
    xcon('say ^1' . $infoorngg . '', '');
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (trim($msgr) == ixz . 'banlist') {
  try {
    if (empty(SqlDataBase)) {
      $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
    }
    else {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
      $db = $msqlconnect;
      $db2 = $db;
    }
    if (empty(SqlDataBase)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
    $gi = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
    $result = $db2->query("SELECT * FROM bans WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
    $i = 0;
    foreach ($result as $row) {
      $playername = $row['playername'];
      $ipm = $row['id'];
      $ipadrr = $row['ip'];
      $rshs = $row['reason'];
      $timfk = $row['time'];
      $ywhoo = $row['whooo'];
      ++$i;
      $colorb = $i % 2 > 0 ? '^6' : '^3';
      $colora = $i % 2 > 0 ? '^7' : '^7';
      $record = geoip_record_by_addr($gi, $ipadrr);
      if (geox == 1) $xxcity = ($record->country_name . ", " . $record->city . "");
      else $xxcity = ($record->country_name);
      if (strpos($game_patch, 'cod1_1.1') !== false) xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3' . $infooby . ': ' . $colorb . $colora . $ywhoo . '"', '');
      else xcon('tell ' . $idnum . ' ' . $colorb . '#' . $colorb . '' . $colora . $ipm . ' ' . $colorb . ' ' . $colorb . $colora . substr($playername, 0, 12) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooby . ': ' . $colorb . $colora . $rshs . ' ^3' . $infoodate . ': ' . $colorb . $colora . substr($timfk, 0, 10) . '', '');
      //xcon('tell ' . $idnum . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3' . $infooby . ': ' . $colorb . $colora . $ywhoo . '"', '');
      
    }
    $result = null;
    $db = NULL;
    ++$x_number;
    AddToLogInfo("[" . $datetime . "] BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
    ++$x_stop_lp;
    echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    echo "\n\n\n ERROR --------------" . $e->getMessage();
    errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'rlist ') !== false) {
  list($x_cmd, $x_nickid) = explode(' ', $msgr); // !ban 5 Wh ( 5 = id  wh = reason)
  try {
    if (empty(SqlDataBase)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
    else {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
      $db2 = $msqlconnect;
    }
    if (is_numeric($x_nickid)) $result = $db2->query("SELECT * FROM x_ranges WHERE id = '$x_nickid' limit 1");
    else $result = $db2->query("SELECT * FROM x_ranges WHERE ip_info='$x_nickid'  limit 1");
    $stat = $result->fetchColumn();
    if ($stat > 0) {
      $result = $db2->query("SELECT * FROM x_ranges WHERE id = '$x_nickid'  limit 1");
      foreach ($result as $row) {
        $id = $row['id'];
        $playername = $row['playername'];
        $ip = $row['ip'];
        $reason = $row['reason'];
        $time = $row['time'];
        if ($guidn != '0') $tguidd = $row['guid'];
        $whooo = $row['whooo'];
        if (is_numeric($x_nickid)) $db2->query("DELETE FROM x_ranges WHERE id='$x_nickid'");
        else $db2->query("DELETE FROM x_ranges WHERE ip_info='$x_nickid'");
        $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('','$ip','','$reason','','','$game_patch','$nickr')");
        if ($guidn != '0') {
          xcon('unban ' . $tguidd . '', '');
        }
        xcon('say  ^7' . $playername . ' ' . $c_unban . ' ^7' . $infooreas . ': ^1' . $reason . '', '');
        AddToLog("[" . $datetime . "] UNBAN: " . $i_ip . " (" . $i_name . ")  reason: UnBan");
        //AddToLog1("[" . $datetime . "]<font color='green'> Server :</font> " . $playername . "  " . $c_unban . "  Reason: " . $reason . " ");
        echo ' unban   ' . $tfinishh = (microtime(true) - $start);
      }
    }
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    echo "\n\n\n ERROR --------------" . $e->getMessage();
    errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'rlist') !== false) {
  try {
    if (empty(SqlDataBase)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
    else {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
      $db2 = $msqlconnect;
    }
    $result = $db2->query("SELECT * FROM x_ranges WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
    $i = 0;
    foreach ($result as $row) {
      ++$i;
      $colorb = $i % 2 > 0 ? '^6' : '^3';
      $colora = $i % 2 > 0 ? '^7' : '^7';
      $ipm = $row['id'];
      $ipadrr = $row['ip_ranges'];
      $rshs = $row['ip_info'];
      if (strpos($game_patch, 'cod1_1.1') !== false) xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
      else if (($game_patch == 'cod2') || (strpos($game_patch, 'cod1') !== false) || ($game_patch == 'cod4') || ($game_patch == 'cod5')) xcon('tell ' . $idnum . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
      else if ($game_patch == 'cod5') xcon('tell ' . $idnum . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
      else xcon('tell ' . $idnum . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
    }
    ++$x_number;
    AddToLogInfo("[" . $datetime . "] RANGE IP-10: (" . $x_nickx . ") (" . $msgr . ")");
    ++$x_stop_lp;
    echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    echo "\n\n\n ERROR --------------" . $e->getMessage();
    errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'find ') !== false) {
  $nickr = clearnamex($i_name);
  $x_nickx = clearnamex($nickr);
  list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
  try {
    if (empty(SqlDataBase)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
    else {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
      $db2 = $msqlconnect;
    }
    $sql = 'SELECT * FROM bans WHERE playername LIKE :keyword ORDER BY (id+0) DESC LIMIT 10';
    $reponse = $db2->prepare($sql);
    $reponse->bindValue(':keyword', '%' . $x_idn . '%');
    $reponse->queryute();
    $newid = $idnum;
    $i = 0;
    while ($row = $reponse->fetch()) {
      ++$i;
      $colorb = $i % 2 > 0 ? '^6' : '^2';
      $colora = $i % 2 > 0 ? '^7' : '^7';
      $playername = $row['playername'];
      $ipm = $row['id'];
      $rshs = $row['reason'];
      $rguid = $row['guid'];
      if ($game_patch == 'cod1_1.1xxx') xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
      else xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . '#Guid:' . $colorb . ' ' . $colora . $rguid . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
    }
    ++$x_number;
    AddToLogInfo("[" . $datetime . "] SEARCH BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
    ++$x_stop_lp;
    echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    echo "\n\n\n ERROR --------------" . $e->getMessage();
    errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
  //require $cpath . 'ReCodMod/functions/null.php'; return;
  
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'ulist') !== false) {
   
    try {
      if (empty(SqlDataBase)) {
        if (empty($bannlist)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
        else $db2 = new PDO('sqlite:' . $bannlist);
        ////////////////////////////
        
      }
      else {
        $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
        $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
        if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
        $db2 = $msqlconnect;
      }
      $newid = $idnum;
      $result = $db2->query("SELECT * FROM amnistia WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
      $i = 0;
      foreach ($result as $row) {
        ++$i;
        $colorb = $i % 2 > 0 ? '^6' : '^2';
        $colora = $i % 2 > 0 ? '^7' : '^7';
        $playername = $row['playername1'];
        $ipm = $row['id'];
        $rshs = $row['reason1'];
        $guidn1 = $row['guid1'];
        if ($game_patch == 'cod1_1.1xxx') xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
        else xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . '#Guid:' . $colorb . ' ' . $colora . $guidn1 . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
      }
      AddToLogInfo("[" . $datetime . "] UN-BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
      echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
      require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
    }
    catch(PDOException $e) {
      echo "\n\n\n ERROR --------------" . $e->getMessage();
      errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
    }
    require $cpath . 'ReCodMod/functions/null.php';
    return;
  }

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'tban ') !== false) {
  try {
    if (empty(SqlDataBase)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
    else {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
      $db = $msqlconnect;
    }
    list($x_cmd, $x_idn, $x_r_minutes) = explode(' ', $msgr); // !tban 5 30  ( 5 = id  30 = times in minutes)
    if ($x_r_minutes == '') $x_r_minutes = '5';
    //$x_x_minutes = ''.$x_r_minutes.'.minute(-s)';
    $datetimex = date('YmdHis');
    $x_n_minutes = $x_r_minutes * 60;
    $x_x_m = $datetimex + $x_n_minutes;
    foreach ($rconarray as $j => $e) {
      $i_id = $e["num"];
      $i_ping = $e["ping"];
      $i_ip = $e["ip"];
      $i_name = $e["name"];
      $i_guid = $e["guid"];
      $chistx = $i_name;
      if ($i_id == $x_idn) {
        $db2->query("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$i_name','$i_ip','','$x_x_m','$datetime','$x_nickx','$game_patch')");
        if (strpos($game_patch, 'cod1_1') !== false) {
          xcon('clientkick ' . $i_id, '');
        }
        else {
          xcon('say  ' . $i_name . ' ' . $ban_ip_all . ' "^7Reason: ^1tempban" "' . $x_r_minutes . '" minute(-s)', '');
          xcon('banUser ' . $guid . ' ^1BAN', '');
          xcon('akick ' . $i_id . ' " ^6[^7TempBan^6]"', '');
          ++$x_stop_lp;
        }
        AddToLog("[" . $datetime . "] Tempban: " . $i_ip . " (" . $i_name . ") (" . $i_id . ") BY: (" . $nickr . ")  R ");
        ////AddToLog1("<br/>[" . $datetime . "]<font color='green'> Server :</font> " . $i_namex . " " . $infooreas . ":^1 Tempban " . $x_r_minutes . " ");
        AddToLog1clear("[" . $datetime . "] Server : " . $i_name . "  " . $infooreas . ":^1 Tempban " . $x_r_minutes . " ");
        ++$x_number;
        echo '  tempban  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
        //return;
        
      }
    }
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    echo "\n\n\n ERROR --------------" . $e->getMessage();
    errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
else if (strpos($msgr, ixz . 'lastban') !== false) {
  $gi = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
  try {
    if (empty(SqlDataBase)) $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
    else {
      $dsn = "mysql:host=" . host_adress . ";dbname=" . db_name . ";charset=$charset_db";
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
      if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
      $db2 = $msqlconnect;
    }
    $result = $db2->query("SELECT * FROM bans WHERE id>=1 and patch = '$game_patch' ORDER BY (id+0) DESC LIMIT 1");
    $i = 0;
    foreach ($result as $row) {
      ++$i;
      $colorb = $i % 2 > 0 ? '^6' : '^3';
      $colora = $i % 2 > 0 ? '^7' : '^7';
      $playername = $row['playername'];
      $ipm = $row['id'];
      $ipadrr = $row['ip'];
      $rshs = $row['reason'];
      $timfk = $row['time'];
      $ywhoo = $row['whooo'];
      $record = geoip_record_by_addr($gi, $ipadrr);
      if (geox == 1) $xxcity = ($record->country_name . ", " . $record->city . "");
      else $xxcity = ($record->country_name);
      rcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' Nick: ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . 'City: ' . $colorb . $colora . $xxcity . ' ^3Reason: ' . $colorb . $colora . $rshs . ' ^3Time: ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3By: ' . $colorb . $colora . $ywhoo . '"', '');
    }
    AddToLogInfo("[" . $datetime . "] BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
    echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
  }
  catch(PDOException $e) {
    errorspdo('[' . $datetime . ']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }
}
?>