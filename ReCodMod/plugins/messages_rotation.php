<?php	 
      if ($x_rotate == 0) {
		if(!file_exists($cpath.'ReCodMod/cache/x_cron/cron_time_message_'.$server_ip."_".$server_port)) 
		touch($cpath.'ReCodMod/cache/x_cron/cron_time_message_'.$server_ip."_".$server_port); 
	
	    if(!file_exists($cpath.'ReCodMod/cache/x_cron/cron_time_exec1z_'.$server_ip."_".$server_port)) 
		touch($cpath.'ReCodMod/cache/x_cron/cron_time_exec1z_'.$server_ip."_".$server_port); 
		
        $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_message_".$server_ip."_".$server_port);
        if ($stime - $cron_time >= $msg_pause*$xmoretime)
         { 
          file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_message_".$server_ip."_".$server_port, "");
            echo ' - ' . $spps . ' - ';
			$acceptplugin = 1;
                    require $cpath . 'cfg/messages.cfg.php';
            require $cpath . 'ReCodMod/plugins/messages.php';
         				 ++$x_rotate;
		 $x_stop_lp = 56800;
		  //echo '~';
		 }
		} 			 
