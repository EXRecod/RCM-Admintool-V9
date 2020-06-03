<?php
                
     require $cpath . 'ReCodMod/plugins_parser/stats_opt.php';				
				
				
 	if (!empty($db))
     $db = NULL;
	if (!empty($db1))
     $db1 = NULL;
	if (!empty($db2))
     $db2 = null;
	if (!empty($db3))
     $db3 = NULL;
	if (!empty($db4))
     $db4 = NULL;
	if (!empty($db5))
     $db5 = NULL;		  
	if (!empty($stat))	  
     $stat = null;
	if (!empty($dbw3))
     $dbw3  = null;
	if (!empty($dbm3day))
     $dbm3day  = null;
	if (!empty($result))
     $result = null; 
	if (!empty($msqlconnect))
	 $msqlconnect = null;  
	if (!empty($vdbm3day))
     $vdbm3day = null;
	if (!empty($statv))
     $statv = null; 
	if (!empty($re))
     $re = null; 
 	if (!empty($si))
     $si = null; 
 	if (!empty($uo))
     $uo = null; 
 	if (!empty($db3))
     $db3 = null; 
 	if (!empty($dbc))
     $dbc = null;  
 	if (!empty($dbm3))
     $dbm3 = null;
 	if (!empty($st))
     $st = null; 
 	if (!empty($bdd))
     $bdd = null; 
 	if (!empty($rex))
     $rex = null;
 	if (!empty($xl))
     $xl = null; 
 	if (!empty($queryv)) 
     $queryv = null;
 	if (!empty($qc)) 
     $qc = null;
 	if (!empty($resultx)) 
     $resultx = null;
 	if (!empty($statt)) 
     $statt = null; 
 	if (!empty($statsf)) 
     $statsf = null;
 	if (!empty($reponse)) 
     $reponse = null; 
 	if (!empty($vdbw3x)) 
     $vdbw3x = null; 
  	if (!empty($vdbm3dayx)) 
     $vdbm3dayx = null; 
  	if (!empty($res)) 
     $res = null;			
     $login_result = '';     
	 
	 
	// unset($maps_array[''.$map.''][$kills][$deaths][$rounds]);
	
	
	
					
/*					 
if (strpos($mplogfile, 'ftp:') !== false){

list($ftp_exp_user,$ftp_exp_password,$ftp_exp_ip,$ftp_exp_url,$gmlobame) = explode('%', ftp2locallog($mplogfile));
//echo $ftp_exp_user,$ftp_exp_password,$ftp_exp_ip,$ftp_exp_url,$gmlobame;  
//connect
$conn_id = ftp_connect($ftp_exp_ip);

$login_result = ftp_login($conn_id,$ftp_exp_user,$ftp_exp_password);
 
if (!$conn_id || !$login_result)
//("Не удалось установить соединение с FTP сервером!\nПопытка подключения к серверу ftp_server!");
trigger_error("\n RCM DEBUG: Не удалось установить соединение с FTP сервером $ftp_exp_ip !", E_USER_ERROR); 

 
// попытка загрузки файла
if (@ftp_put($conn_id, $ftp_exp_url, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
} else {
	trigger_error(" RCM DEBUGGER: [FTP USER]: $ftp_exp_user [FTP PASS]: ".md5($ftp_exp_password)." [FTP IP]: $ftp_exp_ip [FTP URL]: $ftp_exp_url [LOCAL FILE]: $gmlobame");
}  
 
 
 
// попытка переименовать $olf_file в $new_file
if (@ftp_rename($conn_id, $ftp_exp_url, $ftp_exp_url.'recod')) {
 echo "Файл ".$ftp_exp_url." переименован в ".$ftp_exp_url."recod \n";
 file_put_contents($cpath."ReCodMod/cache/".$server_ip."_".$server_port."_".$gmlobame, null); 
 echo 'NULLED';
 } else { 
	trigger_error(" RCM DEBUGGER: [FTP USER]: $ftp_exp_user [FTP PASS]: ".md5($ftp_exp_password)." [FTP IP]: $ftp_exp_ip [FTP URL]: $ftp_exp_url [LOCAL FILE]: $gmlobame");
} 
 

 
$file = hxlog($cpath."ReCodMod/cache/".$server_ip."_".$server_port.'_'.$gmlobame);
$fp = fopen($file, 'w');
fputs($fp, " ---\n");
fclose($fp); 

 

if (@ftp_put($conn_id, $ftp_exp_url, $file, FTP_BINARY)) {
    echo "\n FILE $file UPLOADED \n";
} else {
	trigger_error(" RCM DEBUGGER: [FTP USER]: $ftp_exp_user [FTP PASS]: ".md5($ftp_exp_password)." [FTP IP]: $ftp_exp_ip [FTP URL]: $ftp_exp_url [LOCAL FILE]: $gmlobame");
}    
 

 
    echo "Could not get file size FTP.\n";
sleep(2); 
 
  
 

// close the connection
// закрытие соединения
  		if (!empty($conn_id)){
			if (is_resource($conn_id)){
           ftp_close($conn_id); 
	}}
 


}
else
{
 if(!empty($mplogfile))
file_put_contents($mplogfile, null);	
}
				
$handlePos=fopen($cpath."ReCodMod/cache/x_cache/".$server_ip."_".$server_port."_pos.txt" ,"w+");
fwrite($handlePos, "1");
fclose($handlePos);

$hu = fopen($cpath.'ReCodMod/cache/x_cache/'.$server_ip.'_'.$server_port.'_pos_ftp.txt', 'w+');
fwrite($hu, "1");
fclose($hu);
 
 
*/ 
 
 
// close the connection
// закрытие соединения
  		if (!empty($conn_id)){
			if (is_resource($conn_id)){
           ftp_close($conn_id); 
	}}
	
  		if (!empty($conn_idq)){
			if (is_resource($conn_idq)){
           ftp_close($conn_idq); 
	}}	
 
 
				exit;
			 
?>
