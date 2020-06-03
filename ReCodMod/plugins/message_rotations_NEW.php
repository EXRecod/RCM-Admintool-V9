<?php

//.chat_banner_messages_rotation.ini LOADER
 $config_data = parse_ini_file($cpath . "cfg/chat_banner_messages_rotation.ini", true);
 foreach($config_data as $section => $r)   
 {   foreach($r as $string => $value){
		if(!defined($string))
		define($string, $value);    	
 }}
 //.chat_banner_messages_rotation.ini LOADER
    if (!empty(chat_banner))
     {
///////////////// banner scheduler		 
      list($sh, $sm) = explode(' ', date('H i'));
      $sh = (int) $sh;
      $sm = (int) $sm;
	  $shx = ''.$sh.':'.$sm.'';      
	  if (!empty(message[$shx]))
       {
        if (is_array(message[$shx]))
         {
          foreach (message[$shx] as $c)
           {    
                xcon("say ".$c);   
           }
         }
	   }
///////////////// banner scheduler	   
if(!file_exists($cpath.'ReCodMod/cache/x_cron/cron_time_message_'.$server_ip."_".$server_port)) 
		touch($cpath.'ReCodMod/cache/x_cron/cron_time_message_'.$server_ip."_".$server_port); 
	
	    if(!file_exists($cpath.'ReCodMod/cache/x_cron/cron_time_exec1z_'.$server_ip."_".$server_port)) 
		touch($cpath.'ReCodMod/cache/x_cron/cron_time_exec1z_'.$server_ip."_".$server_port); 
		
        $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_message_".$server_ip."_".$server_port);
        if ($stime - $cron_time >= message_pause*$xmoretime)
         { 
          file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_message_".$server_ip."_".$server_port, "");
            echo ' - ' . $spps . ' - ';
			$acceptplugin = 1;
                    require $cpath . 'cfg/messages.cfg.php'; 	   
////////////////////////////////////////////////////////////////////////
$whiles = 0;	 
foreach (message as $servers => $command)
 {    
             if(empty($mes_memory))
	              $mes_memory[$servers.$command] = $servers.$command;
             else{
                  unset($mes_memory);				 
			      $mes_memory[$servers.$command] = $servers.$command;
			     }			  
               if(($mes_memory[$servers.$command] != $servers.$command)&& (empty($whiles)))
			   { $whiles = 1;



		   
		   
		   
		   
				//message["28960,28962,28969"] = 'top_skill'
				//message["28961"] = 'today'
				if(((strpos($servers,$server_port) !== false)&&(strpos($servers,':') === false))
				 ||((strpos($servers,$server_port) !== false)&&(is_int($servers))))
				{
				    xcon("say ".$command); 
				}
				//message[] = 'top_week'  - for all servers
                else if(is_int($servers))
				{
                    xcon("say ".$command); 
				}
				//message["212.109.217.69:28960,212.109.217.69:28961"] = '[SERVERINFO] ^3{SERVER_IP} ^7{SERVER_NAME} ^7=> ^2{SERVER_CURRENT_PLAYERS} ^7/ ^2{SERVER_MAX_PLAYERS}'
               else if((strpos($servers,'.') !== false)&&(strpos($servers,':') === false))
				{{ 
                  if(message_pause < 10)
				  {					  
                    
					
					xcon("say ".$command);
					
					
					
				  }}}




echo " \n [".$datetime."] Message -> ".meessagee($command)." \n Paused -> ".$tfinishh = (microtime(true) - $start)." seconds \n";
	}			
 }	   
///////////////////////////////////////////////////////////////////	   
		 $x_stop_lp = 56800;
		 }
		 	 
	}
?>
