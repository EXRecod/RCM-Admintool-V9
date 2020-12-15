<?php
   
 	 $cron_time=filemtime($cpath."ReCodMod/cache/x_cron/cron_time_".$server_ip."_".$server_port);        //получаем время последнего изменения файла
if (time()-$cron_time>=200) {             //сравниваем с текущим временем - 10 минут
    file_put_contents($cpath."ReCodMod/cache/x_cron/cron_time_".$server_ip."_".$server_port,"");    //перезаписываем файл cron_time
 
//////////////////////////////////////////////////////////////////////////////////////////+ LOG CLEANER
 if (strpos($mplogfile, 'ftp:') === false)
 {	

if(!file_exists($mplogfile))
{
echo "No exists ".$mplogfile;
sleep(5);
debuglog( (__FILE__)." No exists ".$mplogfile);
}	
  
if (filesize($mplogfile) > game_log_limits)
  {
$ha0 = fopen($mplogfile, "w");
fclose($ha0);

$_SESSION[$server_port] = 0;

$handlePos=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt" ,"w+");
fwrite($handlePos, "1");
fclose($handlePos); 
//AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> LogFile game_mp.log 30MB auto reset! </font> "); 
echo "OK ...";

}
} 

if (!file_exists($cpath . 'ReCodMod/cache/x_logs/'.$server_ip.'_'.$server_port.'_chat.log'))
touch($cpath . 'ReCodMod/cache/x_logs/'.$server_ip.'_'.$server_port.'_chat.log');

if (filesize($cpath . 'ReCodMod/cache/x_logs/'.$server_ip.'_'.$server_port.'_chat.log') > 3048576)
  {
if(file_exists($cpath . 'ReCodMod/cache/x_logs/'.$server_ip.'_'.$server_port.'_chat.log')){
$file = $cpath . "ReCodMod/cache/x_logs/".$server_ip."_".$server_port."_chat.log";
$newfile = $cpath . "ReCodMod/cache/x_logs/archive/chat/chat";
$datetime = date('Y.m.d H:i:s');

if (!copy($file, $newfile."_".$datetime.".log")) {
    echo "Error copy $file...\n";}else{
$handlePos=fopen($cpath."ReCodMod/cache/x_logs/".$server_ip."_".$server_port."_chat.log" ,"w+");
fwrite($handlePos, "1");
  fclose($handlePos);}}

   if(file_exists($cpath . 'ReCodMod/cache/x_logs/'.$server_ip.'_'.$server_port.'_chat.html')){
$file = $cpath . "ReCodMod/cache/x_logs/".$server_ip."_".$server_port."_chat.html";
$newfile = $cpath . "ReCodMod/cache/x_logs/archive/chat/chat";
$datetime = date('Y.m.d H:i:s');
   if (!copy($file, $newfile."_".$datetime.".html")) {
    echo "Error copy $file...\n";}else{
$handlePos=fopen($cpath."ReCodMod/cache/x_logs/".$server_ip."_".$server_port."_chat.html" ,"w+");
fwrite($handlePos, "1");
 fclose($handlePos);}}
 
//AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> x_logs ".$server_ip."_".$server_port."_chat.html 3MB auto reset! </font> "); 
echo "OK ...";	  
  }  
} 

                $statscronx = $cpath . 'ReCodMod/databases/' . $server_ip . '_' . $server_port . '_statstimer.log';
                if (!file_exists($statscronx)) touch($statscronx);
				
                            if (!file_exists($cpath . 'ReCodMod/cache/loader_opt/')) mkdir($cpath . 'ReCodMod/cache/loader_opt/', 0777, true);
                            $string = str_replace(".", "_", $server_ip);
                            if (!file_exists($cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/')) 
								mkdir($cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/', 0777, true);
                            //$statscronx = $cpath.'ReCodMod/cache/loader_opt/fast_up_'.$string.'_'.$server_port.'/';
                            if (!file_exists($cpath . 'ReCodMod/cache/loader_opt/fast_up_' . $string . '_' . $server_port . '/')) 
								mkdir($cpath . 'ReCodMod/cache/loader_opt/fast_up_' . $string . '_' . $server_port . '/', 0777, true);
                            if (!file_exists($cpath . 'ReCodMod/cache/stats_register/')) 
								mkdir($cpath . 'ReCodMod/cache/stats_register/', 0777, true);
                            if (!file_exists($cpath . 'ReCodMod/cache/stats_register/' . $server_ip . '_' . $server_port)) 
								mkdir($cpath . 'ReCodMod/cache/stats_register/' . $server_ip . '_' . $server_port, 0777, true);
                            file_put_contents($statscronx, "");				
				
?>