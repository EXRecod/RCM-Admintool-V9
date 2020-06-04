<?php
//.main cfg _settings.ini LOADER
 $config_data = parse_ini_file($cpath . "cfg/_settings.ini", true);
 foreach($config_data as $section => $r)   
 {   foreach($r as $string => $value){
		if(!defined($string))
		define($string, $value);    	
 }}
 //.main cfg _settings.ini LOADER
 
 
/*
	   if(@chmod($cpath . "ReCodMod/cache/", 0777))
	   {
		   echo "CHMOD OK 777 ".$cpath . "ReCodMod/cache/";
		   //echo " : ".substr(sprintf('%o', fileperms($cpath . "ReCodMod/cache/")), -4);
	   }
	   else
	   {
		echo "NOT CHMOD 777 ".$cpath . "ReCodMod/cache/";
        trigger_error("\n RCM DEBUG: [CHMOD 777] ERROR $cpath ReCodMod/cache/ !", E_USER_ERROR); 		
	   }
echo "\n"; 
$dir = opendir($cpath . "ReCodMod/cache/");
while($file = readdir($dir)) {
   if (is_dir($cpath . "ReCodMod/cache/".$file) && $file != '.' && $file != '..') {
       
	   if(@chmod($cpath . "ReCodMod/cache/", 0777))
		   echo "CHMOD OK 777 ".$cpath . "ReCodMod/cache/".$file;
	   else
	   {
		echo " CHMOD 777 error ".$cpath . "ReCodMod/cache/".$file;
        trigger_error("\n RCM DEBUG: [CHMOD 777] ERROR $cpath ReCodMod/cache/$file !", E_USER_ERROR); 		
	   }
	   echo "\n"; 
   }
}
 
 echo "\n\n"; 
*/ 

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
///////////////          BLACK SCREENSHOTS DETECTING PLUGIN
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
$stringip = str_replace(".", "_", $server_ip);
$cron_scan_img = $cpath . 'ReCodMod/cache/screenshots/cron/' . $stringip . '_' . $server_port . '/cron.log';

if(!file_exists($cpath.'ReCodMod/cache/screenshots/'))
          mkdir($cpath.'ReCodMod/cache/screenshots/', 0777, true);			  
if(!file_exists($cpath.'ReCodMod/cache/screenshots/cron/'))
          mkdir($cpath.'ReCodMod/cache/screenshots/cron/', 0777, true);	
if(!file_exists($cpath.'ReCodMod/cache/screenshots/cron/'.$stringip . '_' . $server_port. '/'))
          mkdir($cpath.'ReCodMod/cache/screenshots/cron/'.$stringip . '_' . $server_port. '/', 0777, true);	  
if(!file_exists($cpath.'ReCodMod/cache/screenshots/cached'))
          mkdir($cpath.'ReCodMod/cache/screenshots/cached', 0777, true);	  
if(!file_exists($cpath.'ReCodMod/cache/screenshots/cached/'.$stringip . '_' . $server_port. '/'))
          mkdir($cpath.'ReCodMod/cache/screenshots/cached/'.$stringip . '_' . $server_port. '/', 0777, true);
if(!file_exists($cpath.'ReCodMod/cache/screenshots/cached/black_sreenshots/'.$stringip . '_' . $server_port. '/'))
          mkdir($cpath.'ReCodMod/cache/screenshots/cached/black_sreenshots/'.$stringip . '_' . $server_port. '/', 0777, true);
	  	    
	  
if(!file_exists($cron_scan_img))
          touch($cron_scan_img); 
	  
require_once $cpath . "ReCodMod/functions/core/classes/file_getImageColor.php";	  

  $allplugs = getDirContents($cpath . 'cfg/');
  foreach ($allplugs AS $va) {
    if (strpos($va, '.ini') !== false) {
      $ini_array = parse_ini_file($va, true);
      foreach ($ini_array as $construct => $gq) {
        $a = 0;
        foreach ($gq as $const => $stringq) {
			if(!is_array($stringq))
	{
 if (($const . $stringq) == ("enable1")) {
            if (($construct) == ("black_screenshots")) $a = 1;
          }
          else if ($a == 1) {
			  
if(!extension_loaded('gd'))
{
echo"\n\033[38;5;1m ERROR: GD2 LIBRARY DO NOT exists! Look in logs ReCodMod/cache/x_errors/";
	trigger_error("\n RCM DEBUG:  sudo apt-get install php-gd ", E_USER_ERROR);
sleep(120);	
exit;
}

  }}}}}}


//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
///////////////          BLACK SCREENSHOTS DETECTING PLUGIN
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
	  
 
///////////LOAD CFG'S
echo "\n\033[38;5;100m################################################";
echo "\n \033[38;5;34m         LOAD ENABLED CONFIGURATIONS";                            
$allplugs = getDirContents($cpath . 'cfg/');
foreach ($allplugs AS $va)
  {
  if (strpos($va, '.ini') !== false)
    { 
$ini_array = parse_ini_file($va, true);	
foreach($ini_array as $construct => $gq)
{   
$a = 0;	
foreach($gq as $const => $stringq)
{
	if(!is_array($stringq))
	{
  if(($const.$stringq)==("enable1"))
  {
	echo "\033[38;5;70m";  
	echo "\n[",$construct,"]";
	echo "\033[38;5;65m"; 
	echo "\n",$const,":",$stringq;
	$a = 1;	
  }
  else if($a == 1)
  {
	echo "\n",$const;
    echo ":",$stringq;
  }
	}
 }  
}   
     }
   } 
echo "\n\033[38;5;100m################################################\n\n\n";
///////////LOAD CFG'S

$cur_seek_pos_end = 2;

?>