<?php
 
 
if (strpos($parseline, " J;") !== false) { 
list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
  
 
      if (!empty($guids)) {
       ++$x_numb1;
       if ($x_numb1 == 1) {
        try {
         if (empty(SqlDataBase)) {
          $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
          $db4 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
          }
         else {
          $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
          $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
          if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
          $db = $msqlconnect;
          $db2 = $db;
          $db4 = $db; 
         }
         $datetime = date('Y.m.d H:i:s');
         if ($guids == 0) {
          $result = $db2->query("SELECT * FROM bans WHERE reason like 'Flood'  LIMIT 1");
          foreach ($result as $row) {
           $id = $row['id'];
           $playername = $row['playername'];
           $ip = $row['ip'];
           $reason = $row['reason'];
           $time = $row['time'];
           $whooo = $row['whooo'];
           $ppatch = $row['patch'];
           $minuteo = (deltimedot($datetime) - deltimedot($time));
           echo ' ooo ' . $minuteo;
           if ($minuteo > $timewflood) {
            $db2->query("DELETE FROM bans WHERE reason like 'Flood'");
            $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','RCM 2 Hours')");
            $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
            if ($x_number != 1) {
             
             rcon('say   ^7' . $playername . ' ^5' . $tmpbnd . ' 2 Hours^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
             AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
             //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN 2 Hours</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
             ++$x_number;
             echo ' bans   ' . $tfinishh = (microtime(true) - $start);
            }
           }
          }
          $result = $db2->query("SELECT * FROM bans WHERE reason like 'Swearing'  LIMIT 1");
          foreach ($result as $row) {
           $id = $row['id'];
           $playername = $row['playername'];
           $ip = $row['ip'];
           $reason = $row['reason'];
           $time = $row['time'];
           $whooo = $row['whooo'];
           $ppatch = $row['patch'];
           $minutez = (deltimedot($datetime) - deltimedot($time));
           if ($minutez > $timewswear) {
            echo '============================' . $minutez;
            $db2->query("DELETE FROM bans WHERE reason like 'Swearing'");
            $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','RCM 3 Hours')");
            $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
            if ($x_number != 1) {
             
             rcon('say  ^7' . $playername . ' ^5' . $tmpbnd . ' 3 Hours^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
             AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
             //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN 3 Hours</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
             ++$x_number;
             echo ' bans   ' . $tfinishh = (microtime(true) - $start);
            }
           }
          }
          $result = $db2->query("SELECT * FROM bans WHERE reason like 'Disliker'  LIMIT 1");
          foreach ($result as $row) {
           $id = $row['id'];
           $playername = $row['playername'];
           $ip = $row['ip'];
           $reason = $row['reason'];
           $time = $row['time'];
           $whooo = $row['whooo'];
           $ppatch = $row['patch'];
           $minutez = (deltimedot($datetime) - deltimedot($time));
           if ($minutez > $timewdisliker) {
            echo '============================' . $minutez;
            $db2->query("DELETE FROM bans WHERE reason like 'Disliker'");
            $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','RCM 5 Hours')");
            $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
            if ($x_number != 1) {
             
             rcon('say  ^7' . $playername . ' ^5' . $tmpbnd . ' 5 Hours^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
             AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
             //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN 5 Hours</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
             ++$x_number;
             echo ' bans   ' . $tfinishh = (microtime(true) - $start);
            }
           }
          }
          $result = $db2->query("SELECT * FROM bans WHERE reason like '%" . $yedate . "%'  LIMIT 1");
          foreach ($result as $row) {
           $id = $row['id'];
           $playername = $row['playername'];
           $ip = $row['ip'];
           $reason = $row['reason'];
           $time = $row['time'];
           $whooo = $row['whooo'];
           $ppatch = $row['patch'];
           $datetimex = date('YmdHis');
           $minutez = deltimedot($reason) - $datetimex;
           ///echo '=========TEMPBAN IS OVER========'.$minutez;
           if ($minutez < '0') {
            echo '========= TEMPBAN IS OVER ========' . $minutez;
            $db2->query("DELETE FROM bans WHERE reason like '%" . $yedate . "%'");
            $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','$whooo')");
            $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
            if ($x_number != 1) {
             
             rcon('say  ^7' . $playername . ' ^5' . $tmpbnd . '^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
             AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
             //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
             ++$x_number;
             echo ' bans   ' . $tfinishh = (microtime(true) - $start);
            }
           }
          }
         }
         else {
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          ///////////////////////////////////////////////////////////////////////////////////////
          $result = $db4->query("SELECT * FROM x_db_players WHERE x_db_guid='" . $guid . "' LIMIT 1");
          foreach ($result as $row) {
           $wrnx = $row['x_db_warn'];
           $result = $db2->query("SELECT * FROM bans WHERE reason like 'Flood' limit 1");
           foreach ($result as $row) {
            $id = $row['id'];
            $playername = $row['playername'];
            $ip = $row['ip'];
            $reason = $row['reason'];
            $time = $row['time'];
            $whooo = $row['whooo'];
            $ppatch = $row['patch'];
            $minuteo = (deltimedot($datetime) - deltimedot($time));
            echo ' ooo ' . $minuteo;
            if ($minuteo * $wrnx > $timewflood) {
             $db2->query("DELETE FROM bans WHERE reason like 'Flood'");
             $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','RCM 2 Hours')");
             //$db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
             if ($x_number != 1) {
              
              rcon('say   ^7' . $playername . ' ^5' . $tmpbnd . ' 2 Hours^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
              AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
              //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN 2 Hours</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
              ++$x_number;
              echo ' bans   ' . $tfinishh = (microtime(true) - $start);
             }
            }
           }
           $result = $db2->query("SELECT * FROM bans WHERE reason like 'Swearing' limit 1");
           foreach ($result as $row) {
            $id = $row['id'];
            $playername = $row['playername'];
            $ip = $row['ip'];
            $reason = $row['reason'];
            $time = $row['time'];
            $whooo = $row['whooo'];
            $ppatch = $row['patch'];
            $minutez = (deltimedot($datetime) - deltimedot($time));
            if ($minutez * $wrnx > $timewswear) {
             echo '============================' . $minutez;
             $db2->query("DELETE FROM bans WHERE reason like 'Swearing'");
             $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','RCM 3 Hours')");
             $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
             if ($x_number != 1) {
              
              rcon('say  ^7' . $playername . ' ^5' . $tmpbnd . ' 3 Hours^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
              AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
              //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN 3 Hours</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
              ++$x_number;
              echo ' bans   ' . $tfinishh = (microtime(true) - $start);
             }
            }
           }
           $result = $db2->query("SELECT * FROM bans WHERE reason like 'Disliker'  LIMIT 1");
           foreach ($result as $row) {
            $id = $row['id'];
            $playername = $row['playername'];
            $ip = $row['ip'];
            $reason = $row['reason'];
            $time = $row['time'];
            $whooo = $row['whooo'];
            $ppatch = $row['patch'];
            $minutez = (deltimedot($datetime) - deltimedot($time));
            if ($minutez * $wrnx > $timewdisliker) {
             echo '============================' . $minutez;
             $db2->query("DELETE FROM bans WHERE reason like 'Disliker'");
             $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','RCM 5 Hours')");
             $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
             if ($x_number != 1) {
              
              rcon('say  ^7' . $playername . ' ^5' . $tmpbnd . ' 5 Hours^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
              AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
              //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN 5 Hours</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
              ++$x_number;
              echo ' bans   ' . $tfinishh = (microtime(true) - $start);
             }
            }
           }
           $result = $db2->query("SELECT * FROM bans WHERE reason like '%" . $yedate . "%' limit 1");
           foreach ($result as $row) {
            $id = $row['id'];
            $playername = $row['playername'];
            $ip = $row['ip'];
            $reason = $row['reason'];
            $time = $row['time'];
            $whooo = $row['whooo'];
            $ppatch = $row['patch'];
            $datetimex = date('YmdHis');
            $minutez = deltimedot($reason) - $datetimex;
            ///echo '=========TEMPBAN IS OVER========'.$minutez;
            if ($minutez * $wrnx < '0') {
             echo '========= TEMPBAN IS OVER ========' . $minutez;
             $db2->query("DELETE FROM bans WHERE reason like '%" . $yedate . "%'");
             $db2->query("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('$playername','$ip','','$reason','$time','$whooo','$ppatch','$whooo')");
             $db4->query("UPDATE x_db_players SET x_db_warn='0' WHERE x_db_ip='{$ip}'");
             if ($x_number != 1) {
              
              rcon('say  ^7' . $playername . ' ^5' . $tmpbnd . '^7 ' . $c_unban . ' ^7' . $infooreas . '^1:' . $reason . '', '');
              AddToLog("[" . $datetime . "] UNBAN: " . $ip . " (" . $playername . ")  reason: UnBan");
              //AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='orange'> ".$playername. " </font><font color='blue'>TEMPBAN</font><font color='black'> ".$c_unban.  " </font>Reason<font color='red'>:".$reason." </font> ");
              ++$x_number;
              echo ' bans   ' . $tfinishh = (microtime(true) - $start);
             }
            }
           }
          }
         }
		 
		 
		 
		 
		 
if (empty($guids)) {
 
             ///GUID KICKER
             if (!empty($i_name)) {
              if (!empty($guid)) {
               if ($guid != '0') {
                if ($guid != 'EMPTYguid') {
                 $result = $db2->query("SELECT * FROM bans WHERE guid='" . $guid . "'  LIMIT 1");
                 foreach ($result as $row) {
                  $pssiblegguid = $row['guid'];
                  $reason = $row['reason'];
                  if (!empty($guid)) {
                   if ((!empty($pssiblegguid)) || $pssiblegguid != '0') {
                    if (strpos($guid, $pssiblegguid) !== false) {
                     if ($x_number != 1) {
                      if ($x_loopsv == 0) {
                       
                       if (strpos('.', $reason) === false) {
                        if (!empty($reason)) {
                         if ($reason != '-1') {
                          $minutez = (int)deltimedot($reason) - (int)$datetimex;
                         }
                        }
                       }
                       if (is_numeric($reason)) rcon('clientkick ' . $idk . ' ^1TEMP BAN! ^7Left: ' . $minutez . ' minutes!', '');
                       else rcon('clientkick ' . $idk . ' BAN!', '');
                       
                       rcon('clientkick ' . $idk, '');
                       AddToLog("[" . $datetime . "] GUID KICK: (" . $idk . ") (" . $pssiblegguid . ") (" . $reason . ")");
                       ++$x_loopsv;
                       ++$x_number;
                       require $cpath . 'ReCodMod/functions/null.php';
                        
                      }
                     }
                    }
                   }
                  }
                 }
                }
               }
              }
             }
             ///nICKNAME KICKER
             if (!empty($i_name)) {
              $nickname = clearSymbols($nickname);
              $result = $db2->query("SELECT  * FROM bans WHERE playername='" . $nickname . "' limit 1");
              foreach ($result as $row) {
               $playername = $row['playername'];
               $reason = $row['reason'];
               $plnm = trim($playername);
               $i_nn = trim(clearSymbols($i_name));
               if ((strpos($plnm, $nickname) !== false) || (strpos($plnm, $i_nn) !== false)) {
                if ($x_number != 1) {
                 
                 $minutez = (int)(deltimedot($reason)) - (int)$datetimex;
                 if (is_numeric($reason)) rcon('clientkick ' . $idk . ' ^1TEMP BAN! ^7Left: ' . $minutez . ' minutes!', '');
                 else rcon('clientkick ' . $idk . ' BAN!', '');
                 
                 rcon('clientkick ' . $idk, '');
                 AddToLog("[" . $datetime . "] BANNED NICK KICK: (" . $idk . ") (" . $stats_array[$conisq]['ip_adress'] . ") (" . $i_name . ")");
                 ++$x_loopsv;
                 ++$x_number;
                 require $cpath . 'ReCodMod/functions/null.php';
                  
                }
               }
              }
             }
             /////IP KICKER
             $result = $db2->query("SELECT * FROM bans WHERE ip='".$stats_array[$conisq]['ip_adress']."'  LIMIT 1");
             foreach ($result as $row) {
              $ipuuu = $row['ip'];
              $playername1 = $row['playername'];
              $reason = $row['reason'];
              if ($x_number != 1) {
               
               rcon('say  ^7' . $playername1 . ' ' . $ban_ip_all . ' ^7' . $infooreas . ':^1 ' . $reason . '', '');
               
               $minutez = (int)(deltimedot($reason)) - (int)$datetimex;
               if (is_numeric($reason)) rcon('clientkick ' . $idk . ' ^1TEMP BAN! ^7Left: ' . $minutez . ' minutes!', '');
               else rcon('clientkick ' . $idk . ' BAN!', '');
               
               rcon('clientkick ' . $idk, '');
               AddToLog("[" . $datetime . "] BANNED IP KICK: (" . $idk . ") (" . $stats_array[$conisq]['ip_adress'] . ") (" . $i_name . ")");
               ++$x_loopsv;
               ++$x_number;
               echo ' bans   ' . $tfinishh = (microtime(true) - $start);
               require $cpath . 'ReCodMod/functions/null.php';
                
              }
             } 
              $result = $db2->query("SELECT * FROM x_words limit 1");
              foreach ($result as $row) {
               $namer = $row['z_names'];
               if ((preg_match('/' . $namer . '/si', $i_name, $namez)) && ($i_name != '')) {
                
                if ($game_ac == '0') {
                 
                 if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5')) rcon('clientkick ' . $idk . ' Bad name!', '');
                 else rcon('clientkick ' . $idk, '');
                }
                else {
                 rcon('tell ' . $idk . ' "' . $rules_bad_name_msg . '"', '');
                 
                 rcon('akick ' . $idk . ' " ^6[^7BAD NAME^6]"', '');
                 rcon('clientkick ' . $idk, '');
                }
                AddToLog("[" . $datetime . "] BANNED NICK KICK: (" . $stats_array[$conisq]['ip_adress'] . ") (" . $i_name . ")");
                ++$x_loopsv; //echo $namez[0];
                require $cpath . 'ReCodMod/functions/null.php';
                 
                //echo ' proxod3   '.$tfinishh = (microtime(true) - $start);
                
               }
               else {
                // echo 'No match found';
                //echo ' vooooooords   '.$tfinishh = (microtime(true) - $start);
                
               }
              }
            
   
             if (stopforumspam == 1) {
              $sql = "SELECT * FROM x_db_admins WHERE s_group='".$stats_array[$conisq]['ip_adress']."' and s_group='0' or s_group='2' LIMIT 1";
              $stat = $db->query($sql)->fetchColumn();
              if ($stat > 0) {
               echo '';
              }
              else {
               //////////////////////////////============================
               $ch = curl_init();
               curl_setopt($ch, CURLOPT_URL, 'http://www.stopforumspam.com/api?ip=' . $stats_array[$conisq]['ip_adress']);
               curl_setopt($ch, CURLOPT_HEADER, 0);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $response = curl_query($ch);
               $pattern = '/<appears>yes<\/appears>/';
               if (preg_match($pattern, $response)) {
                if ($x_loopsv == 0) {
                 /* IP is listed, so we inform the user, than exit. */
                 echo 'Spammer detected ' . $stats_array[$conisq]['ip_adress'] . ' ';
                 usleep($sleep_rcon * 4);
                 rcon('say ^7' . $chistx . ' ^3' . $proxyxn . ' ^6[^1RCM^3bot^6]', '');
                 
                 rcon('clientkick ' . $idk . " BlackListed!", '');
                 
                 rcon('clientkick ' . $idk, '');
                 AddToLog("[" . $datetime . "] STOP SPAM FORUM KICK: (" . $stats_array[$conisq]['ip_adress'] . ") (" . $i_name . ")");
                 ++$x_loopsv;
                }
               }
               curl_close($ch);
               //////////////////////////////============================
               
              }
             } 
			 
			 
			 
             $x_admin = 0;
            }		 
		 
		 
		 
		 
		 
		 
         ///////////////////////////////////////////////////////////////////////////////////////
         ///////////////////////////////////////////////////////////////////////////////////////
         ///////////////////////////////////////////////////////////////////////////////////////
         //////require $cpath . 'ReCodMod/functions/null_db_connection.php';
        }
        catch(PDOException $e) {
         errorspdo('[' . $datetime . '] 643  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
       }
      } 
 
 
 
 
 
 
 
 
 
 
 
}
?>
