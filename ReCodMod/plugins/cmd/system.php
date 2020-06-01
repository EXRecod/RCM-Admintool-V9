<?php
if (strpos($msgr, $ixz.'sys') !== false)
    { 	
	if (!empty($stats_array[$conisq]['user_status']))
	{ 
if(userStatus($stats_array[$conisq]['user_status']!=3))
{ 
 if (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')
 {
  $suptime = system("uptime"); 
  $syys = system("uname -a");  
//$smemmory = system("free -m"); 
//system("df -h"); 
  $ccgc = system("cat /proc/cpuinfo | grep \"model name\\|processor\"");
 
echo " \n uptime".$suptime;
echo " \n SYSTEM".$syys;
echo " \n CPU".$ccgc; 
  

rcon('say ^3'.$sysupttm.': ^7'.$suptime.'', '');		

rcon('say ^3'.$sysrkgd.': ^7'.$syys.'', '');	

rcon('say ^3'.$sysrkcpuu.': ^7'.$ccgc.'', '');	
 ++$x_stop_lp;
}
 else
 {
	 $serveros = $_SERVER['OS'];

rcon('tell '.$i_id.' ^3System info: ^7'.$serveros.'', '');
 ++$x_stop_lp;
}}}}
?>
 
