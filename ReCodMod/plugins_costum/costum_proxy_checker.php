<?php
if (strpos($parseline, "InitGame:") !== false) {
	$typeof1 = ' ? '; $typeof2 = ' ? '; $typeof3 = ' ? ';
    $geoudir      = 'http://z-good.xyz/_geoipbases/IP2PROXY-LITE-PX3.BIN';
    $geoudirtwo   = 'https://2me.best/_geoipbases/IP2PROXY-LITE-PX3.BIN';
    $geoudirthree = 'https://s508man.storage.yandex.net/rdisk/f05441fb2214f8c21b104b02f1e9cb928d006a915c590aaab5b21114041d04c0/5f6006ac/m02cuYpLulmb_0MPatSGofVQPuJoF0LlU44UeDZxQGk3qiBHuuSeOJLt1dYEuTka4UolVBoUHYPdPgLuNkPK6g==?uid=0&filename=IP2PROXY-LITE-PX3.BIN&disposition=attachment&hash=BqINhUJuTae3sI0ATjHIUtrk0lwdFPUo1BHeNbw1L9pnlBZOxV3QaPSDanNMePbaq/J6bpmRyOJonT3VoXnDag%3D%3D&limit=0&content_type=application%2Foctet-stream&owner_uid=220176693&fsize=421536166&hid=63d35159210a10b6f85be04df4268299&media_type=encoded&tknv=v2&rtoken=ri9jzuMzgWUS&force_default=no&ycrid=na-b89da62e5f6fcd6ceedd27f9bae74e1b-downloader14f&ts=5af4efdce0300&s=8ef38e0ceca87a4d05cad6240474eeb8792750d9e4e43d04c5ef5ccc20d17c3d&pb=U2FsdGVkX18GgfWnE9f-SOavOzHENu1UzAbcKZGujyi8PVSQqq3-G_MbygIpFFxQsKCb8wYtaTD2UNcpr5fEPALWMy_fHVlKAmcUZ4sUwKc';
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
    if ((filesize($dircache)) != 421536166) {
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
        if ((filesize($dircache)) != 421536166) {
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
}
if (strpos($parseline, " J;") !== false) {
	$typeof1 = ' ? '; $typeof2 = ' ? '; $typeof3 = ' ? ';
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    $geoudir      = 'http://z-good.xyz/_geoipbases/IP2PROXY-LITE-PX3.BIN';
    $geoudirtwo   = 'https://2me.best/_geoipbases/IP2PROXY-LITE-PX3.BIN';
    $geoudirthree = 'https://s508man.storage.yandex.net/rdisk/f05441fb2214f8c21b104b02f1e9cb928d006a915c590aaab5b21114041d04c0/5f6006ac/m02cuYpLulmb_0MPatSGofVQPuJoF0LlU44UeDZxQGk3qiBHuuSeOJLt1dYEuTka4UolVBoUHYPdPgLuNkPK6g==?uid=0&filename=IP2PROXY-LITE-PX3.BIN&disposition=attachment&hash=BqINhUJuTae3sI0ATjHIUtrk0lwdFPUo1BHeNbw1L9pnlBZOxV3QaPSDanNMePbaq/J6bpmRyOJonT3VoXnDag%3D%3D&limit=0&content_type=application%2Foctet-stream&owner_uid=220176693&fsize=421536166&hid=63d35159210a10b6f85be04df4268299&media_type=encoded&tknv=v2&rtoken=ri9jzuMzgWUS&force_default=no&ycrid=na-b89da62e5f6fcd6ceedd27f9bae74e1b-downloader14f&ts=5af4efdce0300&s=8ef38e0ceca87a4d05cad6240474eeb8792750d9e4e43d04c5ef5ccc20d17c3d&pb=U2FsdGVkX18GgfWnE9f-SOavOzHENu1UzAbcKZGujyi8PVSQqq3-G_MbygIpFFxQsKCb8wYtaTD2UNcpr5fEPALWMy_fHVlKAmcUZ4sUwKc';
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
    if ((filesize($dircache)) != 421536166) {
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
        if ((filesize($dircache)) != 421536166) {
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
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    if (file_exists($dircache)) {
        list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
        $uidd = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));
        /* 
        if (strpos($stats_array[$uidd]['ip_adress'], ".") === false){ 
        
        if(!empty($stats_array[$uidd]['ip_adress']))
        $ipfrarray = 0;
        }    
        else */
        if (!empty($stats_array[$uidd]['ip_adress']))
            $ipfrarray = $stats_array[$uidd]['ip_adress'];
        else
            $ipfrarray = 0;
        if (empty($ipfrarray)) {
            if (!empty($stats_array[$uidd]['guid'])) {
                if (strpos($stats_array[$uidd]['guid'], "bot") === false) {
                    require $cpath . 'ReCodMod/functions/core/cod_rcon.php';
                    foreach ($rconarray as $j => $e) {
                        $i_id   = $e["num"];
                        $i_ping = $e["ping"];
                        $i_ip   = $e["ip"];
                        $i_name = $e["name"];
                        $i_guid = $e["guid"];
                        if (trim($i_guid) == trim($stats_array[$uidd]['guid'])) {
                            if (empty($class_ipproxyes)) {
                                require $cpath . 'ReCodMod/functions/geoip_bases/iptolocations/class/class.IP2Proxy.php';
                                $class_ipproxyes = 1;
                            }
                            $db = new \IP2Proxy\Database();
                            $db->open($cpath . 'ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN', \IP2Proxy\Database::FILE_IO);
                            $is_Proxy = $db->isProxy($i_ip);
                            $db->close();
                            $guidB   = $i_guid;
                            $idnumB  = $i_id;
                            $loadopt = $cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/' . $uidd . '.log';
                            if (file_exists(dirname($mplogfile) . '/playerInfo/')) {
                                if (strlen($guidB) == 17)
                                    $rest = substr($guidB, 9);
                                else
                                    $rest = substr($guidB, 11);
                                if ((int) $rest) {
                                    $file = dirname($mplogfile) . '/playerInfo/' . $rest . '.db';
                                    if (file_exists($file)) {
                                        $lines = file($file);
                                        foreach ($lines as $line_num => $line) {
                                            $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
                                            //status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~
                                            if (strpos($line, "kills_id~") !== false) {
                                                list($emp, $stat0) = explode("kills_id~", $line);
                                                list($k) = explode("~", $stat0);
                                            } else
                                                $k = 0;
                                        }
                                    }
                                    if ($k < 10) {
                                        if (!empty($is_Proxy)) {
                                            xcon('clientkick ' . $idk . ' ^1PROXY/VPN fraud.', '');
                                            unset($stats_array[$uidd]);
                                            debuglog((__FILE__) . "\n PROXY DETECTED = Kicked = Guid: $guidB Nickname: $i_name NUM: $idk Ping: $i_ping Ip: $i_ip");
                                        }
                                    }
                                }
                            } else if (!file_exists($loadopt)) //проверка статистики
                                {
                                if (!empty($is_Proxy)) {
                                    xcon('clientkick ' . $idk . ' ^1PROXY/VPN fraud.', '');
                                    unset($stats_array[$uidd]);
                                    debuglog((__FILE__) . "\n PROXY DETECTED = Kicked = Guid: $guid Nickname: $i_name NUM: $idk Ping: $i_ping Ip: $i_ip");
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $loadopt = $cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/' . $uidd . '.log';
            if (file_exists(dirname($mplogfile) . '/playerInfo/')) {
                if (strlen($guid) == 17)
                    $rest = substr($guid, 9);
                else
                    $rest = substr($guid, 11);
                if ((int) $rest) {
                    $file = dirname($mplogfile) . '/playerInfo/' . $rest . '.db';
                    if (file_exists($file)) {
                        $lines = file($file);
                        foreach ($lines as $line_num => $line) {
                            $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
                            //status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~
                            if (strpos($line, "kills_id~") !== false) {
                                list($emp, $stat0) = explode("kills_id~", $line);
                                list($k) = explode("~", $stat0);
                            } else
                                $k = 0;
                        }
                    }
                    if ($k < 1000) {
                        if (!empty($is_Proxy)) {
                            xcon('clientkick ' . $idk . ' ^1PROXY/VPN fraud.', '');
                            unset($stats_array[$uidd]);
                            debuglog((__FILE__) . "\n PROXY DETECTED = Kicked = Guid: $guid Nickname: $nickname NUM: $idk Ip: " . $stats_array[$uidd]['ip_adress'] . "");
                        }
                        if ($k < 2) {
							
                            if (empty($is_Proxy)) {
                                // Your API Key.
                                $key                        = '2hICusSXSeZMEg8GIQ80vUrcYpJp0BqS';
                                $ip                         = $stats_array[$uidd]['ip_adress']; ///isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : $_SERVER['HTTP_CLIENT_IP'];
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
                                $url                        = sprintf('https://www.ipqualityscore.com/api/json/ip/%s/%s?%s', $key, $ip, $formatted_parameters);
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
                                        echo 'proxy - ', $typeof1 = $result['proxy'];
                                    }
                                    if ($result['vpn'] === true) {
                                        echo 'vpn - ', $typeof2 = $result['vpn'];
                                    }
                                    if ($result['tor'] === true) {
                                        echo 'tor - ', $typeof3 = $result['tor'];
                                    }
                                    echo 'fraud: ', $typeof_fraud_score = $result['fraud_score'];
                                    if ((($typeof_fraud_score > 50) && ((!empty($typeof1)) && (!empty($typeof2)))) || (($typeof_fraud_score > 50) && ((empty($typeof1)) && (!empty($typeof2)))) || (($typeof_fraud_score > 50) && ((!empty($typeof1)) && (empty($typeof2)))))
                                        xcon('clientkick ' . $idk . ' ^1PROXY/VPN fraud.', '');
                                    unset($stats_array[$uidd]);
                                    debuglog((__FILE__) . "\n PROXY $typeof1 % / VPN=$typeof2 TOR=$typeof3 FRAUD=$typeof_fraud_score % DETECTED = Kicked = Guid: $guid Nickname: $nickname NUM: $idk Ip: " . $stats_array[$uidd]['ip_adress'] . "");
                                }
                            }
							
                        }
                    }
                }
            }
            if (empty($class_ipproxyes)) {
                require $cpath . 'ReCodMod/functions/geoip_bases/iptolocations/class/class.IP2Proxy.php';
                $class_ipproxyes = 1;
            }
            $db = new \IP2Proxy\Database();
            $db->open($cpath . 'ReCodMod/functions/geoip_bases/iptolocations/IP2PROXY-LITE-PX3.BIN', \IP2Proxy\Database::FILE_IO);
            echo ' Proxy? => ', $is_Proxy = $db->isProxy($ipfrarray);
            $db->close();
            if (!empty($is_Proxy)) {
                //xcon('clientkick ' . $idnumB . '', '');
                unset($stats_array[$uidd]);
                debuglog((__FILE__) . "\n PROXY DETECTED = Guid: $guid Nickname: $nickname Ip: " . $ipfrarray . "");
            }
        }
    }
}
?>