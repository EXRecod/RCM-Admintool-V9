<?php
   
 	 $cron_time=filemtime($cpath."ReCodMod/cache/x_cron/cron_time_".$server_ip."_".$server_port);        //получаем время последнего изменения файла
if (time()-$cron_time>=200+$randxsumm) {             //сравниваем с текущим временем - 10 минут
    file_put_contents($cpath."ReCodMod/cache/x_cron/cron_time_".$server_ip."_".$server_port,"");    //перезаписываем файл cron_time
 
//////////////////////////////////////////////////////////////////////////////////////////+ LOG CLEANER
	
   if (strpos($mplogfile, 'ftp:') === false)
	 {	

if(!file_exists($mplogfile))
{
echo "No exists ".$mplogfile;
sleep(5);
}	
 
if (filesize($mplogfile) > 29457280)
  {
$ha0 = fopen($mplogfile, "w");
fclose($ha0);

$_SESSION[$server_port] = 0;

$handlePos=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt" ,"w+");
fwrite($handlePos, "1");
fclose($handlePos);
$datetime = date('Y.m.d H:i:s');
//AddToLog1("<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> LogFile game_mp.log 30MB auto reset! </font> "); 
echo "OK ...";

}
}
else
{
	
list($ftp_exp_user,$ftp_exp_password,$ftp_exp_ip,$ftp_exp_url,$gmlobame) = explode('%', ftp2locallog($mplogfile));
 	
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
if (filesize($file) > 229457280)
  {
 

 
//connect
$conn_id = ftp_connect($ftp_exp_ip);
$login_result = ftp_login($conn_id,$ftp_exp_user,$ftp_exp_password);
 
 
if (!$conn_id || !$login_result)
//("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу ftp_server!");
trigger_error("\n RCM DEBUG: Не удалось установить соединение с FTP сервером $ftp_exp_ip !", E_USER_ERROR);  
 
if(!empty($conn_id)){
// включение пассивного режима
 if (!ftp_pasv($conn_id, true)) {
            $errmsg = "Passive mode not available at this server";
            //Passive mode not available
    ftp_pasv($conn_id, false);
        }
}
  
 $ftp_user_name = $ftp_exp_user;
 $ftp_user_pass = $ftp_exp_password;
 

$remote_file = $ftp_exp_url;



$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
 

// попытка загрузки файла
if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
} else {
    echo "ERRRRRRRRROORRRRRRRRR FTP \n";
	echo $remote_file."ERRRRRRRRROORRRRRRRRR FTP \n";
	echo "ERRRRRRRRROORRRRRRRRR FTP \n";
}  
 
 
 
// попытка переименовать $olf_file в $new_file
if (ftp_rename($conn_id, $ftp_exp_url, $ftp_exp_url.'recod')) {
 echo "Файл ".$ftp_exp_url." переименован в ".$ftp_exp_url."recod \n";

	    $hu = fopen($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame, 'w+');
        fwrite($hu, "0");
        fclose($hu);
        echo 'NULLED';
 
 } else {
 echo "Не удалось переименовать ".$ftp_exp_url." в ".$ftp_exp_url."recod\n";
} 
 

 
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
fclose($fp); 

// попытка загрузки файла
if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
} else {
    echo "ERRRRRRRRROORRRRRRRRR FTP \n";
	echo $remote_file."ERRRRRRRRROORRRRRRRRR FTP \n";
	echo "ERRRRRRRRROORRRRRRRRR FTP \n";
}   
 

// close the connection
ftp_close($conn_id);
 


$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos2.txt", "w+");
fputs($fp, "0");
fclose($fp);

$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt", "w+");
fputs($fp, "0");
fclose($fp);

$fp = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($fp, "0");
fclose($fp);


$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_position.txt", "w+");
fputs($fp, "0");
fclose($fp);
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