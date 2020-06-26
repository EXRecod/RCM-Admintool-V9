<?php
   if (strpos($mplogfile, 'ftp:') !== false)
	 {
		 
if(!file_exists($cpath."ReCodMod/cache/server_empty_ftp_log.log"))
{
$file = hxlog($cpath."ReCodMod/cache/server_empty_ftp_log.log");
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
}		 

if(empty($ftp_fatality))
$ftp_fatality = 1;	
 
 $ftptimer = $cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_ftptimer.recod';

//ФТП СКОРОСТЬ
	 if(!file_exists($ftptimer)) touch($ftptimer);
            $n = filemtime($ftptimer);
                if (time() - $n >= 1) { file_put_contents($ftptimer, "-");		 
 
echo "\033[38;5;190m -ftp- \033[38;5;46m";

list($ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url,$gmlobame) = explode('%', ftp2locallog($mplogfile));
 
//connect

 

if((empty($log_res))||(!is_resource($conn_idq)))
{
 
 echo "\033[38;5;1m [FTP LOGIN] \033[38;5;46m"; 
 
$conn_idq = ftp_connect($ftp_q_ip);
$log_res = ftp_login($conn_idq,$ftp_q_user,$ftp_q_password);

if (!$conn_idq || !$log_res)
{
//("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
trigger_error("\n RCM DEBUG: Не удалось установить соединение с FTP сервером $ftp_q_ip !", E_USER_ERROR);
sleep(20);
exit; 
}



if(!empty($conn_idq)){
// включение пассивного режима
 if (!ftp_pasv($conn_idq, true)) {
            $errmsg = "Passive mode not available at this server";
            //Passive mode not available
    ftp_pasv($conn_idq, false);
        }
}

}





if ($log_res)
{
 
if(!empty($conn_idq)){


if(!file_exists($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame))
{
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
}
else
{
///////////////////////////////////////////////


if($ftp_fatality == 2)
	$xftp_time = 30;
else
	$xftp_time = 300;

clearstatcache();	
$dyq = filemtime($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame);
if (time() - $dyq >= $xftp_time)
{	

if($ftp_fatality == 2)
trigger_error("\n * Критическая ошибка /// RCM DEBUG: Статус ФТП=$ftp_fatality Не обновило за  $xftp_time секунд локальный FTP лог игры.", E_USER_ERROR);
    else
trigger_error("\n * RCM DEBUG: Статус ФТП=$ftp_fatality Обновило за  $xftp_time секунд локальный FTP лог игры.", E_USER_ERROR);	
	
	
//$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$file = $cpath."ReCodMod/cache/server_empty_ftp_log.log";
if($ftp_fatality != 2)
trigger_error("\n * RCM DEBUG:  Обнуление локального лога.", E_USER_ERROR);
  
if (@ftp_put($conn_idq, $ftp_q_url, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
	
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");


$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt", "w+");
fputs($fp, "0");
fclose($fp);

$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($hu, "1");
fclose($hu);
 
$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_position.txt", "w+");
fputs($fp, "0");
fclose($fp);	
 	
	
	if($ftp_fatality != 2)
trigger_error("\n * RCM DEBUG:  Обнуление фтп лога.", E_USER_ERROR);

if($ftp_fatality == 2)
{
	$ftp_fatality = 1;
trigger_error("\n *  *** RCM DEBUG:  Обнуление фтп лога. Успех = Стабильная работа!", E_USER_ERROR);	
}


} else {
    echo "ERRRRRRRRROORRRRRRRRR FTP \n";
	echo $ftp_q_url."ERRRRRRRRROORRRRRRRRR FTP \n";
	echo "ERRRRRRRRROORRRRRRRRR FTP \n";
	 
trigger_error("\n * Критическая ошибка:  Не обнулило фтп лог.", E_USER_ERROR); 


@ftp_close($conn_idq); 
$log_res = '';
echo "\033[38;5;1m [FTP LOGIN] \033[38;5;46m"; 
$conn_idq = ftp_connect($ftp_q_ip);
$log_res = ftp_login($conn_idq,$ftp_q_user,$ftp_q_password);

if(!empty($conn_idq)){
// включение пассивного режима
 if (!ftp_pasv($conn_idq, true)) {
            $errmsg = "Passive mode not available at this server";
            //Passive mode not available
    ftp_pasv($conn_idq, false);
        }
}


   $ftp_fatality = 2;  
}

/*	
// попытка переименовать $olf_file в $new_file
if (ftp_rename($conn_idq, $ftp_q_url, $ftp_q_url.'recod')) {
 echo "Файл ".$ftp_q_url." переименован в ".$ftp_q_url."recod \n";
 if($ftp_fatality != 2)        
trigger_error("\n * RCM DEBUG: FTP лог переименован в ".$ftp_q_url."recod.", E_USER_ERROR);
 
	    $hu = fopen($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame, 'w+');
        fwrite($hu, "0");
        fclose($hu);
        echo 'NULLED';
if($ftp_fatality != 2)
trigger_error("\n * RCM DEBUG:  Обнуление локального лога.", E_USER_ERROR);


if($ftp_fatality == 2)
{
	$ftp_fatality = 1;
trigger_error("\n *  *** RCM DEBUG:  Обнуление фтп лога. Успех = Стаблиьная работа!", E_USER_ERROR);	
}
 
 } else {
 echo "Не удалось переименовать ".$ftp_q_url." в ".$ftp_q_url."recod\n";
 trigger_error("\n * Критическая ошибка:  Не удалось переименовать фтп лог.", E_USER_ERROR);

   $ftp_fatality = 2;
}	
*/






/*
$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt", "w+");
fputs($fp, "0");
fclose($fp);

$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($hu, "1");
fclose($hu);
 
$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_position.txt", "w+");
fputs($fp, "0");
fclose($fp);	
*/ 	
	
if($ftp_fatality == 1)
{	
require $cpath . 'ReCodMod/functions/null.php';
exit;
}



}		



///////////////////////////////////////////////////////	
}
	

$opp = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);

   if(!file_exists($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt'))
   {
	   $hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
        fwrite($hu, "1");
        fclose($hu);
   }
   
	$resumeposftpy = file_get_contents($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt');

	
	
	if($sizeftp = @ftp_size($conn_idq, $ftp_q_url))
	{
        if ($sizeftp == -1) {
            echo "\n File $ftp_q_url does not exist or server does not support SIZE";
			sleep(5);
            return;
        }
    }

	
 
// ECHO '~',$sizeftp,"/",$resumeposftpy;
 
 
    echo ' try ';
 
 $chll = 0;
// попытка скачать $ftp_q_url и сохранить в $local_file
if (@ftp_get($conn_idq, $opp, $ftp_q_url, FTP_BINARY, $resumeposftpy)) {
//if (ftp_get($conn_idq, $opp, $ftp_q_url, get_ftp_mode($ftp_q_url), $resumeposftpy)) {	
    //echo "Произведена запись в $opp\n";

$resumeposftp = filesize($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame);		
$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'r+');
fwrite($hu, $resumeposftp);
fclose($hu);
echo "\033[38;5;191m -get- \033[38;5;46m";	

if(empty($il))
$il=1; 
	if(empty($cur_activator))
$cur_activator = 1;


if($cur_activator > 100)
{
	
$file = $cpath."ReCodMod/cache/server_empty_ftp_log.log";	 
if (@ftp_put($conn_idq, $ftp_exp_url, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
			 trigger_error("\n RCM DEBUG:  ПАМЯТЬ ОШИБОК ftp_get $conn_idq, $opp , $ftp_q_url , FTP_BINARY , $resumeposftpy ! $cur_activator ПОПЫТОК => ПЕРЕЗАГРУЗКА МОДА !", E_USER_ERROR);
			
			$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
            $fp = fopen($file, 'w');
            fputs($fp, " ---\n");
            fclose($fp);	
	$cur_activator = 0;
	$il = 0;	
	
$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt", "w+");
fputs($fp, "0");
fclose($fp);

$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($hu, "1");
fclose($hu);


$fp=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_position.txt", "w+");
fputs($fp, "0");
fclose($fp);				
			 require $cpath . 'ReCodMod/functions/null.php'; 		
		
} else {
	trigger_error(" RCM DEBUGGER: [FTP USER]: $ftp_exp_user [FTP PASS]: ".md5($ftp_exp_password)." [FTP IP]: $ftp_exp_ip [FTP URL]: $ftp_exp_url [LOCAL FILE]: $gmlobame");
}  			
			

}

 }
 else
 {
	 
	 if(empty($il))
		 $il = 0;
	 
	 if($il == 5)
	 {
		 if (is_resource($conn_idq))
	    ftp_close($conn_idq);
     }		
	 
   if(empty($il))
      $il=1;
   
   
   if(!empty($il))
   {
	     echo "\033[38;5;1m [ошибка $il] \033[38;5;255m"; 
		 
		 
	      if($il == 10)
		   {
			 trigger_error("\n RCM DEBUG:  Не удалось завершить операцию ftp_get $conn_idq, $opp , $ftp_q_url , FTP_BINARY , $resumeposftpy ! $il ПОПЫТОК ! => ОЖИДАНИЕ", E_USER_ERROR);
           //конец файла
		   if(empty($cur_seek_pos_end))
			   $cur_seek_pos_end = 5;
		   $cur_seek_pos_end = 1;
		   
		   			if(empty($cur_activator))
			   $cur_activator = 5; 
           }	 
		 
	 
	 
	       if($il == 50)
		   {
			 trigger_error("\n RCM DEBUG:  Не удалось завершить операцию ftp_get $conn_idq, $opp , $ftp_q_url , FTP_BINARY , $resumeposftpy ! $il ПОПЫТОК => ОЖИДАНИЕ !", E_USER_ERROR);
		    //конец файла
		     $cur_seek_pos_end = 1;
			 
			if(empty($cur_activator))
			   $cur_activator = 5; 
           }			  
	  
	 
	      if($il > 50000)
		   {	 
	 
			 trigger_error("\n RCM DEBUG:  Не удалось завершить операцию ftp_get $conn_idq, $opp , $ftp_q_url , FTP_BINARY , $resumeposftpy ! $il ПОПЫТОК => ПЕРЕЗАГРУЗКА МОДА !", E_USER_ERROR);
			$cur_seek_pos_end = 3; 
			/*
			$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
            $fp = fopen($file, 'w');
            fputs($fp, " ---\n");
            fclose($fp);
			
			if(empty($cur_seek_pos_end))
			   $cur_seek_pos_end = 5;
			*/
			 require $cpath . 'ReCodMod/functions/null.php'; 	 
	 
		   }
	 
	 
	   ++$il;
	   $cur_activator = $il;
   }
   
       
 }

 
/*
 else {
	trigger_error("\n RCM DEBUG:  Не удалось завершить операцию ftp_get $conn_idq, $opp , $ftp_q_url , FTP_BINARY , $resumeposftpy а так же _pos_ftp.txt", E_USER_ERROR);
    echo "Не удалось завершить операцию\n";
	//require $cpath . 'ReCodMod/functions/null.php';
} 
*/

 







//ftp_close($conn_idq); 

 }

           
}	
else
	//("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу $ftp_server!");
trigger_error("\n RCM DEBUG: Не удалось установить соединение с FTP сервером $ftp_q_ip !", E_USER_ERROR);


           //ftp_close($conn_idq); 

}
}
?>