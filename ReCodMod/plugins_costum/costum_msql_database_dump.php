<?php
if (strpos($parseline, " ExitLevel:") !== false){if (!empty($Msql_support)) {if (strpos($mplogfile, 'ftp:') === false){	
/*  """""""""""""""""            BD DUMP   $indays через сколько дней дамп       """""""""""""""""   */
               
 $indays = 30; 
 
/*  """""""""""""""""            BD DUMP   ЗАПИСЬ ИДЕТ В .GZ ФОРМАТЕ             """""""""""""""""   */
   
  	
	$dumpbd = $cpath.'ReCodMod/databases/msql_dump/'; 
	 
	 if (!file_exists($dumpbd))
	 {	 
 $datedayup = date('H');
 if(($datedayup == '02')||($datedayup == '2')||($datedayup == '3'))
   {   
  mkdir($cpath.'ReCodMod/databases/msql_dump/', 0777, true);
	   $dumpbd = $dumpbd."archive_database.sql.gz";
	        shell_exec("mysqldump -u $db_user -p $db_pass $db_name | gzip > $dumpbd");
   }}
	 else
	 {
    
 $files = glob( $dumpbd.'*.*' ); 
 $exclude_files = array('.', '..'); 
 if (!in_array($files, $exclude_files)) 
 { 
array_multisort( array_map( 'filemtime', $files ), SORT_NUMERIC, SORT_DESC, $files ); 
} echo $files[0];   
   
 if (strpos($files[0], "archive_database") !== false){  
	$datedayup = date('H');
 if(($datedayup == '02')||($datedayup == '2')||($datedayup == '3'))
   {  $now   = time();
      if ($now - filemtime($files[0]) >= 60*24*60*$indays){
  $datetimeNEW                        = date('Y_m_d_H_i_s');
  $dumpbd = $dumpbd.'archive_database_'.$datetimeNEW.'.sql.gz';		   
  shell_exec("mysqldump -u $db_user -p $db_pass $db_name | gzip > $dumpbd");
  
}}}}}}}
?>