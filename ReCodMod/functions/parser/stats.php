<?php

if(!empty($block_stats)){
             //Обновление статистики *Начало
            $activate_opt = 1;
            require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
            //Обновление статистики *Конец
			
}
else
{

///////////////error fix
$counttdot = substr_count($parseline, ';');
if ($counttdot < 12) $da = 10; else $da = 0;
///////////////error fix
if ($da == 0) {
    if (ActionIs('D', $parseline)) {	
        $parselinetxt = delxkll($parseline);
        $shy = 0;
        $dtshid = 0;
        list($vv1, $death_player_guid, $idnumb, $vv4, $death_player_name, $player_killer_guid, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parselinetxt);
        if (!empty($player_killer_guid)) {
            $outdmg = 0;
            if ((strpos($byweapon, 'helicopter_') !== false) || (strpos($byweapon, 'hind_ffar') !== false) || (strpos($byweapon, 'ac130_') !== false) || (strpos($byweapon, 'airstrike_') !== false) || (strpos($byweapon, 'cobra_') !== false) || (strpos($byweapon, 'c4_mp') !== false) || (strpos($byweapon, 'grenade_') !== false) || (strpos($byweapon, 'destructible_bar') !== false) || (strpos($byweapon, 'ac130_') !== false) || (strpos($byweapon, 'at4_mp') !== false) || (strpos($byweapon, 'destructible_car') !== false) || (strpos($byweapon, 'claymore_') !== false) || (strpos($byweapon, 'artillery') !== false)) {
                $outdmg = 1;
            }
            if ($outdmg == 0) {
                $shy = trim($server_port . $player_killer_guid);
                $shy = dbGuid(4) . (abs(hexdec(crc32($shy))));
                $shyd = trim($server_port . $death_player_guid);
                $shyd = dbGuid(4) . (abs(hexdec(crc32($shy))));
                ////////////////////////////////////////////////
                $stats_array[$shy]['guid'] = $player_killer_guid;
                $stats_array[$shy]['nickname'] = $killer_player_name;
                $stats_array = data_values_input($shy, 'damage', 'damage', $stats_array);
                $stats_array[$shyd]['guid'] = $death_player_guid;
                $stats_array[$shyd]['nickname'] = $death_player_name;
            }

        }
    }
    //////////#############///////#############///////#############/////////////////////////////////////////////////////////////////////////////////////
    //////////#############         DAMAGE END        #############/////////////////////////////////////////////////////////////////////////////////////
    //////////#############///////#############///////#############/////////////////////////////////////////////////////////////////////////////////////
    if (ActionIs('K', $parseline)) {


        /*
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        foreach($stats_array as $rl => $tl){
        if(!empty($stats_array[$rl]['welcometimer'])){
        if(!empty($stats_array[$rl]['ip_adress'])){
        if(time() - $stats_array[$rl]['welcometimer'] >= 30)
        {
        $geodata = $cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat";
              $gi = geoip_open($geodata, GEOIP_STANDARD);
              $record = geoip_record_by_addr($gi, $stats_array[$rl]['ip_adress']);
              if (!empty($record)) $xxccode = $record->country_name;
              else $xxccode = '?';
              $stats_array[$rl]['country'] = $xxccode;

              if (!empty($record)) $xxccode = $record->city;
              else $xxccode = '?';
              $stats_array[$rl]['city'] = $xxccode;

                        if (($xxccode == 'RU') || ($xxccode == 'UA') || ($xxccode == 'BY')
                            || ($xxccode == 'LV') || ($xxccode == 'UZ')
                            || ($xxccode == 'AZ') || ($xxccode == 'AM') || ($xxccode == 'KZ')
                            || ($xxccode == 'KG') || ($xxccode == 'MD') || ($xxccode == 'TJ')
                            || ($xxccode == 'TM') || ($xxccode == 'AB')) require $cpath . 'cfg/languages/ru.lng.php';
                            else if ($xxccode == 'DE')
                                 require $cpath .  'cfg/languages/de.lng.php';
                            else require $cpath . 'cfg/languages/en.lng.php';
              rcon('say ^3' . $welcome_x . ' ^7' . $stats_array[$rl]['nickname'] . ' ^3' . $infoofrom . ' ^6[^2' . $stats_array[$rl]['country'] . '^6]', '');
            unset($stats_array[$rl]['welcometimer']);

        }}}}
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        */


        $parselinetxt = delxkll($parseline);
        // 4:58    K;0                  ;31;      ;bot31 ;2310346615720138741;30;    ;TyK TyK..  ?;c4_mp;  98; MOD_GRENADE_SPLASH;none
        // 2304:11 K;2310346615980522343;25;allies;XXXXXX;2310346617077157795;32;axis;Deep sadness;ak47_mp;84; MOD_RIFLE_BULLET;torso_lower
        list($vv1, $death_player_guid, $idnumb, $vv4, $death_player_name, $player_killer_guid, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parselinetxt);
        if (strpos($parseline, 'K;') !== false) echo "\n\r \033[38;5;198m[kill]\033[38;5;46m : [", $dtx2, "] : [", $killer_player_name, " -> ", $death_player_name, "]  [", $hitlock, "]";
        ///STATS SYSTEM - ADD BOTS IN STATS
        // 0 - OFF(DO NOT ADD)
        // 1 - ON(ADD BOTS IN STATISTICS SYSTEM for all servers)
        // example: reg_guid_stats = "28960/28962/28964" servers without 0 guid adding in stats,
        // another servers wits bots going in stats
        if ((empty(reg_guid_stats)) || ((strpos(reg_guid_stats, $server_ip) === false) && (strlen(reg_guid_stats) > 3))) {
            if (empty($death_player_guid)) $da = 20;
            if (empty($player_killer_guid)) $da = 20;
            if (strpos($player_killer_guid, 'bot') !== false) $da = 20;
            if (strpos($death_player_guid, 'bot') !== false) $da = 20;
        } else if ((reg_guid_stats == 1) || ((strpos(reg_guid_stats, $server_ip) !== false) && (strlen(reg_guid_stats) > 3))) {
            if (empty($death_player_guid)) $da = 0;
            if (empty($player_killer_guid)) $da = 0;
            $player_killer_guid = $killer_player_name;
            $death_player_guid = $death_player_name;
        }
        if ($da == 0) {
            if (!empty($ggtype)) {
                if (empty($egtxrun)) {
                    $ggtype = $log_folder . '/g_gametype_' . $server_ip . '_' . $server_port . '.log';
                    $f = fopen($ggtype, "r");
                    $egtxrun = fgets($f);
                    $egtxrun = trim($egtxrun);
                }
            }
            $shiddeath = 0;
            $shid = 0;
            $death_player_name = $death_player_name;
            $killer_player_name = $killer_player_name;
            ///////////////////////////SHID = PORT+GUID
            $shid = trim($server_port . $player_killer_guid);
            //$shid = CRC16::calculate($shid);
            $shid = dbGuid(4) . (abs(hexdec(crc32($shid))));
            ///////////////////////////EGO SHID = PORT+GUID
            $shiddeath = trim($server_port . $death_player_guid);
            //$shiddeath = CRC16::calculate($shiddeath);
            $shiddeath = dbGuid(4) . (abs(hexdec(crc32($shiddeath))));
            /////////////////////////////////////////////////

            if (empty($stats_array[$shid]['date']))
                $stats_array[$shid]['date'] = date('Y-m-d H:i:s');
            if (empty($stats_array[$shiddeath]['date']))
                $stats_array[$shiddeath]['date'] = date('Y-m-d H:i:s');

            if (empty($stats_array[$shid]['MOD_CRUSH']))
                $stats_array[$shid]['MOD_CRUSH'] = 1;
            if (empty($stats_array[$shiddeath]['MOD_CRUSH']))
                $stats_array[$shiddeath]['MOD_CRUSH'] = 1;


            if (empty($stats_array[$shid]['totalplayedtimer']))
                $stats_array[$shid]['totalplayedtimer'] = time();
            if (empty($stats_array[$shiddeath]['totalplayedtimer']))
                $stats_array[$shiddeath]['totalplayedtimer'] = time();


            if (empty($stats_array[$shid]['ip_adress'])) {
                list($i_ping, $i_ip, $i_name, $i_guid, $xxccode, $city, $country) = explode(';', (rconExplode($player_killer_guid)));
                $stats_array[$shid]['ip_adress'] = '' . $i_ip . '';
                if (empty($stats_array[$shid]['city']))
                    $stats_array[$shid]['city'] = '' . $xxccode . '';
                if (empty($stats_array[$shid]['ping']))
                    $stats_array[$shid]['ping'] = $i_ping;
            }

            if (empty($stats_array[$shiddeath]['ip_adress'])) {
                list($i_ping, $i_ip, $i_name, $i_guid, $xxccode, $city, $country) = explode(';', (rconExplode($death_player_guid)));
                $stats_array[$shiddeath]['ip_adress'] = '' . $i_ip . '';
                if (empty($stats_array[$shiddeath]['city']))
                    $stats_array[$shiddeath]['city'] = '' . $xxccode . '';
                if (empty($stats_array[$shiddeath]['ping']))
                    $stats_array[$shiddeath]['ping'] = $i_ping;
            }

            if (empty($stats_array[$shiddeath]['user_status']))
                $stats_array[$shiddeath]['user_status'] = 'guest';
            if (empty($stats_array[$shid]['user_status']))
                $stats_array[$shid]['user_status'] = 'guest';

            if (empty($shid)) $shid = 'no_guid';
            $killer_player_name = STATS_name_replace($killer_player_name);
            $death_player_name = STATS_name_replace($death_player_name);
            $stats_array[$shid]['guid'] = $player_killer_guid;
            $stats_array[$shid]['nickname'] = $killer_player_name;
            $stats_array = data_values_input($shid, 'hitzones', $hitlock, $stats_array);


            if (strpos($byweapon, '_mp') !== false) {
                $m = preg_split('/_[a-z0-9]{1,3}\_mp/', $byweapon);
                if (!empty($m[0]))
                    $byweapon = $m[0] . '_mp';
            }

            echo "\n---> ", $byweapon;


            $stats_array = data_values_input($shid, 'weapons', $byweapon, $stats_array);

            $stats_array = data_values_input($shid, 'mod', $modkll, $stats_array);
            $stats_array = data_values_input($shid, 'scores', 'kills', $stats_array);
            //dth
            $stats_array[$shiddeath]['guid'] = $death_player_guid;
            $stats_array[$shiddeath]['nickname'] = $death_player_name;

            $stats_array = data_values_input($shiddeath, 'scores', 'deaths', $stats_array);
            //suicides
            if (((strpos($parseline, ';MOD_SUICIDE;none') === false) && ($death_player_guid . ';-1;')) ||
                ((strpos($parseline, ';MOD_FALLING;none') === false) && ($death_player_guid . ';-1;'))) {
                if ($shid == $shiddeath) $stats_array = data_values_input($shiddeath, 'scores', 'suicides', $stats_array);
            }
            //##################################################################################################
            //##########################################  SERIES  ##############################################
            //death series  and heads
            if ((!empty($stats_array[$shid]['scores;death_series']))) {
                if (($stats_array[$shid]['scores;death_series'] > 1)) {
                    if (empty($stats_array[$shid]['scores;death_series_db'])) $stats_array[$shid]['scores;death_series_db'] = $stats_array[$shid]['scores;death_series'];
                    if (empty($stats_array[$shid]['scores;death_series_head'])) $stats_array[$shid]['scores;death_series_head'] = 0;
                    if (empty($stats_array[$shid]['scores;death_series_head_db'])) $stats_array[$shid]['scores;death_series_head_db'] = $stats_array[$shid]['scores;death_series_head'];
                    if (empty($stats_array[$shid]['scores;kill_series'])) $stats_array[$shid]['scores;kill_series'] = 0;
                    if ((($stats_array[$shid]['scores;death_series_db']) <= ($stats_array[$shid]['scores;death_series'])) && (($stats_array[$shid]['scores;kill_series']) >= 0)) {
                        $stats_array[$shid]['scores;death_series_db'] = $stats_array[$shid]['scores;death_series'];
                        $stats_array[$shid]['scores;death_series_head_db'] = $stats_array[$shid]['scores;death_series_head'];
                        $stats_array[$shid]['scores;kill_series'] = 0;
                        $stats_array[$shid]['scores;death_series'] = 0;
                    }
                }
            } else {
                if ($hitlock == 'head') $stats_array = data_values_input($shiddeath, 'scores', 'kill_series_head', $stats_array);
                $stats_array = data_values_input($shid, 'scores', 'kill_series', $stats_array);
            }
            //kill series   and heads
            if (!empty($stats_array[$shiddeath]['scores;kill_series'])) {
                if (($stats_array[$shiddeath]['scores;kill_series'] > 1)) {
                    if (empty($stats_array[$shiddeath]['scores;kill_series_db'])) $stats_array[$shiddeath]['scores;kill_series_db'] = $stats_array[$shiddeath]['scores;kill_series'];
                    if (empty($stats_array[$shiddeath]['scores;death_series'])) $stats_array[$shiddeath]['scores;death_series'] = 0;
                    if ((($stats_array[$shiddeath]['scores;kill_series_db']) <= ($stats_array[$shiddeath]['scores;kill_series'])) && (($stats_array[$shiddeath]['scores;death_series']) >= 0)) {
                        $stats_array[$shiddeath]['scores;kill_series_db'] = $stats_array[$shiddeath]['scores;kill_series'];
                        if ((empty($stats_array[$shiddeath]['scores;kill_series_head'])) && ($hitlock == 'head')) $stats_array[$shiddeath]['scores;kill_series_head'] = 1;
                        else if (empty($stats_array[$shiddeath]['scores;kill_series_head'])) $stats_array[$shiddeath]['scores;kill_series_head'] = 0;
                        $stats_array[$shiddeath]['scores;kill_series_head_db'] = $stats_array[$shiddeath]['scores;kill_series_head'];
                        $stats_array[$shiddeath]['scores;kill_series'] = 0;
                        $stats_array[$shiddeath]['scores;death_series'] = 0;
                        $stats_array[$shiddeath]['scores;death_series_head'] = 0;
                    }
                }
            } else {
                if ($hitlock == 'head') $stats_array = data_values_input($shiddeath, 'scores', 'death_series_head', $stats_array);
                $stats_array = data_values_input($shiddeath, 'scores', 'death_series', $stats_array);
            }
            //*************************************  SERIES in minute  *****************************************
            // K/D series in minute
            $m[0] = 0;
            preg_match('/\d[0-9]{0,3}\:\d[0-9]{0,2}/', $parseline, $m);
            if (!empty($m[0]))
                $keyhm = str_replace(":", "", $m[0], $keyhm);
            $keyhm = (int)$keyhm;
            //kill series minute
            $kill_series_minute_time = search_values($shiddeath, 'scores', 'kill_series_minute_time', $stats_array);
            if (empty($kill_series_minute_time)) $stats_array[$shiddeath]['scores;kill_series_minute_time'] = $keyhm;
            else if ($kill_series_minute_time < 0) $stats_array[$shiddeath]['scores;kill_series_minute_time'] = 0;
            else $kill_series_minute_time = $stats_array[$shiddeath]['scores;kill_series_minute_time'];
            $kill_T_summ = (((int)$keyhm) - ((int)$kill_series_minute_time));
            //death series minute
            $death_series_minute_time = search_values($shid, 'scores', 'death_series_minute_time', $stats_array);
            if (empty($death_series_minute_time)) $stats_array[$shid]['scores;death_series_minute_time'] = $keyhm;
            else if ($death_series_minute_time < 0) $stats_array[$shid]['scores;death_series_minute_time'] = 0;
            else $death_series_minute_time = $stats_array[$shid]['scores;death_series_minute_time'];
            $death_T_summ = (((int)$keyhm) - ((int)$death_series_minute_time));
            //death series  IN MINUTE
            if ((!empty($stats_array[$shid]['scores;death_series_minute']))) {
                if (($stats_array[$shid]['scores;death_series_minute'] > 0)) {
                    if (empty($stats_array[$shid]['scores;death_series_minute_db'])) $stats_array[$shid]['scores;death_series_minute_db'] = $stats_array[$shid]['scores;death_series_minute'];
                    if ((empty($stats_array[$shid]['scores;death_series_heads_minute'])) && ($hitlock == 'head')) $stats_array[$shid]['scores;death_series_heads_minute'] = 1;
                    else if (empty($stats_array[$shid]['scores;death_series_heads_minute'])) $stats_array[$shid]['scores;death_series_heads_minute'] = 0;
                    if (empty($stats_array[$shid]['scores;death_series_minute_head_db'])) $stats_array[$shid]['scores;death_series_minute_head_db'] = $stats_array[$shid]['scores;death_series_heads_minute'];
                    if (empty($stats_array[$shid]['scores;kill_series_minute'])) $stats_array[$shid]['scores;kill_series_minute'] = 0;
                    if (empty($stats_array[$shid]['scores;kill_series_minute_head'])) $stats_array[$shid]['scores;kill_series_minute_head'] = 0;
                    if ((($stats_array[$shid]['scores;death_series_minute_db']) <= ($stats_array[$shid]['scores;death_series_minute'])) && (($stats_array[$shid]['scores;kill_series_minute']) >= 0)) {
                        if (($death_T_summ >= 60) && ($death_T_summ < 65)) {
                            if (!empty($stats_array[$shid]['scores;death_series_minute_db']))
                                $stats_array[$shid]['scores;death_series_minute_db'] = $stats_array[$shid]['scores;death_series_minute'];
                            if (!empty($stats_array[$shid]['scores;death_series_head_minute']))
                                $stats_array[$shid]['scores;death_series_minute_head_db'] = $stats_array[$shid]['scores;death_series_head_minute'];
                            $stats_array[$shid]['scores;kill_series_minute'] = 0;
                            $stats_array[$shid]['scores;death_series_minute'] = 0;
                            $stats_array[$shid]['scores;kill_series_head_minute'] = 0;
                            $stats_array[$shid]['scores;death_series_head_minute'] = 0;
                        } else if ($death_T_summ > 65) {
                            $stats_array[$shid]['scores;kill_series_minute'] = 0;
                            $stats_array[$shid]['scores;death_series_minute'] = 0;
                            $stats_array[$shid]['scores;kill_series_head_minute'] = 0;
                            $stats_array[$shid]['scores;death_series_head_minute'] = 0;
                        } else if ($death_T_summ < 0) {
                            $stats_array[$shid]['scores;kill_series_minute'] = 0;
                            $stats_array[$shid]['scores;death_series_minute'] = 0;
                            $stats_array[$shid]['scores;kill_series_head_minute'] = 0;
                            $stats_array[$shid]['scores;death_series_head_minute'] = 0;
                        }
                    }
                }
            } else {
                if ($hitlock == 'head') $stats_array = data_values_input($shid, 'scores', 'kill_series_minute_head', $stats_array);
                $stats_array = data_values_input($shid, 'scores', 'kill_series_minute', $stats_array);
            }
            //kill series  IN MINUTE
            if (!empty($stats_array[$shiddeath]['scores;kill_series_minute'])) {
                if (($stats_array[$shiddeath]['scores;kill_series_minute'] > 0)) {
                    if (empty($stats_array[$shiddeath]['scores;kill_series_minute_db'])) $stats_array[$shiddeath]['scores;kill_series_minute_db'] = $stats_array[$shiddeath]['scores;kill_series_minute'];
                    if ((empty($stats_array[$shiddeath]['scores;kill_series_head_minute'])) && ($hitlock == 'head')) $stats_array[$shiddeath]['scores;kill_series_head_minute'] = 1;
                    else if (empty($stats_array[$shiddeath]['scores;kill_series_head_minute'])) $stats_array[$shiddeath]['scores;kill_series_head_minute'] = 0;
                    if (empty($stats_array[$shiddeath]['scores;kill_series_minute_db'])) $stats_array[$shiddeath]['scores;kill_series_minute_head_db'] = $stats_array[$shiddeath]['scores;kill_series_head_minute'];
                    if (empty($stats_array[$shiddeath]['scores;death_series_minute'])) $stats_array[$shiddeath]['scores;death_series_minute'] = 0;
                    if (empty($stats_array[$shiddeath]['scores;death_series_minute_head'])) $stats_array[$shiddeath]['scores;death_series_minute_head'] = 0;
                    if ((($stats_array[$shiddeath]['scores;kill_series_minute_db']) <= ($stats_array[$shiddeath]['scores;kill_series_minute'])) && (($stats_array[$shiddeath]['scores;death_series_minute']) >= 0)) {
                        if (($kill_T_summ >= 60) && ($kill_T_summ < 65)) {

                            if (!empty($stats_array[$shiddeath]['scores;kill_series_minute']))
                                $stats_array[$shiddeath]['scores;kill_series_minute_db'] = $stats_array[$shiddeath]['scores;kill_series_minute'];
                            if (!empty($stats_array[$shiddeath]['scores;kill_series_minute_head_db']))
                                $stats_array[$shiddeath]['scores;kill_series_minute_head_db'] = $stats_array[$shiddeath]['scores;kill_series_minute_head'];
                            $stats_array[$shiddeath]['scores;kill_series_minute'] = 0;
                            $stats_array[$shiddeath]['scores;death_series_minute'] = 0;
                            $stats_array[$shiddeath]['scores;kill_series_minute_head'] = 0;
                            $stats_array[$shiddeath]['scores;death_series_minute_head'] = 0;
                        } else if ($kill_T_summ > 65) {
                            $stats_array[$shiddeath]['scores;kill_series_minute'] = 0;
                            $stats_array[$shiddeath]['scores;death_series_minute'] = 0;
                            $stats_array[$shiddeath]['scores;kill_series_minute_head'] = 0;
                            $stats_array[$shiddeath]['scores;death_series_minute_head'] = 0;
                        } else if ($kill_T_summ < 0) {
                            $stats_array[$shiddeath]['scores;kill_series_minute'] = 0;
                            $stats_array[$shiddeath]['scores;death_series_minute'] = 0;
                            $stats_array[$shiddeath]['scores;kill_series_minute_head'] = 0;
                            $stats_array[$shiddeath]['scores;death_series_minute_head'] = 0;
                        }
                    }
                }
            } else {
                if ($hitlock == 'head') $stats_array = data_values_input($shiddeath, 'scores', 'death_series_head_minute', $stats_array);
                $stats_array = data_values_input($shiddeath, 'scores', 'death_series_minute', $stats_array);
            }
            //*************************************  SERIES in minute  *****************************************
            //##########################################  SERIES  ##############################################
            //##################################################################################################
           

                if (!file_exists($cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/')) {
                    if (!file_exists($cpath . 'ReCodMod/databases/stats_register/')) mkdir($cpath . 'ReCodMod/databases/stats_register/', 0777, true);
                    mkdir($cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/', 0777, true);
                }

                $istatl = 0;
                $damaged_skill = search_values($shiddeath, 'scores', 'skill', $stats_array);
                $attacker_skill = search_values($shid, 'scores', 'skill', $stats_array);
                /////////////////////////////////////////// skill attacker    start  ////////////////////////////////////////////
                if (empty($attacker_skill)) {
                    if (!empty($attacker_skill = get_skill_from_log($shid, $server_ip, $server_port))) $istatl = 1;
                    else {
                        if (empty(get_skill_from_log($shid, $server_ip, $server_port))) {
                            $player_skill_reg = $cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/ID_SPG_' . $shid . '.log';
                            if (!file_exists($player_skill_reg)) touch($player_skill_reg);
                        }
                    }
                    if (empty($attacker_skill)) $attacker_skill = get_skill_from_database($shid);
                    if (!empty($attacker_skill = get_skill_from_log($shid, $server_ip, $server_port))) $istatl = 1;
                }
                //////////////////////////////////////////// skill attacker    end  ////////////////////////////////////////////
                //////////////////////////////////////////// skill death    start  ////////////////////////////////////////////
                if (empty($damaged_skill)) {
                    if (!empty($damaged_skill = get_skill_from_log($shiddeath, $server_ip, $server_port))) $istatl = 1;
                    else {
                        if (empty(get_skill_from_log($shiddeath, $server_ip, $server_port))) {
                            $player_skill_reg = $cpath . 'ReCodMod/databases/stats_register/' . $server_ip . '_' . $server_port . '/ID_SPG_' . $shiddeath . '.log';
                            if (!file_exists($player_skill_reg)) touch($player_skill_reg);
                        }
                    }
                    if (empty($damaged_skill)) $damaged_skill = get_skill_from_database($shid);
                    if (!empty($damaged_skill = get_skill_from_log($shiddeath, $server_ip, $server_port))) $istatl = 1;
                }
                //////////////////////////////////////////// skill death    end  ////////////////////////////////////////////
                if (empty($attacker_skill)) {
                    $stats_array[$shid]['scores;skill'] = 1000;
                    $attacker_skill = 1000;
                }
                if (empty($damaged_skill)) {
                    $damaged_skill = 1000;
                    $stats_array[$shiddeath]['scores;skill'] = 1000;
                }
                $explode_skill = SKILLcalculation($killer_player_name, $shid, $attacker_skill, $player_killer_guid, $death_player_name, $shiddeath, $damaged_skill, $death_player_guid);
                list($new_attacker_skill, $new_damaged_skill) = explode(';', $explode_skill);
                $stats_array[$shid]['scores;skill'] = (float)$new_attacker_skill;
                $stats_array[$shiddeath]['scores;skill'] = (float)$new_damaged_skill;
            
            /////////////////////////////////////////#     RCM     #//////////////////////////////////////////
            //#################################         version 9         ##################################//
            /////////////////////////////////////////#    SKILL    #//////////////////////////////////////////
            /////////////////////////////////////////###############//////////////////////////////////////////
            slowscript(__FILE__);
            $fin = microtime(true) - $start;
            if ($fin > 5.5) {
                require $cpath . 'ReCodMod/functions/null.php';
                exit;
            }

            //Обновление статистики *Начало
            $activate_opt = 1;
            require $cpath . 'ReCodMod/functions/parser/stats_opt.php';
            //Обновление статистики *Конец
        }
        echo "\033[38;5;202m ===> nd:", substr($tfinishh = (microtime(true) - $start), 0, 5);
        echo "\033[38;5;46m";
        $da = 0;
    }
    require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
}
}
?>