<?php
if ((strpos($parseline, " J;") !== false)||((strpos($parseline, 'IP;') !== false)&&(strpos($parseline, '<=>') !== false))) {
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////  Прокси, впн, тор кикер по самым свежым базам (кик игрока без статистики)  //////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 	
	$proxy_analyze =    1;  // 0 - отключение  1 - включить проверку игроков по прокси базам
	$proxy_kick    =    0;  // 0 - отключение  1 - kick игроков если оказались прокси
    // Your API Key. https://www.ipqualityscore.com/
    $keyproxy      = 't9GGncPe1zfqFP6ZEtLeyRW0Qx0feV1G';
	//https://2me.best/_geoipbases/IP2PROXY-LITE-PX3.BIN  for auto upload
	$sizeproxydb   = '330198350'; 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
//////////////////////////                           База всемирной поутины прокси                          //////////////////////////////// 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if (!empty($proxy_analyze)) {
	 
    $geoudir      = 'http://z-good.xyz/_geoipbases/IP2PROXY-LITE-PX3.BIN';
    $geoudirtwo   = 'https://2me.best/_geoipbases/IP2PROXY-LITE-PX3.BIN';
    $geoudirthree = 'https://s508man.storage.yandex.net/rdisk/f05441fb2214f8c21b104b02f1e9cb928d006a915c590aaab5b21114041d04c0/5f6006ac/m02cuYpLulmb_0MPatSGofVQPuJoF0LlU44UeDZxQGk3qiBHuuSeOJLt1dYEuTka4UolVBoUHYPdPgLuNkPK6g==?uid=0&filename=IP2PROXY-LITE-PX3.BIN&disposition=attachment&hash=BqINhUJuTae3sI0ATjHIUtrk0lwdFPUo1BHeNbw1L9pnlBZOxV3QaPSDanNMePbaq/J6bpmRyOJonT3VoXnDag%3D%3D&limit=0&content_type=application%2Foctet-stream&owner_uid=220176693&fsize=330198350&hid=63d35159210a10b6f85be04df4268299&media_type=encoded&tknv=v2&rtoken=ri9jzuMzgWUS&force_default=no&ycrid=na-b89da62e5f6fcd6ceedd27f9bae74e1b-downloader14f&ts=5af4efdce0300&s=8ef38e0ceca87a4d05cad6240474eeb8792750d9e4e43d04c5ef5ccc20d17c3d&pb=U2FsdGVkX18GgfWnE9f-SOavOzHENu1UzAbcKZGujyi8PVSQqq3-G_MbygIpFFxQsKCb8wYtaTD2UNcpr5fEPALWMy_fHVlKAmcUZ4sUwKc';
    $dircache     = $cpath . "ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN";
    if (!file_exists($dircache)) {
        echo " \n \033[38;5;23m Try to download: P2LOCATION";
        if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
            echo " \n \033[38;5;10m Downloaded: P2LOCATION";
        } else {
            echo " \n \033[38;5;1m Do not downloaded: P2LOCATION";
            echo " \n \033[38;5;3m Try another server with download: P2LOCATION";
            if (file_put_contents($dircache, fopen($geoudirtwo, 'r'))) {
                echo " \n \033[38;5;10m Downloaded: P2LOCATION";
            }
        }
        if (!file_exists($dircache)) {
            if (file_put_contents($dircache, fopen($geoudirthree, 'r'))) {
                echo " \n \033[38;5;10m Downloaded: P2LOCATION";
            }
        }
    }
    if ((filesize($dircache)) != 330198350) {
        echo " \n \033[0;38;5;27m Try to reupload: P2LOCATION";
        if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
            echo " \n \033[38;5;10m Downloaded: P2LOCATION";
        } else {
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
    } else {
        if ((filesize($dircache)) != 330198350) {
            echo " \n \033[0;38;5;27m Try to reupload: P2LOCATION";
            if (file_put_contents($dircache, fopen($geoudir, 'r'))) {
                echo " \n \033[38;5;10m Downloaded: P2LOCATION";
            } else {
                echo " \n \033[38;5;1m Do not downloaded: P2LOCATION";
                echo " \n \033[38;5;3m Try another server with download: P2LOCATION";
                if (file_put_contents($dircache, fopen($geoudirtwo, 'r'))) {
                    echo " \n \033[38;5;10m Downloaded: P2LOCATION";
                }
            }
        }
    }
	
$ipadddr = '';
if ((strpos($parseline, 'IP;') !== false)&&(strpos($parseline, '<=>') !== false))
{
  list($noon, $guid, $cod4xip, $idk, $nickname) = explode(';', $parseline);
  list($ipadddr) = explode(':', $cod4xip);
}
else
  list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
  /////////////////////////////////////
  $IniFileName = 'bans_list_sql_ip_adress';
  /////////////////////////////////////
    $ipadrx = 0;
    $kills = 0;
    $kills_ip = 0;
	$sqlthree = '';
	$proxylist = 0;
    $ry = '';
    if (!empty($guid)) {
      if (strpos($guid, 'bot') === false) {

        $conisq = trim($server_port . $guid);
        $conisq = dbGuid(4) . (abs(hexdec(crc32($conisq))));

if(!empty($ipadddr))
{	
  if(empty($stats_array[$conisq]['ip_adress']))
  {
	  $stats_array[$conisq]['ip_adress'] = $ipadddr;
	  $ipadrx = $ipadddr;
  }
}
else
	 $ipadrx = $stats_array[$conisq]['ip_adress'];
 
 
 if (empty($ipadrx)) {
 $rconExplode = rconExplode($guid);
if(!empty($rconExplode))
{
list($i_pingо,$ipadrx,$i_nameо,$i_guidо,$xxccodeо,$cityо,$countryо) = explode(';', $rconExplode);
 }}
 
if (empty($proxylist)) {
		if (!empty($ipadrx)) {
 $dircache     = $cpath . "ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN";				
    if (file_exists($dircache)) {                            
                  
            if (empty($class_ipproxyes)) {
                require $cpath . 'ReCodMod/functions/geoip_bases/iptolocations/class/class.IP2Proxy.php';
                $class_ipproxyes = 1;
            }
            $db = new \IP2Proxy\Database();
            $db->open($cpath . 'ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN', \IP2Proxy\Database::FILE_IO);
            echo ' Proxy? => ', $is_Proxy = $db->isProxy($ipadrx);
            $db->close();
            if (!empty($is_Proxy)) {
				$proxylist = 1;
				if(!empty($proxy_kick))
                xcon('clientkick ' . $idk . ' PROXY OFF!', '');
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$nickname."','".$ipadrx."','".$ipadrx."','".$guid."','PROXY FRAUD:IP2L','".date("Y.m.d H:i:s")."', '".date("Y.m.d H:i:s")."', '1','Recod','cod4 1.8')";
$r = dbInsert('', $re);
                    //if (!$r) {
                    //  errorspdo('[' . $datetime . '] 408  ' . __FILE__ . '  Exception : ' . $re);
                    //}
                debuglog((__FILE__) . "\n PROXY DETECTED = Guid: $guid Nickname: $nickname Ip: " . $ipadrx . "");
            }
        }
		}
}
        if (strlen($guid) == 17) $rest = substr($guid, 9);
        else $rest = substr($guid, 11);

        if ((int)$rest) {
          $file = dirname($mplogfile) . '/playerInfo/' . $rest . '.db';
          if (file_exists($file)) {
            $lines = file($file);
            foreach ($lines as $line_num => $line) {
              $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
              //status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~
              if (strpos($line, "kills_id~") !== false) {
                list($emp, $stat0) = explode("kills_id~", $line);
                list($kills) = explode("~", $stat0);
              }
              else $kills = 0;
              if (strpos($line, "deaths_id~") !== false) {
                list($emp, $dth0) = explode("deaths_id~", $line);
                list($deaths) = explode("~", $dth0);
              }
              else $deaths = 0;
            }
          }
        }

        if (empty($kills)) {
		 $sqlone = 'select s_pg,s_kills,s_deaths from db_stats_1 WHERE s_pg = ' . $conisq . ' and s_kills>=1  and s_deaths>=1 limit 1';
          $xx = dbLazy('', $sqlone);
          if (is_object($xx)) foreach ($xx as $keym => $value) {
            if ($keym == 's_kills') $kills = $value;
            else if ($keym == 's_deaths') $deaths = $value;
          }
        }

        if (empty($kills)) {
		
          if (!empty($ipadrx)) {
			  
			  list($onem, $twom, $threem, $fourm) = explode(".", $ipadrx);
              $rangeip = $onem.'.'.$twom;
			  
			  $sqlthree = "select guid,ip,iprange,reason from banip WHERE ip = '" . $rangeip . "' and reason = 'IP RANGE BAN' limit 1";
              $xx = dbLazy('', $sqlthree);
              if (is_object($xx)) foreach ($xx as $keym => $value) {
                if ($keym == 'ip') $kills_ip = $value;
              }				  
			  
			if (empty($kills_ip)) {  
			  $sqltwo = "select guid,ip,iprange,reason from banip WHERE ip = '" . $ipadrx . "' and reason = 'IP BAN' limit 1";
              $xx = dbLazy('', $sqltwo);
              if (is_object($xx)) foreach ($xx as $keym => $value) {
                if ($keym == 'ip') $kills_ip = $value;
              }
			} 
			  
		  
			

              if (!empty($kills_ip)) {  
                echo 'kicked';
                xcon('clientkick ' . $idk . ' BAN', '');
                xcon('clientkick ' . $idk, '');
                AddToLog("[" . $datetime . "] IP MySQL BAN KICK: (" . $idk . ") (" . $ipadrx . ") (" . $nickname . ")");
				debuglog(" [ $datetime ] " . (__FILE__) ." GUID: [$guid]  NickName: [$nickname] IP: ".$ipadrx." Kills: [$kills]  kills_ip: [$kills_ip] Sql one: [$sqlone]  sql two: [$sqltwo] and $sqlthree \n\n");
                ++$x_loopsv; //continue;		
            }
          }
//////////////////////////////////////////////////////////////////////////////////////				
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
  
if($proxylist == 0)
{	
if (empty($kills_ip)) {
	if (!empty($ipadrx)) {
	$typeof1 = ''; $typeof2 = ''; $typeof3 = '';

                            if (empty($is_Proxy)) {
                                // Retrieve additional (optional) data points which help us enhance fraud scores.
                                // Set the strictness for this query. (0 (least strict) - 3 (most strict))
                                $strictness                 = 1;
                                // You may want to allow public access points like coffee shops, schools, corporations, etc...
                                $allow_public_access_points = 'true';
                                // Reduce scoring penalties for mixed quality IP addresses shared by good and bad users.
                                $lighter_penalties          = 'false';
                                // Create parameters array.
                                $parameters                 = array(
                                    'user_language' => 'ru',
                                    'strictness' => $strictness,
                                    'allow_public_access_points' => $allow_public_access_points,
                                    'lighter_penalties' => $lighter_penalties
                                );
                                /* User & Transaction Scoring
                                 * Score additional information from a user, order, or transaction for risk analysis
                                 * Please see the documentation and example code to include this feature in your scoring:
                                 * https://www.ipqualityscore.com/documentation/proxy-detection/transaction-scoring
                                 * This feature requires a Premium plan or greater
                                 */
                                // Format Parameters
                                $formatted_parameters       = http_build_query($parameters);
                                // Create API URL
                                $url                        = sprintf('https://www.ipqualityscore.com/api/json/ip/%s/%s?%s', $keyproxy, $ipadrx, $formatted_parameters);
                                // Fetch The Result
                                $timeout                    = 5;
                                $curl                       = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($curl, CURLOPT_POST, true);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
                                $json = curl_exec($curl);
                                curl_close($curl);
                                // Decode the result into an array.
                                $result = json_decode($json, true);
                                // Check to see if our query was successful.
                                if (isset($result['success']) && $result['success'] === true) {
                                    if ($result['proxy'] === true) {
                                        echo 'PROXY - ', $typeof1 = $result['proxy'];
										$ry = 'PROXY';
                                    }
                                    if ($result['vpn'] === true) {
                                        echo 'VPN - ', $typeof2 = $result['vpn'];
										$ry = 'VPN';
                                    }
                                    if ($result['tor'] === true) {
                                        echo 'TOR - ', $typeof3 = $result['tor'];
										$ry = 'TOR';
                                    }
                                    echo 'fraud: ', $typeof_fraud_score = $result['fraud_score'];
                                    if ((($typeof_fraud_score > 50) && ((!empty($typeof1)) && (!empty($typeof2)))) 
										|| (($typeof_fraud_score > 48) && ((empty($typeof1)) && (!empty($typeof2)))) 
									|| (($typeof_fraud_score > 49) && ((!empty($typeof1)) && (empty($typeof2)))))
									{
				if(!empty($proxy_kick))
                xcon('clientkick ' . $idk . ' PROXY OFF!', '');
$re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('".$nickname."','".$ipadrx."','".$ipadrx."','".$guid."','".$ry." FRAUD:".$typeof_fraud_score."','".date("Y.m.d H:i:s")."', '".date("Y.m.d H:i:s")."', '1','Recod','cod4 1.8')";
$r = dbInsert('', $re);
                    //if (!$r) {
                    //  errorspdo('[' . $datetime . '] 409  ' . __FILE__ . '  Exception : ' . $re);
                    //}										
                                    debuglog((__FILE__) . "\n PROXY $typeof1 % / VPN=$typeof2 TOR=$typeof3 FRAUD=$typeof_fraud_score % DETECTED = Kicked = Guid: $guid Nickname: $nickname NUM: $idk Ip: " . $ipadrx . "");
                                }
								}
    }
}}		
}
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////				
//////////////////////////////////////////////////////////////////////////////////////
        }
    }
  }
}
}
?>