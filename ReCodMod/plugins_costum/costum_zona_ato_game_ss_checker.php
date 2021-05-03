<?php
if (ActionIs('SS', $parseline)) {
    if (empty($zona_ato_ss_checker)) {
        $zona_ato_ss_checker = 1;
        $config_data = parse_ini_file($cpath . "cfg/costum_zona_ato_ss_checker.ini", true);
        foreach ($config_data as $section => $r) {
            foreach ($r as $string => $value) {
                if (!defined($string)) define($string, $value);
            }
        }
    }
    if (!empty(zona_ato_ss_checker)) {
        list($empty, $guid) = explode(';', $parseline); //list($empty, $guid, $nickname) = explode(';', $parseline);


        if (!empty($guid)) {

            $systime = time();

            if (strlen($guid) == 17) $rest = substr($guid, 9); else $rest = substr($guid, 11);

            if (empty($ssplayer[$rest]['guid'])) {
                $ssplayer[$rest]['guid'] = $guid;
                $ssplayer[$rest]['time'] = $systime;
            }

            if (empty($sstimer))
                $sstimer = $systime;

            if ($systime - $sstimer >= 30) {
                $sstimer = $systime;
                $timeout = 1;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, zona_ato_ss_checker_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
                $content = curl_exec($curl);
                curl_close($curl);

                if (!empty(dbwork(screenshots_sqldblite, "SELECT * FROM screens WHERE guid = $guid LIMIT 1"))) {
                    unset($ssplayer[$rest]['time']);
                    unset($ssplayer[$rest]['guid']);
                }
            }
            slowscript(__FILE__);
        }
    }

}
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif (ActionIs('K', $parseline)) {
    if (empty($zona_ato_ss_checker)) {
        $zona_ato_ss_checker = 1;
        $config_data = parse_ini_file($cpath . "cfg/costum_zona_ato_ss_checker.ini", true);
        foreach ($config_data as $section => $r) {
            foreach ($r as $string => $value) {
                if (!defined($string)) define($string, $value);
            }
        }
    }
    if (!empty(zona_ato_ss_checker)) {

        $systime = time();

/////////////////////////////////////////////////////////////////////////////
        if (empty($sstimer)) $sstimer = $systime;
        if (!empty($ssplayer)) {
            foreach ($ssplayer as $f => $g) {
                foreach ($g as $s => $r) {
                    if ($s == 'time') {
                        if ($systime - $ssplayer[$f]['time'] >= 60) {

                            if ($systime - $sstimer >= 20) {
                                $sstimer = $systime;
                                $timeout = 1;
                                $curl = curl_init();
                                curl_setopt($curl, CURLOPT_URL, zona_ato_ss_checker_url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($curl, CURLOPT_POST, true);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
                                $content = curl_exec($curl);
                                curl_close($curl);

                                if (!empty(dbwork(screenshots_sqldblite, "SELECT * FROM screens WHERE guid = " . $ssplayer[$f]['guid'] . " LIMIT 1"))) {
                                    unset($ssplayer[$f]['time']);
                                    unset($ssplayer[$f]['guid']);
                                }
                            }
                        }
                        if ((!empty($ssplayer[$f]['time'])) && (!empty($ssplayer[$f]['time']))) {

                            if (!empty($ssplayer[$f]['guid'])) {
                                if ($systime - $ssplayer[$f]['time'] >= 60 * 14) {

                                    if (empty(dbwork(screenshots_sqldblite, "SELECT * FROM screens WHERE guid = " . $ssplayer[$f]['guid'] . " LIMIT 1"))) {
//xcon('permban ' . $ssplayer[$f]['guid'] . ' ^1SS Cheater!', '');
                                        $conisq = trim($server_port . $ssplayer[$f]['guid']);
                                        $conisq = dbGuid(4) . (abs(hexdec(crc32($conisq))));

                                        if (!empty($stats_array[$conisq]['ip_adress'])) {
                                            $ipadrx = $stats_array[$conisq]['ip_adress'];
                                        } else
                                            $ipadrx = '';


                                        if (!empty($ssplayer[$f]['guid'])) {

                                            $tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +5 year'));
                                            $tmk = str_replace("-", ".", $tmk);
//$nicknamedata = pChar_preg_match($death_player_name,$ssplayer[$f]['guid']);
                                            $re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('" . $ssplayer[$f]['guid'] . "','" . $ipadrx . "','" . $ipadrx . "-','" . $ssplayer[$f]['guid'] . "','screens','" . date("Y.m.d H:i:s") . "', '" . $tmk . "', '1','SS','1')
ON DUPLICATE KEY UPDATE ip='" . $ipadrx . "', time='" . date("Y.m.d H:i:s") . "', patch=patch+1";
                                            $r = dbInsert('', $re);
                                        }

//debuglog((__FILE__)."TEST *** SS Cheater? $guid : $server_ip:$server_port \n\n");
                                        unset($ssplayer[$f]['time']);
                                        unset($ssplayer[$f]['guid']);


                                    } else {
                                        if (!empty($ssplayer[$f]['time']))
                                            unset($ssplayer[$f]['time']);
                                        if (!empty($ssplayer[$f]['guid']))
                                            unset($ssplayer[$f]['guid']);
                                    }
                                }
                                if (!empty($ssplayer[$f]['time'])) {
                                    if ($systime - $ssplayer[$f]['time'] >= 60 * 40) {
                                        debuglog((__FILE__) . "TEST *** SS Cheater? " . $ssplayer[$f]['guid'] . " : $server_ip:$server_port \n\n");
                                        if (!empty($ssplayer[$f]['time']))
                                            unset($ssplayer[$f]['time']);
                                        if (!empty($ssplayer[$f]['guid']))
                                            unset($ssplayer[$f]['guid']);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////
?>