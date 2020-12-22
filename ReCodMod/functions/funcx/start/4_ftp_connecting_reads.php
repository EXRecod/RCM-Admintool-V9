<?php
   if (strpos($mplogfile, 'ftp:') !== false)
	 {	
 		
if(empty($ftptimerpause)) $ftptimerpause = time();
//ФТП СКОРОСТЬ
if (time() - $ftptimerpause >= 1) {
$ftptimerpause = time();

if(!file_exists($cpath."ReCodMod/cache/server_empty_ftp_log.log"))
{
$filev = hxlog($cpath."ReCodMod/cache/server_empty_ftp_log.log");
$fp = fopen($filev, 'w');
fputs($fp, " ---\n");
}			 
 
echo "\033[38;5;190m -ftp- \033[38;5;46m";
list($ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url,$gmlobame) = explode('%', ftp2locallog($mplogfile));
 
 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////			
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(empty($ftprecon)) $ftprecon = time();
$xftp_time = 300;
if (time() - $ftprecon >= 90){
$ftprecon = time();
$dyq = filemtime($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame);
if (time() - $dyq >= $xftp_time){    
if (@is_resource($conn_idqnew))
    ftp_quit($conn_idqnew);
clearstatcache();
debuglog((__FILE__)."\n * RCM DEBUG: SLEEP GAME LOG: ".$server_ip."_".$server_port." try REconnect AFTER ".$xftp_time." seconds to ftp.");
$conn_idqnew_ftp_connect = 0;}}


if(empty($conn_idqnew_ftp_connect)){		
$conn_idqnew = false;
$ftp_passives = 0;
$conn_idqnew = ftp_connect_check($ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url);
if($conn_idqnew==false)
    $conn_idqnew_ftp_connect = 0;
else
	$conn_idqnew_ftp_connect = 1;
}


if($conn_idqnew==false)
{
 $conn_idqnew = ftp_try_connect($conn_idqnew,$ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url);
 $conn_idqnew_ftp_connect = 0;
 $ftp_passives = 0;
if($conn_idqnew==false)
    $conn_idqnew_ftp_connect = 0;
else
	$conn_idqnew_ftp_connect = 1;
}			
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
else if($conn_idqnew_ftp_connect == 1)
{
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(empty($ftp_passives))
	{
	if($sizeftp = @ftp_size($conn_idqnew, $ftp_q_url))
	{
        if ($sizeftp == -1) {
            echo "\n File $ftp_q_url does not exist or server does not support SIZE";	
	debuglog((__FILE__)." File $ftp_q_url ".$server_ip."_".$server_port." does not exist or server does not support SIZE");
        }
    }
// включение пассивного режима
 if (!ftp_pasv($conn_idqnew, true)) {
            $errmsg = "Passive mode not available at this server";
            //Passive mode not available
	debuglog( "\n RCM DEBUG: ".date('Y-m-d H:i:s'). "  $errmsg - ".$server_ip."_".$server_port." ");
    ftp_pasv($conn_idqnew, false);
        } else $ftp_passives = 1;		
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////			
//////////////////////////////// ГРУЗИМ С ФТП И ЗАПИСЬ ЛОКАЛЬНО //////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

echo ' try ';
$ftp_reader = ftp_write_in_local($conn_idqnew,$ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url);
if($ftp_reader !=false)
{
	echo "\033[38;5;191m -get- \033[38;5;46m";
	//debuglog( "\n Try ftp - ".date('Y-m-d H:i:s'). " - ".$server_ip."_".$server_port." ");
}
else
{
  $conn_idqnew = ftp_try_connect($conn_idqnew,$ftp_q_user,$ftp_q_password,$ftp_q_ip,$ftp_q_url);	
  echo "\033[38;5;1m [ошибка] \033[38;5;255m"; 
 debuglog("\n RCM DEBUG: 4_ftp_connection_reads ".$server_ip."_".$server_port." FTP_BINARY , $resumeposftpy ! => ОЖИДАНИЕ");
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////			
//////////////////////////////// ГРУЗИМ С ФТП И ЗАПИСЬ ЛОКАЛЬНО //////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
if(!file_exists($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame))
{
$fileh = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($fileh, 'w');
fputs($fp, " ---\n");
}

if(empty($ftpcntup))
	$ftpcntup = 0;

if(empty($ftp_fatal_error))
	$ftp_fatal_error = 0;

$xftp_time = 600;
$dyq = filemtime($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame);
if (time() - $dyq >= $xftp_time)
{
	clearstatcache();
	
$filei = $cpath."ReCodMod/cache/server_empty_ftp_log.log"; 
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
  
 if($ftp_fatal_error == 2)
 {
   sleep(1);
   ++$ftpcntup;   
 }   
 
  
$posftpe = ftp_to_upload_ftp($conn_idqnew, $ftp_q_url, $filei, $file);

 if($posftpe != false)
 { 
debuglog((__FILE__)."\n * RCM DEBUG: ".$server_ip."_".$server_port." Обнуление фтп лога. УСПЕХ! ");
if(!empty($conn_idqnew))
{
        if (is_resource($conn_idqnew)) {
            ftp_quit($conn_idqnew);
        } 
}	
$ftp_fatal_error = 1;
$fileh = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($fileh, 'w');
fputs($fp, " ---\n");
	
require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
exit;
 }
 else
 {
debuglog((__FILE__)."\n * ФАТАЛЬНАЯ ОШИБКА: НЕ МОЖЕТ ЗАГРУЗИТЬ НУЛЕВОЙ ФАЙЛ $filei НА ЗАМЕНУ и НЕ ОБНУЛИЛО $file !!! ПРОШЛО $xftp_time СЕКУНД! ".$server_ip."_".$server_port.".");
 $ftp_fatal_error = 2;
 
  
 if($ftpcntup > 10)
	 exit;
 
 }
}

}
  
}
}
?>