<?php
    if (!empty(rules_schedule))
     {
      list($sh, $sm) = explode(' ', date('H i'));
      $sh = (int) $sh;
      $sm = (int) $sm;
	  $shx = ''.$sh.':'.$sm.'';
	   
      if (!empty(rules_schedule[$shx]))
       {
        if (is_array(rules_schedule[$shx]))
         {
          foreach (rules_schedule[$shx] as $c)
           {
            $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_exec1z_".$server_ip."_".$server_port);
            if (time() - $cron_time >= 60)
             {
              file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_exec1z_".$server_ip."_".$server_port, "");               
                rcon($c);
                AddToLog("[" . $datetime . "] rules_schedule $shx $c ");
               
             }
           }
         }
       }
     }
?>