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

mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');
require_once $cpath . 'ReCodMod/functions/_c.php'; 
include ($cpath . "ReCodMod/functions/functions.php");
ini_set("log_errors", "1");
$xerrrors = ($cpath . "ReCodMod/cache/x_errors/$filename");
$xdebuger = ($cpath . "ReCodMod/cache/x_errors/debug.log");
ini_set("error_log", $xerrrors);
$logging = new log($xerrrors);
set_error_handler("error_handler");
if (PHP_SAPI != 'cli') {
  sleep(5);
  exit('<h1>This software cannot be run on a webspace!</h1>');
}
include ($cpath . "ReCodMod/functions/geoip_bases/MaxMD/geoipcity.inc");
include ($cpath . "ReCodMod/functions/geoip_bases/MaxMD/timezone/timezone.php");
require $cpath . 'ReCodMod/functions/install/install.php';
echo "\n";
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
if (!empty($mpshortver)) echo "\n Patch: " . $mpshortver = sevenofff($mpshortver);
if (!empty($serverxmap)) echo "\n Map: " . $serverxmap = sevenofff($serverxmap);
if (!empty($plyr_cnt)) echo "\n Players: " . $plyr_cnt . "\n";
require $cpath . 'ReCodMod/functions/funcx/_game_log_cleaner.php';
$emaprun = '';
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
$spps = 50000;
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
require $cpath . 'ReCodMod/functions/funcx/start/3_sleep_time.php'; 
  $zetx = 1; 
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
	  //echo "\n".$parseline;
   
        $datetime = date('Y.m.d H:i:s');
        $dtx2 = date('Y-m-d H:i:s');
        require $cpath . 'ReCodMod/functions/funcx/db_delete_day_stats.php';
        require $cpath . 'ReCodMod/functions/funcx/cfg_rules_schedule.php';
		
		 
		
             //%%%%%%%%%%%%%%%%%%%%%%%%  CHAT  %%%%%%%%%%%%%%%%%%%%%%%%
              if (ActionIs('say',$parseline) || ActionIs('sayteam',$parseline) || ActionIs('tell',$parseline))
                require $cpath . 'ReCodMod/functions/parser/chat.php';
              //%%%%%%%%%%%%%%%%%%%%%%%%  JOIN  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (ActionIs('J',$parseline))
                require $cpath . 'ReCodMod/functions/parser/geo.php';
              //%%%%%%%%%%%%%%%%%%%%%%%%  BOMB  %%%%%%%%%%%%%%%%%%%%%%%% logPrint("A;"....
              else if (ActionIs('A',$parseline))
                require $cpath . 'ReCodMod/functions/parser/teamplay.php';	
              //%%%%%%%%%%%%%%%%%%%%%%%%   WIN  %%%%%%%%%%%%%%%%%%%%%%%% logPrint("W;"....
              else if (ActionIs('W',$parseline))
                require $cpath . 'ReCodMod/functions/parser/teamplay.php';
              //%%%%%%%%%%%%%%%%%%%%%%%%  LOSE  %%%%%%%%%%%%%%%%%%%%%%%% logPrint("L;"....
              else if (ActionIs('L',$parseline))
                require $cpath . 'ReCodMod/functions/parser/teamplay.php';			
              //%%%%%%%%%%%%%%%%%%%%%%%%  QUIT  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (ActionIs('Q',$parseline))
                require $cpath . 'ReCodMod/functions/parser/quit.php';
              //%%%%%%%%%%%%%%%%%%%%%%%%  KILL  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (ActionIs('K',$parseline))
                require $cpath . 'ReCodMod/functions/parser/stats.php';
              //%%%%%%%%%%%%%%%%%%%%%%%%  DAMAGE  %%%%%%%%%%%%%%%%%%%%%%%%
              else if (ActionIs('D',$parseline))
                require $cpath . 'ReCodMod/functions/parser/stats.php';
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
              if ((!empty($parseline)) && (preg_match('/;/', $parseline, $jn))
			   ||((!empty($parseline)) && (preg_match('/([0-9]):([0-9])+\s*([a-z])/iu', $parseline, $jn)))) {
                require $cpath . 'ReCodMod/plugins/messages/banner_messages_rotations.php';
                require $cpath . 'ReCodMod/functions/funcx/commands_array.php';
				//COSTUM LOG PREFIX USES FC; GEO; and another
				require $cpath . 'ReCodMod/functions/costum_commands_access/access.php';
                if (!empty($guid)) {
                  $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));
                  if (empty($stats_array[$conisq]['user_status'])) $stats_array[$conisq]['user_status'] = 'guest';
                }
                //if (((!empty($guidn)) && ($validCommand == 1)) || (!empty($guid)) || (!empty($specials))) {
                  /* COSTUM PLUGINS */
                  //if (!file_exists($cpath . 'ReCodMod/plugins_costum/')) mkdir($cpath . 'ReCodMod/plugins_costum/', 0777, true);
                  $allplugs = getDirContents($cpath . 'ReCodMod/plugins_costum/');
                  foreach ($allplugs AS $va) {
                    if (strpos($va, '.php') !== false) { 
                      require $va;
                    }
                  }
                  require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
                //}
                //%%%%%%%%%%%%%%%%%%%%%%%%  END PLUGINS LOAD  %%%%%%%%%%%%%%%%%%%%%%%%
              } 
          } 
		  //break;
  }
?>