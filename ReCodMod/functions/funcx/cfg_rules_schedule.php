<?php
    if (isset($rules_schedule))
     {
      list($sh, $sm) = explode(' ', date('H i'));
      $sh = (int) $sh;
      $sm = (int) $sm;
      if ((isset($rules_schedule[$sh])) && (isset($rules_schedule[$sh][$sm])))
       {
        if (is_array($rules_schedule[$sh][$sm]))
         {
          foreach ($rules_schedule[$sh][$sm] as $c)
           {
            $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_exec1z_".$server_ip."_".$server_port);
            if (time() - $cron_time >= 60)
             {
              file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_exec1z_".$server_ip."_".$server_port, "");
              
                
                rcon($c);
                AddToLog("[" . $datetime . "] MAP ROTATION AUTO CHANGE (configs.php)");
               
             }
           }
         }
        else
         {
          $cron_time = filemtime($cpath . "ReCodMod/cache/x_cron/cron_time_exec1z_".$server_ip."_".$server_port);
          if (time() - $cron_time >= 60)
           {
            file_put_contents($cpath . "ReCodMod/cache/x_cron/cron_time_exec1z_".$server_ip."_".$server_port, "");
           
              
              rcon($rules_schedule[$sh][$sm]);
              AddToLog("[" . $datetime . "] MAP ROTATION AUTO CHANGE (configs.php)");
             
           }
         }
       }
     }