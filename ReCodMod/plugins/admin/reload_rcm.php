<?php 
 if (strpos($msgr, ixz.'reload') !== false){ 
		 rcon('say ^1RCM reloading!', '');
         usleep(50000);
                require $cpath . 'ReCodMod/plugins_parser/stats_opt.php';
                exit;
}
?> 