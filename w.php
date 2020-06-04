<?php
//ini_set('memory_limit', '-1');
$debug_sql = 1; // 1 - OFF  0 - ON
function hx($sc) {
  $sc = str_replace(array(
    "w.php"
  ) , '', $sc);
  return $sc . "";
}
$x_ff = 0;
$cpath = hx(__FILE__);
//phpinfo();
require_once $cpath . 'ReCodMod/functions/install/php_modules_geo_install.php';
$randxsumm = rand(300, 1500);
$spps = 221000;
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');
require $cpath . 'ReCodMod/functions/_c.php';
require $cpath . 'ReCodMod/functions/inc_functions.php';
include ($cpath . "ReCodMod/functions/functions.php");
include ($cpath . "ReCodMod/functions/geoip_bases/MaxMD/geoipcity.inc");
include ($cpath . "ReCodMod/functions/geoip_bases/MaxMD/timezone/timezone.php");
if (!file_exists($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos.txt')) require $cpath . 'ReCodMod/functions/install/install.php';
if (!file_exists($cpath . 'ReCodMod/cache/x_cache/' . $server_ip . '_' . $server_port . '_pos.txt')) {
  echo "\033[38;5;1m Install failed!";
  sleep(10);
  exit;
}
$dircache = $cpath . "win_cache_ms/";
if (is_dir($dircache)) {
  $dircache = $cpath . "php/php.ini";
  if (!file_exists($dircache)) {
    echo "\033[38;5;1m Install failed!";
    sleep(30);
    exit;
  }
}
echo "\n";
ini_set("log_errors", "1");
if (preg_match('/ftp:/', $mplogfile, $u)) $spps = 470000;
else $spps = 80000;
$xerrrors = ($cpath . "ReCodMod/cache/x_errors/$filename");
ini_set("error_log", $xerrrors);
$logging = new log($xerrrors);
set_error_handler("error_handler");
require $cpath . 'ReCodMod/functions/funcx/_folder_chmod_and_cfg.php';
require $cpath . 'ReCodMod/functions/funcx/check_sqlite3_db_install.php';
require $cpath . 'ReCodMod/functions/funcx/_get_player_server_count_infos.php';
echo "\n\n \033[38;5;155m SERVER IP : [\033[38;5;150m", $server_ip, "\033[38;5;155m]";
echo "\n \033[38;5;155m SERVER PORT : [\033[38;5;150m", $server_port, "\033[38;5;155m]";
echo "\n \033[38;5;155m SERVER RCON PASSWORD : [\033[38;5;150m", $server_rconpass, "\033[38;5;155m]";
echo "\n\033[38;5;14m";
if (!empty($servername)) echo "\n Server Name: " . $servername;
else $servername = '';
if (!empty($mpgamenname)) echo "\n Game: " . $mpgamenname = sevenofff($mpgamenname);
if (!empty($mmn)) echo "\n Patch: " . $mmn = sevenofff($mmn);
if (!empty($serverxmap)) echo "\n Map: " . $serverxmap = sevenofff($serverxmap);
if (!empty($plyr_cnt)) echo "\n Players: " . $plyr_cnt . "\n";
echo "\n Pre loading system - OK! ";
require $cpath . 'ReCodMod/functions/funcx/_game_log_cleaner.php';
$emaprun = '';
if (PHP_SAPI != 'cli') {
  sleep(5);
  exit('<h1>This software cannot be run on a webspace!</h1>');
}
echo "\033[38;5;205m";
echo "\n\n /.> PHP version: ", phpversion();
$resumeposftp = 0;
$sizeftp = 0;
echo "\n \033[38;5;240m";
echo "\n ***** |||||||||    ///     /// ";
echo "\n ***** |||           ///   ///";
echo "\n ***** |||            /// //  recod ";
echo "\n ***** |||||||||       //////       ";
echo "\n ***** |||           ////  ///      ";
echo "\n ***** |||          ///      ///   *ReCodMod V.9 [2011-2020]";
echo "\n ***** |||||||||   ///        ///   skype: larocca2012";
echo "\n\n \033[38;5;9m     /-/ " . $z_set . " /-/ ready to work /-/ \n \033[38;5;11m";
echo "   Game Server:   ", $servernamex = trim(meessagee($servername)) , " / ", $game_patch, "\n";
if (empty(multi_ip_servers)) {
  if (strpos($server_ip, '.') !== false) {
    $pipip = explode(".", $server_ip);
    $svipport = abs(hexdec(crc32($pipip[2] . $pipip[3]))) . $server_port;
  }
  else $svipport = abs(hexdec(crc32($server_ip))) . $server_port;
  echo " \033[38;5;255m Unique server id = crc32(ip)&port: ", $svipport;
  echo "\n \033[38;5;255m Unique server id = ", 'multi_ip_servers = 0;';
}
else {
  $svipport = $server_port;
  echo " \033[38;5;255m Unique server id = port: ", $svipport;
  echo "\n \033[38;5;255m Unique server id = ", 'multi_ip_servers = 1;';
}
echo "\n";
//if (empty($settizones))
//   $settizones = setTimezone("k");
if (!empty($settizones)) echo $settizones;
echo " \n \033[38;5;46m";
if (!empty(multi_ip_servers)) $svipport = $server_port;
//*************************************************************************************
//*************************************************************************************
//*************************************************************************************
while (true) {  
  $allplugs = getDirContents($cpath . 'ReCodMod/functions/funcx/start/');
  foreach ($allplugs AS $va) {
    if (strpos($va, '.php') !== false) require $va;
  }
  $goto = 0;
  if (strpos($mplogfile, 'ftp:') !== false) {
    if ($parseline == $mplogfilep) $goto = 1;
  }
  else if ($parseline == $mplogfile) $goto = 1;
  if ($goto == 0) {
    if ($x_stop_lp == 0) {
      require $cpath . 'ReCodMod/functions/funcx/start/3_sleep_time.php';
        $datetime = date('Y.m.d H:i:s');
        $dtx2 = date('Y-m-d H:i:s');
        require $cpath . 'ReCodMod/functions/funcx/db_delete_day_stats.php';
        require $cpath . 'ReCodMod/functions/funcx/cfg_rules_schedule.php';
        if ($mplogfile) {
          if (((!empty($parseline)) && (preg_match('/;/', $parseline, $z))) || ((!empty($parseline)) && (preg_match('/ExitLevel: executed/', $parseline, $z))) || ((!empty($parseline)) && (preg_match('/ShutdownGame:/', $parseline, $z))) || ((!empty($parseline)) && (preg_match('/InitGame:/', $parseline, $z)))) {
              //%%%%%%%%%%%%%%%%%%%%%%%%  CHAT  %%%%%%%%%%%%%%%%%%%%%%%%
              if ((preg_match('/say;/', $parseline, $u)) || (preg_match('/sayteam;/', $parseline, $xm)) || (preg_match('/tell;/', $parseline, $xm))) {
                require $cpath . 'ReCodMod/functions/parser/chat.php';
                require $cpath . 'ReCodMod/functions/null_db_connection.php';
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  JOIN  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (preg_match('/J;/', $parseline, $u)) {
                require $cpath . 'ReCodMod/functions/parser/geo.php';
                require $cpath . 'ReCodMod/functions/null_db_connection.php';
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  QUIT  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (preg_match('/Q;/', $parseline, $u)) {
                require $cpath . 'ReCodMod/functions/parser/quit.php';
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  KILL  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (strpos($parseline, 'K;') !== false) {
				
                require $cpath . 'ReCodMod/functions/parser/stats.php';
                require $cpath . 'ReCodMod/functions/null_db_connection.php';
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  DAMAGE  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (strpos($parseline, 'D;') !== false) {
                require $cpath . 'ReCodMod/functions/parser/stats.php';
                require $cpath . 'ReCodMod/functions/null_db_connection.php';
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  END  %%%%%%%%%%%%%%%%%%%%%%%%
              else if ((strpos($parseline, 'W;END;GAME;') !== false) && (strlen($parseline) < 45))
              //// level notify ( "game_ended" ); logPrint("W;END;GAME; \n");
              {
                rcon('say ^3Rbot ^6=> ^3Chat commands frozen now!', '');
                require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
                exit;
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  END  %%%%%%%%%%%%%%%%%%%%%%%%
              else if ((strpos($parseline, 'ExitLevel: executed') !== false) && (strlen($parseline) < 75)) {
                require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
                exit;
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  END  %%%%%%%%%%%%%%%%%%%%%%%%
              else if ((strpos($parseline, 'ShutdownGame:') !== false) && (strlen($parseline) < 45)) {
                require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
                exit;
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  START  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (preg_match('/InitGame:/', $parseline, $u)) {
                require $cpath . 'ReCodMod/functions/parser/initgame_gametype_map_save.php';
              }
              //%%%%%%%%%%%%%%%%%%%%%%%%  ANOTHER PLUGINS  %%%%%%%%%%%%%%%%%%%%%%%%
              if ((!empty($parseline)) && (preg_match('/;/', $parseline, $jn))) {
                require $cpath . 'ReCodMod/plugins/messages/banner_messages_rotations.php';
                require $cpath . 'ReCodMod/functions/funcx/commands_array.php';
				//COSTUM LOG PREFIX USES FC; GEO; and another
				require $cpath . 'ReCodMod/functions/costum_commands_access/access.php';
                if (!empty($guid)) {
                  $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));
                  if (empty($stats_array[$conisq]['user_status'])) $stats_array[$conisq]['user_status'] = 'guest';
                }
                if (((!empty($guidn)) && ($validCommand == 1)) || (!empty($guid)) || (!empty($specials))) {
                  /* COSTUM PLUGINS */
                  if (!file_exists($cpath . 'ReCodMod/plugins_costum/')) mkdir($cpath . 'ReCodMod/plugins_costum/', 0777, true);
                  $allplugs = getDirContents($cpath . 'ReCodMod/plugins_costum/');
                  foreach ($allplugs AS $va) {
                    if (strpos($va, '.php') !== false) {
                      require $va;
                    }
                  }
                  require $cpath . 'ReCodMod/functions/null_db_connection.php';
                }
                //%%%%%%%%%%%%%%%%%%%%%%%%  END PLUGINS LOAD  %%%%%%%%%%%%%%%%%%%%%%%%
              }
          }
        }
    }
  }
}
?>