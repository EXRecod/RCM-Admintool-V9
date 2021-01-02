<?php
if ((strpos($parseline, "say;") !== false) 
 || (strpos($parseline, "sayteam;") !== false) 
 || (strpos($parseline, "tell;") !== false)) {
	  
 if (!empty($guidn)) {
  $guidn = trim($guidn);
  $steamerid = '';
  $x_mat_detected = true;
  $whilecounts = 0;
  $stolwlp = 0;
  $stopscp = 0;
  $sbbid_session = 0;
  $u = 0;
  $nickname = htmlentities($nickr);
  //.sourcebans_chat_ban.ini LOADER 
   $config_data = parse_ini_file($cpath . "cfg/sourcebans_chat_ban.ini", true);
   foreach ($config_data as $section => $r) {
    foreach ($r as $string => $value) {
     if (!defined($string)) define($string, $value);
    }
   }  
   if (!empty(sourcebans_cb__enable)) {
    if (empty($stopscp)) {
     //echo "\n[sourcebans_chat_ban]_".$construct;
     $stopscp = 1; 
     ////////////////////////////////////////////////////////////////////////////////////////////////////
     ////////////////////////////////////////////////////////////////////////////////////////////////////
     $pl_msg = '';
     $yesorno = '';
	 
	 $msgr = preg_replace('/\PL/u', '', $msgr);
	 
     $pl_msg = $msgr;	 
     $player_msg = mb_strtolower($pl_msg);
     $yesorno = antimat($player_msg);
     ///////////////////////////////////////////////////
     if (strpos($yesorno, '%CENSORED%') !== false) {
      if ($stolwlp == 0) {
       $stolwlp = 1;
       $x_mat_detected = false;
	   $badword = $player_msg; 
       echo "\n " . $pl_msg;
       echo " ALARM %CENSORED%";
      }
     }
     ///////////////////////////////////////////////////


if ($x_mat_detected) {	
     $pl_msg = @iconv("windows-1251", "utf-8", $msgr);	 
     $player_msg = mb_strtolower($pl_msg);
	   $yesorno = antimat($player_msg);
     ///////////////////////////////////////////////////
     if (strpos($yesorno, '%CENSORED%') !== false) {
      if ($stolwlp == 0) {
       $stolwlp = 1;
       $x_mat_detected = false;
	   $badword = $player_msg; 
       echo "\n " . $pl_msg;
       echo " ALARM %CENSORED%";
      }
     }
     ///////////////////////////////////////////////////
}

 
if ($x_mat_detected) {	
	$badword = badwordslisting($player_msg);
	echo "===".$badword;
 if(!empty($badword))
 {  
       echo ' DETECTED WORD!!! ';
       echo $player_msg . " == " . $badword;
       $x_mat_detected = false;
 }
}	 
	 
	 
if ($x_mat_detected) {	 
     $pl_msg = @iconv('utf-8//TRANSLIT', 'windows-1251', $msgr); 
     $player_msg = mb_strtolower($pl_msg);
     $yesorno = antimat($player_msg);
     ///////////////////////////////////////////////////
     if (strpos($yesorno, '%CENSORED%') !== false) {
      if ($stolwlp == 0) {
       $stolwlp = 1;
       $x_mat_detected = false;
	   $badword = $player_msg; 
       echo "\n " . $pl_msg;
       echo " ALARM %CENSORED%";
      }
    }
     ///////////////////////////////////////////////////	 
}	 
  
if ($x_mat_detected) {	
	$badword = badwordslisting($pl_msg);
 if(!empty($badword))
 {  
       echo ' DETECTED WORD!!! ';
       echo $msgr . " == " . $badword;
       $x_mat_detected = false;
 }
}
     ////////////////////////////////////////////////////////////////////////////////////////////////////
     ////////////////////////////////////////////////////////////////////////////////////////////////////
 

// TRANSLIT
if ($x_mat_detected) {
    $pl_msg = @iconv("windows-1251", "utf-8", $msgr);
    $pl_msg = rus2translit($pl_msg);
     $player_msg = mb_strtolower($pl_msg);
	   $yesorno = antimat($player_msg);
     ///////////////////////////////////////////////////
     if (strpos($yesorno, '%CENSORED%') !== false) {
      if ($stolwlp == 0) {
       $stolwlp = 1;
       $x_mat_detected = false;
	   $badword = $player_msg; 
       echo "\n " . $pl_msg;
       echo " ALARM %CENSORED%";
      }
     }
     ///////////////////////////////////////////////////
} 
    }
    if (!$x_mat_detected) {
     if (!empty($badword)) //$pl_msg
     {
      $sourcebans_cb__warn_message = str_replace("{WORD}", htmlentities($badword) , sourcebans_cb__warn_message);
      $sourcebans_cb__kickreason = str_replace("{WORD}", htmlentities($badword) , sourcebans_cb__kickreason);
      $sourcebans_cb__banreason = str_replace("{WORD}", htmlentities($badword) , sourcebans_cb__banreason);
     }
     else {
      $sourcebans_cb__warn_message = str_replace("{WORD}", htmlentities($pl_msg) , sourcebans_cb__warn_message);
      $sourcebans_cb__kickreason = str_replace("{WORD}", htmlentities($pl_msg) , sourcebans_cb__kickreason);
      $sourcebans_cb__banreason = str_replace("{WORD}", htmlentities($pl_msg) , sourcebans_cb__banreason);
     }
     ///////////////////////////////////////////////////////////////
     if ($whilecounts == 0) {
      $whilecounts = 1;
      $htmlnickname = html_entity_decode($nickr);
      $sbdatetime = date('Y-m-d H:i:s');
      $sbcreated = strtotime($sbdatetime);
      //$sbantimestrtime = strtotime("+".sourcebans_cb__bantime." day");
      $sbantimestrtime = strtotime(date('Y-m-d H:i:s', strtotime('' . sourcebans_cb__bantime . ' hour')));
      $stringip = str_replace(".", "_", $server_ip);
      $sourcebans_chat_b_guid = $cpath . 'ReCodMod/cache/sourcebans_chat_ban/' . $stringip . '_' . $server_port . '_' . $guidn . '.log';
      if (!file_exists($cpath . 'ReCodMod/cache/sourcebans_chat_ban/')) mkdir($cpath . 'ReCodMod/cache/sourcebans_chat_ban/', 0777, true);
      $stringip = str_replace(".", "_", $server_ip);
      try {
       if (empty(SqlDataBase)) {
        $sb = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
       }
       else {
        $dsnx = "mysql:host=" . sourcebans_cb__host . ";dbname=" . sourcebans_cb__name . ";charset=" . sourcebans_cb__charset . "";
        if (empty($msqlconnectx)) $msqlconnectx = new PDO($dsnx, sourcebans_cb__user, sourcebans_cb__pass);
        $sb = $msqlconnectx;
       }
       $steamid = $sb->query("SELECT CONCAT(\"STEAM_\", ((CAST('" . $guidn . "' AS UNSIGNED) >> CAST('56' AS UNSIGNED)) - CAST('1' AS UNSIGNED)),    \":\", (CAST('" . $guidn . "' AS UNSIGNED) &    CAST('1' AS UNSIGNED)), \":\", (CAST('" . $guidn . "' AS UNSIGNED) &    CAST('4294967295' AS UNSIGNED)) >> CAST('1' AS UNSIGNED)) AS steam_id;");
       $dvz = $steamid->fetch(PDO::FETCH_LAZY);
       if (!empty($dvz)) {
        foreach ($dvz as $key => $value) {
         if ($key == 'steam_id') $steamerid = $value;
        }
       }
       $dvz = null;
       $steamid = null;
       $steaf = $sb->query("SELECT bid from sb_comms ORDER BY `bid` DESC limit 1");
       $dr = $steaf->fetch(PDO::FETCH_LAZY);
       if (!empty($dr)) {
        foreach ($dr as $key => $value) {
         if ($key == 'bid') $sbbid = $value;
        }
        $dr = null;
        $steaf = null;
        $sbbid = $sbbid + 1;
        //$steamid = $sb->query("SELECT bid,authid,ends,length,name from sb_comms where now() <= from_unixtime(`ends`) and authid = '" . $steamerid . "' or `length` = '0' and authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
        $steamid = $sb->query("SELECT authid,bid from sb_comms where authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
        $dv = $steamid->fetch(PDO::FETCH_LAZY);
       }
	   else
	   {
		$sbbid = 0;   
	   }
       if (empty($dv)) {
        if (!file_exists($sourcebans_chat_b_guid)) touch($sourcebans_chat_b_guid);
        if (file_exists($sourcebans_chat_b_guid)) {
         $fplineq = fopen($sourcebans_chat_b_guid, 'r');
         $fpline = fgets($fplineq);
         fclose($fplineq);
        }
        if (!file_exists($sourcebans_chat_b_guid)) {
         touch($sourcebans_chat_b_guid);
         if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: 1/' . sourcebans_cb__warns . '', '');
         else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: 1/' . sourcebans_cb__warns . '', '');
         if (sourcebans_cb__warns == 0) {
          if ($sbbid_session == 0) {
           $sbbid_session = 1;
           $stmt = $sb->query("INSERT INTO `sb_comms` (`bid`,`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $sbbid . "','" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtime, '" . ($sbantimestrtime - $sbcreated) . "', '" . $sourcebans_cb__banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
           $stmt = null;
          }
          if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__banreason . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
          else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__banreason . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
         }
         if (sourcebans_cb__kick != 'x') xcon('clientkick ' . $idnum . ' ' . $sourcebans_cb__kickreason, '');
        }
        else if ((file_exists($sourcebans_chat_b_guid)) and (empty($fpline))) {
         file_put_contents($sourcebans_chat_b_guid, '1');
         if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
         else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
        }
        else if ((file_exists($sourcebans_chat_b_guid)) and (!empty($fpline))) {
         if (($fpline + 1) > sourcebans_cb__warns) {
          $fp = fopen($sourcebans_chat_b_guid, 'w');
          fputs($fp, "0");
          fclose($fp);
          if ($sbbid_session == 0) {
           $sbbid_session = 1;
           $stmt = $sb->query("INSERT INTO `sb_comms` (`bid`,`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $sbbid . "','" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtime, '" . ($sbantimestrtime - $sbcreated) . "', '" . $sourcebans_cb__banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
           $stmt = null;
          }
          if (sourcebans_cb__kick != 'x') xcon('clientkick ' . $idnum . ' ' . $sourcebans_cb__kickreason, '');
          if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__banreason . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
          else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__banreason . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
         }
         else {
          if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
          else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
          $fp = fopen($sourcebans_chat_b_guid, 'w');
          fputs($fp, ((int)$fpline + 1));
          fclose($fp);
         }
        }
       }
       else {
        $steamid = $sb->query("SELECT bid,authid,ends,length,name from sb_comms where authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
        $dvt = $steamid->fetch(PDO::FETCH_LAZY);
        if (!empty($dvt)) {
         if (!file_exists($sourcebans_chat_b_guid)) touch($sourcebans_chat_b_guid);
         if (file_exists($sourcebans_chat_b_guid)) {
          $fplineq = fopen($sourcebans_chat_b_guid, 'r');
          $fpline = fgets($fplineq);
          fclose($fplineq);
         }
         foreach ($dvt as $key => $value) {
          if ($key == 'ends') $sb_ends = $value;
          if ($key == 'length') $sb_length = $value;
          if (!empty($sb_ends)) {
           ////////////////////////////  ПРОВЕРКА СРОКА 21>12>2019
           if (((int)$sb_ends - ((int)(strtotime('now'))) < 0)) {
            if (!empty($sb_length)) {
             if (empty($u)) {
              $u = 1;
              if (empty($sb_length)) $sb_length = 5000;
              $sbantimestrtime = $sb_length * 2;
              $sbantimestrtimex = $sbcreated + $sbantimestrtime;
              /////ВАЖНО    ЗАКОНЧИТСЬЯ < СОЗДАН БАН
              if ($sb_ends < $sbcreated) {
               if ($sbbid_session == 0) {
                $sbbid_session = 1;
                $stmt = $sb->query("INSERT INTO `sb_comms` (`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtimex, '" . ($sbantimestrtimex - $sbcreated) . "', '" . $sourcebans_cb__banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
                $stmt = null;
               }
               if (($fpline + 1) > sourcebans_cb__warns) {
                $fp = fopen($sourcebans_chat_b_guid, 'w');
                fputs($fp, "0");
                fclose($fp);
                if ($sbbid_session == 0) {
                 $sbbid_session = 1;
                 $stmt = $sb->query("INSERT INTO `sb_comms` (`bid`,`authid`, `name`, `created`, `ends`, `length`, `reason`, `aid`, `adminIp`, `sid`, `RemovedBy`, `RemoveType`, `RemovedOn`, `type`, `ureason`) VALUES
('" . $sbbid . "','" . $steamerid . "', '" . $htmlnickname . "', '" . $sbcreated . "', $sbantimestrtime, '" . ($sbantimestrtime - $sbcreated) . "', '" . $sourcebans_cb__banreason . "', 0, '" . $server_ip . "', 0, NULL, NULL, NULL, 2, NULL)");
                 $stmt = null;
                }
                if (sourcebans_cb__kick != 'x') xcon('clientkick ' . $idnum . ' ' . $sourcebans_cb__kickreason, '');
                if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__banreason . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
                else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__banreason . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
               }
               else {
                if (sourcebans_cb__rcon != "say") xcon(sourcebans_cb__rcon . ' ' . $idnum . ' ^7' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
                else xcon('say ' . $htmlnickname . ' ' . $sourcebans_cb__warn_message . '  warn: ' . ($fpline + 1) . '/' . sourcebans_cb__warns . '', '');
                $fp = fopen($sourcebans_chat_b_guid, 'w');
                fputs($fp, ((int)$fpline + 1));
                fclose($fp);
               }
              }
             }
            }
           }
          }
         }
        }
       }
       $sb = null;
       $dv = null;
       $dvt = null;
       $stmt = null;
       $steamid = null;
       require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
      }
      catch(PDOException $e) {
       echo "\n\n\n ERROR: ", $e->getMessage();
       echo "\n\n\n";
       errorspdo('[' . $date . '] FILE:  ' . __FILE__ . ' LOADER  Exception : ' . $e->getMessage());
      }
      touch($sourcebans_chat_b_guid);
     }
    }
   } 
 }
}
/*  """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""   */
if (strpos($parseline, " J;") !== false) {
 $nickname = '';
 $idk = '';
 $guid = '';
 $steamerid = '';
 $limitj = substr_count($parseline, ';'); // 3
 if ($limitj == 2) list($noon, $idk, $nickname) = explode(';', $parseline);
 else list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
 if (!empty($guid)) {
  $whilecounts = 0;
  $pl_msg = '';
  $yesorno = '';
  $sb_ends = '';
  $nickname = htmlentities($nickname);
  //.sourcebans_chat_ban.ini LOADER
   $config_data = parse_ini_file($cpath . "cfg/sourcebans_chat_ban.ini", true);
   foreach ($config_data as $section => $r) {
    foreach ($r as $string => $value) {
     if (!defined($string)) define($string, $value);
    }
   }
  if (defined(sourcebans_cb__enable)) {
   if (!empty(sourcebans_cb__enable)) {
    if (empty($whilecounts)) {
     $whilecounts = 1;
     try {
      if (empty(SqlDataBase)) {
       $sb = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db3.sqlite');
      }
      else {
       $dsn = "mysql:host=" . sourcebans_cb__host . ";dbname=" . sourcebans_cb__name . ";charset=" . sourcebans_cb__charset . "";
       $msqlconnectx = new PDO($dsn, sourcebans_cb__user, sourcebans_cb__pass);
       $sb = $msqlconnectx;
      }
      $steamid = $sb->query("SELECT CONCAT(\"STEAM_\", ((CAST('" . $guid . "' AS UNSIGNED) >> CAST('56' AS UNSIGNED)) - CAST('1' AS UNSIGNED)),    \":\", (CAST('" . $guid . "' AS UNSIGNED) &    CAST('1' AS UNSIGNED)), \":\", (CAST('" . $guid . "' AS UNSIGNED) &    CAST('4294967295' AS UNSIGNED)) >> CAST('1' AS UNSIGNED)) AS steam_id;");
      $dvz = $steamid->fetch(PDO::FETCH_LAZY);
      if (!empty($dvz)) {
       $xry = 0;
       foreach ($dvz as $key => $value) {
        if ($key == 'steam_id') $steamerid = $value;
        if (!empty($steamerid)) {
         if (empty($xry)) {
          $xry = 1;
          $steamid = $sb->query("SELECT bid,authid,ends,length,name from sb_comms where now() <= from_unixtime(`ends`) and authid = '" . $steamerid . "' or `length` = '0' and authid = '" . $steamerid . "' ORDER BY `bid` DESC limit 1");
          $dv = $steamid->fetch(PDO::FETCH_LAZY);
          if (!empty($dv)) {
           $cikl = 0;
           foreach ($dv as $key => $value) {
            echo "\n" . $key . "_" . $value;
            if ($key == "ends") {
             $sb_ends = $value;
            }
            if ($cikl == 0) {
             if (!empty($sb_ends)) {
              $cikl = 1;
              //$str = "Jul 02 2013";
              //$str = strtotime(date("M d Y ")) - (strtotime($str));
              //echo floor($str/3600/24);
              $sb_ends_date = $sb_ends;
              $sb_ends = gmdate("Y-m-d H:i:s", $sb_ends);
              $nnowstr = strtotime("now");
              if (($sb_ends_date - $nnowstr) > 0) $dataendifdno = time_elapsed_B($sb_ends_date - $nnowstr);
              else $dataendifdno = 'Forever';
              $cb_info = str_replace("{NICKNAME}", $nickname, sourcebans_cb__cb_info);
              $cb_info = str_replace("{DATE}", $sb_ends, $cb_info);
              $cb_info = str_replace("{DAYS}", $dataendifdno, $cb_info);
              if (sourcebans_cb__cb_rcon == "say") xcon('say ' . $cb_info . '', '');
              else xcon(sourcebans_cb__cb_rcon . ' ' . $idk . ' ' . $cb_info . '', '');
             }
            }
           }
          }
          $dv = null;
          $steamid = null;
         }
        }
       }
      }
      $sb = null;
      $dvz = null;
      $steamid = null;
      $msqlconnectx = null;
      require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
     }
     catch(PDOException $e) {
      echo "\n\n\n ERROR: ", $e->getMessage();
      echo "\n\n\n";
      errorspdo('[' . $date . '] FILE:  ' . __FILE__ . ' LOADER  Exception : ' . $e->getMessage());
     }
    }
   }
  }
 }
}
?>