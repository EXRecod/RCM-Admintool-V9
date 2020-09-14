<?php
if (strpos($parseline, " J;") !== false) {
	
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////	
/////////////////////////////////////////////////////////////////////////////////////////////////

$dircache = $cpath . "ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN";
if (!file_exists($dircache)) {
$geoudir = 'http://z-good.xyz/_geoipbases/IP2PROXY-LITE-PX3.BIN';
$geoudirtwo = 'https://2me.best/_geoipbases/IP2PROXY-LITE-PX3.BIN';
$geoudirthree = 'https://s508man.storage.yandex.net/rdisk/f05441fb2214f8c21b104b02f1e9cb928d006a915c590aaab5b21114041d04c0/5f6006ac/m02cuYpLulmb_0MPatSGofVQPuJoF0LlU44UeDZxQGk3qiBHuuSeOJLt1dYEuTka4UolVBoUHYPdPgLuNkPK6g==?uid=0&filename=IP2PROXY-LITE-PX3.BIN&disposition=attachment&hash=BqINhUJuTae3sI0ATjHIUtrk0lwdFPUo1BHeNbw1L9pnlBZOxV3QaPSDanNMePbaq/J6bpmRyOJonT3VoXnDag%3D%3D&limit=0&content_type=application%2Foctet-stream&owner_uid=220176693&fsize=421536166&hid=63d35159210a10b6f85be04df4268299&media_type=encoded&tknv=v2&rtoken=ri9jzuMzgWUS&force_default=no&ycrid=na-b89da62e5f6fcd6ceedd27f9bae74e1b-downloader14f&ts=5af4efdce0300&s=8ef38e0ceca87a4d05cad6240474eeb8792750d9e4e43d04c5ef5ccc20d17c3d&pb=U2FsdGVkX18GgfWnE9f-SOavOzHENu1UzAbcKZGujyi8PVSQqq3-G_MbygIpFFxQsKCb8wYtaTD2UNcpr5fEPALWMy_fHVlKAmcUZ4sUwKc';
if (!file_exists($dircache)) {
  echo " \n \033[38;5;23m Try to download: P2LOCATION";
  if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
    echo " \n \033[38;5;10m Downloaded: P2LOCATION";
  }
  else {
    echo " \n \033[38;5;1m Do not downloaded: P2LOCATION";
    echo " \n \033[38;5;3m Try another server with download: P2LOCATION";
    if (file_put_contents($dircache, fopen($geoudirtwo, 'r'))) {
      echo " \n \033[38;5;10m Downloaded: P2LOCATION";
    }
  }
 if (!file_exists($dircache))
 {
   if (file_put_contents($dircache, fopen($geoudirthree, 'r'))) {
      echo " \n \033[38;5;10m Downloaded: P2LOCATION";
    }	 
  }
}
if ((filesize($dircache)) != 421536166) {
  echo " \n \033[0;38;5;27m Try to reupload: P2LOCATION";
  if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
    echo " \n \033[38;5;10m Downloaded: P2LOCATION";
  }
  else {
    echo " \n \033[38;5;1m Do not downloaded: P2LOCATION";
    echo " \n \033[38;5;3m Try another server with download: P2LOCATION";
    if (file_put_contents($dircache, fopen($geoudirtwo, 'r'))) {
      echo " \n \033[38;5;10m Downloaded: P2LOCATION";
    }
  }
}
if (!file_exists($dircache)) {
  echo "\033[37;1;1m Failed Download or install P2LOCATION !";
  slowscript("SLEEP 30: Failed Download or install P2LOCATION!");
  sleep(3);
  exit;
}	
}	
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////	
/////////////////////////////////////////////////////////////////////////////////////////////////
if (file_exists($dircache)) {

 list($noon, $guid, $idk, $nickname) = explode(';', $parseline); 	
 $uidd = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));
 
if (strpos($stats_array[$uidd]['ip_adress'], ".") === false){ 
    
	if(!empty($stats_array[$uidd]['ip_adress']))
		$ipfrarray = 0;
}	
else  if(!empty($stats_array[$uidd]['ip_adress']))
    $ipfrarray = $stats_array[$uidd]['ip_adress'];
else
	$ipfrarray = 0;
// else if(!empty($stats_array[$uidd]['ip']))
//	$ipfrarray = $stats_array[$uidd]['ip'];
 
 if (empty($ipfrarray)) {
      if (!empty($stats_array[$uidd]['guid'])) {
        if (strpos($stats_array[$uidd]['guid'], "bot") === false) {
          require $cpath . 'ReCodMod/functions/core/cod_rcon.php';
          foreach ($rconarray as $j => $e) {
            $i_id = $e["num"];
            $i_ping = $e["ping"];
            $i_ip = $e["ip"];
            $i_name = $e["name"];
            $i_guid = $e["guid"];
            if (trim($i_guid) == trim($stats_array[$uidd]['guid'])) {

if(empty($class_ipproxyes)){			
 require $cpath . 'ReCodMod/functions/geoip_bases/iptolocations/class/class.IP2Proxy.php';
 $class_ipproxyes = 1;
}
$db = new \IP2Proxy\Database();
$db->open($cpath . 'ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN', \IP2Proxy\Database::FILE_IO);
$is_Proxy 		= $db->isProxy($i_ip);
$db->close();			
              $guidB = $i_guid;
              $idnumB = $i_id;
              $loadopt = $cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/' . $uidd . '.log';
              if (file_exists(dirname($mplogfile) . '/playerInfo/')) {
                if (strlen($guidB) == 17) $rest = substr($guidB, 9);
                else $rest = substr($guidB, 11);
                if ((int)$rest) {
                  $file = dirname($mplogfile) . '/playerInfo/' . $rest . '.db';
                  if (file_exists($file)) {
                    $lines = file($file);
                    foreach ($lines as $line_num => $line) {
                      $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
                      //status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~
                      if (strpos($line, "kills_id~") !== false) {
                        list($emp, $stat0) = explode("kills_id~", $line);
                        list($k) = explode("~", $stat0);
                      }
                      else $k = 0;
                    }
                  }
                  if ($k < 10) {
					  if(!empty($is_Proxy))
					  {
                    xcon('clientkick ' . $idk . '', '');
                    unset($stats_array[$uidd]);
                    debuglog((__FILE__) . "\n PROXY DETECTED = Kicked = Guid: $guidB Nickname: $i_name NUM: $idk Ping: $i_ping Ip: $i_ip");
					  }
                  }
                }
              }
              else if (!file_exists($loadopt)) //проверка статистики
              {
				  if(!empty($is_Proxy))
					  {
                xcon('clientkick ' . $idk . '', '');
                unset($stats_array[$uidd]);
                debuglog((__FILE__) . "\n PROXY DETECTED = Kicked = Guid: $guid Nickname: $i_name NUM: $idk Ping: $i_ping Ip: $i_ip");
					  }
			    }
            }
          }
        }
      }
 }
 else
 {	 	  
if(empty($class_ipproxyes)){			
 require $cpath . 'ReCodMod/functions/geoip_bases/iptolocations/class/class.IP2Proxy.php';
 $class_ipproxyes = 1;
}
$db = new \IP2Proxy\Database();
$db->open($cpath . 'ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN', \IP2Proxy\Database::FILE_IO);
echo ' Proxy? => ',$is_Proxy 		= $db->isProxy($ipfrarray);
$db->close();	  
				  if(!empty($is_Proxy))
					  {	  
                    xcon('clientkick ' . $idnumB . '', '');
                    unset($stats_array[$uidd]);
                    debuglog((__FILE__) . "\n PROXY DETECTED = Guid: $guid Nickname: $nickname Ip: ".$ipfrarray."");
					  }
 }
}
}
?>