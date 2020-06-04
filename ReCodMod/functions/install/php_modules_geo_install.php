<?php
echo " \n \033[38;5;11m";
$dircache = $cpath."win_cache_ms/"; 
if(is_dir($dircache))
{
 $dircache = $cpath."php/php.ini";
if(!file_exists($dircache))
{		
if (!copy($cpath.'ReCodMod/functions/install/php.ini', $cpath.'php/php.ini')) 
	echo " \n \033[37;1;41m  <<< NO COPY ".$cpath."ReCodMod/functions/install/php.ini ... ! >>>   \n\n"; //red
else
	echo " \n \033[38;5;15m  <<< COPY SUCCESS TO ".$cpath."php/php.ini ... ! >>>   \n"; //	
}} 

$dircache = $cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat";
$geoudir = 'https://github.com/EXRecod/RCM-Admintool-V5/raw/master/RCM/ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat';
$geoudirtwo = 'http://xxxreal.ru/GeoLiteCity.dat';

if (!file_exists($dircache)) {
    echo " \n \033[38;5;23m Try to download: GeoLiteCity.dat";
    if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
        echo " \n \033[38;5;10m Downloaded: GeoLiteCity.dat";
    } else {echo " \n \033[38;5;1m Do not downloaded: GeoLiteCity.dat";
	echo " \n \033[38;5;3m Try another server with download: GeoLiteCity.dat";
	if (file_put_contents($dircache, fopen($geoudirtwo, 'r'))) {
        echo " \n \033[38;5;10m Downloaded: GeoLiteCity.dat";
    }}
} else if ((filesize($dircache)) != 20539238) {
    echo " \n \033[0;38;5;27m Try to reupload: GeoLiteCity.dat";
    if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
        echo " \n \033[38;5;10m Downloaded: GeoLiteCity.dat";
    } else{echo " \n \033[38;5;1m Do not downloaded: GeoLiteCity.dat";
	echo " \n \033[38;5;3m Try another server with download: GeoLiteCity.dat";
	if (file_put_contents($dircache, fopen($geoudirtwo, 'r'))) {
        echo " \n \033[38;5;10m Downloaded: GeoLiteCity.dat";
    }}}

if(!file_exists($dircache))
{
	echo "\033[37;1;1m Failed Download or install GeoLiteCity.dat !";
	slowscript("SLEEP 30: Failed Download or install GeoLiteCity.dat!");
	sleep(30);
	exit;
}


$dircache = $cpath."win_cache_ms/"; 
if(!is_dir($dircache))
{
$key = array_search('mbstring', get_loaded_extensions());
$valid_id = 0;
if($key == 0){
	sleep (5);
	slowscript("SLEEP 5: Please install mbString!");
	die("\n\r Please install mbString! [ sudo apt-get install php7.0-mbstring ]");
}
	 if(!empty(SQLite3::version())){
      $version = SQLite3::version();
	  $arr['description'] = 'SQLite 3';    
      $arr['version'] = $version['versionString'];
	  
	      if(empty($arr['version'])){
			sleep (5); 
          slowscript("SLEEP 5: Please install SQLITE!");			
		  die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite ]");
		  }
	  
	  	  if(empty($arr['version'])){
			  sleep (5);
		  slowscript("SLEEP 5: Please install SQLITE3!");  
		  die("\n\r Please install SQLITE3! [ sudo apt-get install php7.0-sqlite3 ]");
		  }
     }
       if (stripos(curl_version()['version'], "version") !== false) { 
       if (!curl_version()['features'] & CURL_VERSION_KERBEROS4) {
		   sleep (5);
          die("\n\r CURL is not available!. [ sudo apt-get install php7.0-curl ] ");	
                     }}	

 if(ini_get("register_argc_argv")) {
    echo "\n\r register_argc_argv is set! :)";
  } else {
	  sleep (5);
	slowscript("SLEEP 5: Please install register_argc_argv!");  
    die ("\n\r It isn't set!  register_argc_argv  in php.ini");
    usleep(9999999);
  }
} 