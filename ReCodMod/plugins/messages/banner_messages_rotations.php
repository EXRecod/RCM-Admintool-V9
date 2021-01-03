<?php
//.chat_banner_messages_rotation.ini LOADER
$config_data = parse_ini_file($cpath . "cfg/chat_banner_messages_rotation.ini", true);
foreach ($config_data as $section => $r) {
  foreach ($r as $string => $value) {
    if (!defined($string)) 
		define($string, $value);
  }
}
//.chat_banner_messages_rotation.ini LOADER
if (!empty(chat_banner)) {
  ///////////////// banner scheduler
  list($sh, $sm) = explode(' ', date('H i'));
  $sh = (int)$sh;
  $sm = (int)$sm;
  $shx = '' . $sh . ':' . $sm . '';
  if (!empty(chat_message[$shx])) {
    if (is_array(chat_message[$shx])) {
      foreach (chat_message[$shx] as $c) {
        xcon("say " . $c);
      }
    }
  }
   
  
  ///////////////// banner scheduler
  if (!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_time_message_' . $server_ip . "_" . $server_port)) 
	  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_message_' . $server_ip . "_" . $server_port);
  if (!file_exists($cpath . 'ReCodMod/cache/x_cron/cron_time_exec1z_' . $server_ip . "_" . $server_port)) 
	  touch($cpath . 'ReCodMod/cache/x_cron/cron_time_exec1z_' . $server_ip . "_" . $server_port);
  $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_message_" . $server_ip . "_" . $server_port);
  
  
  if ($stime - $cron_time >= chat_message_pause * $xmoretime) {
    file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_message_" . $server_ip . "_" . $server_port, "");
    echo ' - ' . $spps . ' - ';
    ////////////////////////////////////////////////////////////////////////
    $whiles = 0;
	if(empty($fwl))
	$fwl    = 1;
	$rr     = 0;
    foreach (chat_message as $servers => $command) {
	   ++$rr;	
	$msg_memory[$rr] = $servers .'%%%%%'.$command;	
    }
	 
	 if(!empty($msg_memory[$fwl]))
	 list($servers,$command) = explode('%%%%%', $msg_memory[$fwl]);
     else
	  $fwl    = 1;	 
	 
	 ++$fwl;
	 
	
      if (empty($whiles)) {
        $whiles = 1;
		 
	echo '################# ',$servers,' / ',$command;		
		
		
        //chat_message["28960,28962,28969"] = 'top_skill'
        //chat_message["28961"] = 'today'
        //chat_message[] = 'top_week'  - for all servers
        if (((strpos($servers, $server_port) !== false) && (strpos($servers, ':') === false)) || ((strpos($servers, $server_port) !== false) && (is_int($servers)))) {
          require $cpath . 'ReCodMod/plugins/messages/banner_messages_switch.php';
		  
				  
		  
        }
        //chat_message["212.109.217.69:28960,212.109.217.69:28961"] = '[SERVERINFO] ^3{SERVER_IP} ^7{SERVER_NAME} ^7=> ^2{SERVER_CURRENT_PLAYERS} ^7/ ^2{SERVER_MAX_PLAYERS}'
        else if ((strpos($servers, '.') !== false) && (strpos($servers, ':') === false)) { {
            if (message_pause > 10) {
              // EXPLODE , $servers
              // GET INFO FROM SERVERS
              $patterns = array();
              $patterns[0] = '/{SERVER_IP}/';
              $patterns[1] = '/{SERVER_NAME}/';
              $patterns[2] = '/{SERVER_CURRENT_PLAYERS}/';
              $patterns[3] = '/{SERVER_MAX_PLAYERS}/';
              $patterns[4] = '/{SERVER_MAPNAME}/';
              $patterns[5] = '/{SERVER_GAMETYPE}/';
              $replacements = array();
              $replacements[5] = $ipzc[$xmde];
              $replacements[4] = $server_name[$xmde];
              $replacements[3] = $server_cur_players[$xmde];
              $replacements[2] = $server_max_players[$xmde];
              $replacements[1] = $server_mapname[$xmde];
              $replacements[0] = $server_gametype[$xmde];
              $vvv = preg_replace($patterns, $replacements, trim($command));
              echo '*** ' . meessagee($vvv);
			  		 echo '*** '.meessagee($vvv);	
++$xmde;
	
usleep($sleep_rcon);
	xcon('say ^6 '.$vvv, '');
              //xcon("say ".$command);
              //exec('cmd /C '.$cpath . 'ReCodMod/plugins/messages/servers_information.bat');
              
            }
          }
        }
        echo " \n [" . $datetime . "] _Message -> " . meessagee($command) . " \n Paused -> " . $tfinishh = (microtime(true) - $start) . " seconds \n";
      }
 
    ///////////////////////////////////////////////////////////////////
    $x_stop_lp = 56800;
  }
}
?>