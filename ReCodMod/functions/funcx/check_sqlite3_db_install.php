<?php
            $db1x = $cpath . 'ReCodMod/databases/db1.sqlite';
          $db2x = $cpath . 'ReCodMod/databases/db2.sqlite';
 
 if(empty(SqlDataBase)){
              if (!file_exists($db1x)){echo "\n DO NOT FIND $db1x"; 
			  require $cpath . 'ReCodMod/functions/install/install.php';
			  sleep (5); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}		
	      if (!file_exists($db2x)){echo "\n DO NOT FIND $db2x"; sleep (5); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
              if (!file_exists($cpath . 'ReCodMod/databases/db3.sqlite')){echo "\n DO NOT FIND ReCodMod/databases/db3.sqlite"; sleep (200); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
              if (!file_exists($cpath . 'ReCodMod/databases/db4.sqlite')){echo "\n DO NOT FIND ReCodMod/databases/db4.sqlite"; sleep (200); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}	
	      if (!file_exists($cpath . 'ReCodMod/databases/db5.sqlite')){echo "\n DO NOT FIND ReCodMod/databases/db5.sqlite"; sleep (200); if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;}
 }
 

if(!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok'))
	require $cpath . 'ReCodMod/functions/install/install.php';
if(!file_exists($cpath . 'ReCodMod/cache/x_cache/msqlinstallok'))
{
	trigger_error("\n RCM Информация: ALARM! DATABASE NOT INSTALED!!! STOPED MOD WORKING!", E_USER_ERROR);
	sleep(3);
}
 
 if(!file_exists(chatdb))
{
	echo "\n cfg/_settings.ini chatdb is false";
	sleep(20);
	exit;
}