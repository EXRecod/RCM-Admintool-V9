<?php
/*  """""""""""""""""     блок основной статистики с лог файла      """""""""""""""""   */
//  $block_stats = 1;     // 1 - блок основной статистики с лог файла  0 - OFF
$block_stats = 1;

if ($block_stats == 1) {

    if (ActionIs('Q', $parseline)) {
        $nickname = '';
        $idk = '';
        $guid = '';
        list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
        if (!empty($guid)) {
            if (strlen($guid) == 17)
                $rest = substr($guid, 7);
            else
                $rest = substr($guid, 9);

            if ((int)$rest) {

                ///////////////////////////  ВАЖНО! ИНДEНТИФИКАТОР ИГРОКА  ////////////////////////////////////
                $uidPlayer = trim($server_port . $guid);
                $uidPlayer = dbGuid(4) . (abs(hexdec(crc32($uidPlayer))));
                ///////////////////////////  ВАЖНО! ИНДEНТИФИКАТОР ИГРОКА  ////////////////////////////////////

                $stats_array[$uidPlayer]["guid"] = $guid;
                $stats_array[$uidPlayer]["nickname"] = $nickname;

                if (!empty($gameTypeArray)) {
                    unset($gameTypeArray);
                }
                //сканируем типы игры на наличие по папкам
                $gameTypeArray = ['dom', 'tdm', 'dm', 'sd', 'war', 'gg', 'koth', 'ctf', 'ch'];


                if (!empty($gameMapsArray)) {
                    unset($gameMapsArray);
                }


                if (!empty($PlayerMapsArray)) {
                    unset($PlayerMapsArray);
                } else {
                    $PlayerMapsArray = [];
                }

                //сканируем карты
                $gameMapsArray = ['mp_convoy', 'mp_backlot', 'mp_bloc', 'mp_bog', 'mp_carentan',
                    'mp_broadcast', 'mp_countdown', 'mp_crash', 'mp_crash_snow', 'mp_creek',
                    'mp_crossfire', 'mp_citystreets', 'mp_farm', 'mp_killhouse', 'mp_overgrown',
                    'mp_pipeline', 'mp_shipment', 'mp_showdown', 'mp_strike', 'mp_vacant', 'mp_cargoship'];


                foreach ($gameTypeArray as $gtType) {
                    $playerMapsFile = dirname($mplogfile) . '/playerStMaps_' . $gtType . '/' . $rest . '.db';
                    if (@file_exists($playerMapsFile)) {
                        $GetMapLines[] = @file($playerMapsFile);

                        foreach ($GetMapLines as $l => $v) {
                            foreach ($v as $line_num => $line) {
                                $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);

                                foreach ($gameMapsArray as $mapValue) {

                                    if (strpos($line, $mapValue . "_k~") !== false) {
                                        list($emp, $data) = explode($mapValue . "_k~", $line);
                                        list($kills) = @explode("~", $data);
                                        if (empty($kills)) {
                                            $kills = 0;
                                        }
                                        $PlayerMapsArray[$guid][$mapValue . ";kills"][$gtType] = $kills;
                                    }

                                    if (strpos($line, $mapValue . "_d~") !== false) {
                                        list($emp, $data) = explode($mapValue . "_d~", $line);
                                        list($deaths) = @explode("~", $data);
                                        if (empty($deaths)) {
                                            $deaths = 0;
                                        }
                                        $PlayerMapsArray[$guid][$mapValue . ";deaths"][$gtType] = $deaths;
                                    }

                                    if (strpos($line, $mapValue . "_h~") !== false) {
                                        list($emp, $data) = explode($mapValue . "_h~", $line);
                                        list($headshots) = @explode("~", $data);
                                        if (empty($headshots)) {
                                            $headshots = 0;
                                        }
                                        $PlayerMapsArray[$guid][$mapValue . ";headshots"][$gtType] = $headshots;
                                    }
                                }
                            }
                        }
                    }
                }

                if (!empty($lines)) {
                    unset($lines);
                }

                $file = dirname($mplogfile) . '/playerStsWeapon/' . $rest . '.db';
                if (@file_exists($file)) {
                    $lines[] = @file($file);
                }

                $file = dirname($mplogfile) . '/playerStHitLoc/' . $rest . '.db';
                if (@file_exists($file)) {
                    $lines[] = @file($file);
                }

                $file = dirname($mplogfile) . '/playerSt/' . $rest . '.db';

                if (@file_exists($file)) {
                    $lines[] = @file($file);
                    if (!empty($lines)) {
                        foreach ($lines as $l => $v) {
                            foreach ($v as $line_num => $line) {
                                $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
                                /* status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~ */

                                if (strpos($line, "kills~") !== false) {
                                    list($emp, $data) = explode("kills~", $line);
                                    list($kills) = @explode("~", $data);
                                    if (empty($kills)) {
                                        $kills = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;kills"] = $kills;
                                }

                                if (strpos($line, "deaths~") !== false) {
                                    list($emp, $data) = explode("deaths~", $line);
                                    list($deaths) = @explode("~", $data);
                                    if (empty($deaths)) {
                                        $deaths = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;deaths"] = $deaths;
                                }

                                if (strpos($line, "sk~") !== false) {
                                    list($emp, $data) = explode("sk~", $line);
                                    list($skill) = @explode("~", $data);
                                    if (empty($skill)) {
                                        $skill = 1000;
                                    }
                                    if (!empty($skill)) {
                                        $skill = $skill * 10;
                                    }
                                    $stats_array[$uidPlayer]["scores;skill"] = $skill;
                                    $history_stats_array[$uidPlayer]['scores;skill'] = $skill;
                                }

                                /*///////// WEAPON CREATE ///////////*/
                                if (empty($wp))
                                    require $cpath . 'ReCodMod/functions/costum_array/weapons/cod.php';

                                //костыль ножика
                                $wp["melee_mp"] = "Ножик ;)";

                                foreach ($wp as $r => $t) {
                                    if (strpos($line, $r) !== false) {
                                        list($emp, $weapGet) = explode($r . "~", $line);
                                        list($thisValue) = @explode("~", $weapGet);
                                        if (empty($thisValue)) {
                                            $thisValue = 0;
                                        }
                                        if (!is_numeric($thisValue)) {
                                            $thisValue = 0;
                                        }

                                        //костыль ножика
                                        if ($r === 'melee_mp') {
                                            $r = 'mod_melee';
                                        }

                                        $stats_array[$uidPlayer]["weapons;" . $r] = $thisValue;
                                    }
                                }
                                /*///////// WEAPON CREATE ///////////*/


                                /*//////////////// HIT ZONES  CREATE ////////////////*/
                                if (empty($htZone))
                                    require $cpath . 'ReCodMod/functions/costum_array/weapons/cod.php';

                                foreach ($htZone as $r => $t) {
                                    if (strpos($line, $r) !== false) {
                                        if (preg_match('/(' . $r . ')/iu', $line, $match)) {
                                            list($emp, $hitGet) = @explode($match[0] . "~", $line);
                                            list($thisValue) = @explode("~", $hitGet);
                                            if (empty($thisValue)) {
                                                $thisValue = 0;
                                            }
                                            if (!is_numeric($thisValue)) {
                                                $thisValue = 0;
                                            }
                                            $stats_array[$uidPlayer]["hitzones;" . $match[0]] = $thisValue;
                                        }
                                    }
                                }
                                /*//////////////// HIT ZONES  CREATE ////////////////*/

                                if (strpos($line, "helid~") !== false) {
                                    list($emp, $data) = explode("helid~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;destroyed_helicopter"] = $thisValue;
                                }

                                if (strpos($line, "camp~") !== false) {
                                    list($emp, $data) = explode("camp~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;camps"] = $thisValue;
                                }

                                if (strpos($line, "capt~") !== false) {
                                    list($emp, $data) = explode("capt~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;flags"] = $thisValue;
                                }
								

                                if (strpos($line, "captn~") !== false) {
                                    list($emp, $data) = explode("captn~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;flags_netralise"] = $thisValue;
                                }								
								

                                if (strpos($line, "defend~") !== false) {
                                    list($emp, $data) = explode("defend~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;saveflags"] = $thisValue;
                                }

                                if (strpos($line, "nuke~") !== false) {
                                    list($emp, $data) = explode("nuke~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;nukebomb"] = $thisValue;
                                }

                                if (strpos($line, "plant~") !== false) {
                                    list($emp, $data) = explode("plant~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;bomb_plant"] = $thisValue;
                                }

                                if (strpos($line, "defuse~") !== false) {
                                    list($emp, $data) = explode("defuse~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;bomb_defused"] = $thisValue;
                                }

                                if (strpos($line, "jugk~") !== false) {
                                    list($emp, $data) = explode("jugk~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;juggernaut_kill"] = $thisValue;
                                }

                                if (strpos($line, "rcxd~") !== false) {
                                    list($emp, $data) = explode("rcxd~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;rcxd_destroyed"] = $thisValue;
                                }

                                if (strpos($line, "turd~") !== false) {
                                    list($emp, $data) = explode("turd~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;turret_destroyed"] = $thisValue;
                                }

                                if (strpos($line, "samd~") !== false) {
                                    list($emp, $data) = explode("samd~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;sam_kill"] = $thisValue;
                                }

                                if (strpos($line, "crush_mp~") !== false) {
                                    list($emp, $data) = explode("crush_mp~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["mod;MOD_CRUSH"] = $thisValue;
                                }

                                if (strpos($line, "ks~") !== false) {
                                    list($emp, $data) = explode("ks~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;kill_series_db"] = $thisValue;
                                }

                                if (strpos($line, "ksm~") !== false) {
                                    list($emp, $data) = explode("ksm~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;kill_series_minute_db"] = $thisValue;
                                }

                                if (strpos($line, "~hs~") !== false) {
                                    list($emp, $data) = @explode("~hs~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;kill_series_head_db"] = $thisValue;
                                }

                                if (strpos($line, "hkm~") !== false) {
                                    list($emp, $data) = explode("hkm~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;kill_series_minute_head_db"] = $thisValue;
                                }

                                if (strpos($line, "ds~") !== false) {
                                    list($emp, $data) = explode("ds~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;death_series_db"] = $thisValue;
                                }

                                if (strpos($line, "dsm~") !== false) {
                                    list($emp, $data) = explode("dsm~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;death_series_minute_db"] = $thisValue;
                                }

                                if (strpos($line, "hds~") !== false) {
                                    list($emp, $data) = explode("hds~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;death_series_head_db"] = $thisValue;
                                }

                                if (strpos($line, "hdm~") !== false) {
                                    list($emp, $data) = explode("hdm~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;death_series_minute_head_db"] = $thisValue;
                                }

                                if (strpos($line, "suicide~") !== false) {
                                    list($emp, $data) = explode("suicide~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;suicides"] = $thisValue;
                                }

                                if (strpos($line, "tpt~") !== false) {
                                    list($emp, $data) = explode("tpt~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;totalplayedtimer"] = $thisValue;
                                }

                                if (strpos($line, "uavd~") !== false) {
                                    list($emp, $data) = explode("uavd~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;uav_destroyed"] = $thisValue;
                                }

                                if (strpos($line, "helpc~") !== false) {
                                    list($emp, $data) = explode("helpc~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;help_carepackage"] = $thisValue;
                                }

                                if (strpos($line, "cared~") !== false) {
                                    list($emp, $data) = explode("cared~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;carepackage_destroyed"] = $thisValue;
                                }

                                if (strpos($line, "mi28_mp~") !== false) {
                                    list($emp, $data) = explode("mi28_mp~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;mi28_mp"] = $thisValue;
                                }

                                if (strpos($line, "campk~") !== false) {
                                    list($emp, $data) = explode("campk~", $line);
                                    list($thisValue) = @explode("~", $data);
                                    if (empty($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    if (!is_numeric($thisValue)) {
                                        $thisValue = 0;
                                    }
                                    $stats_array[$uidPlayer]["scores;campkills"] = $thisValue;
                                }


                                //////// NEW ACTIONS
                                $comActions = ['winner', 'tie', 'lost'];
                                foreach ($comActions as $newActions) {
                                    if (strpos($line, $newActions . "~") !== false) {
                                        list($emp, $data) = explode($newActions . "~", $line);
                                        list($thisValue) = @explode("~", $data);
                                        if (empty($thisValue)) {
                                            $thisValue = 0;
                                        }
                                        if (!is_numeric($thisValue)) {
                                            $thisValue = 0;
                                        }
                                        $stats_array[$uidPlayer]["scores;" . $newActions] = $thisValue;
                                    }
                                }
                                unset($comActions);
                                //////// NEW ACTIONS


                                /*
                                //тут значение с D; урон игрока
                                $stats_array[$uidPlayer]["damage;damage"] = $thisValue;
                                //можно записать точность игрока
                                $stats_array[$uidPlayer]["scores;accuracy"] = $thisValue;
                                */
                            }

                        }
                    }
                }
            }

            slowscript(__FILE__);

            //Обновление статистики *Начало
            $activate_opt = 1;
            require $cpath . 'ReCodMod/plugins_costum/costum_zona_ato_game_mini_stats_updater.php';
            //Обновление статистики *Конец


            //проверка и запись ип адреса
            $result = dbLazy('', "SELECT x_db_ip FROM x_db_players where x_db_guid='$guid' and x_db_ip !='' and x_db_ip !='0' LIMIT 1");
            if (!empty($result)) {
                foreach ($result as $keys => $value) {
                    if (!empty($keys)) {
                        if ($keys === 'x_db_ip') {

                            $querySQL = "UPDATE db_stats_2  
                           SET w_ip='" . $value . "' 
			               where s_pg='" . $uidPlayer . "'";

                            $gt = dbInsert('', $querySQL);
                        }
                    }
                }
            }

            //убираем после заноса массив игрока с данными, без unset задосит бд
            unset($stats_array[$uidPlayer]);
            unset($history_stats_array[$uidPlayer]);

        }
    }


    /*  ВЕТКА ПОД ИСТОРИЮ */

    if (ActionIs('K', $parseline)) {
        $parselinetxt = delxkll($parseline);
        list($vv1, $death_player_guid, $idnumb, $vv4, $death_player_name, $player_killer_guid, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parselinetxt);

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
        $shiddeath = 0;
        $shid = 0;

        $death_player_name = $death_player_name;
        $killer_player_name = $killer_player_name;

        $shid = trim($server_port . $player_killer_guid);
        $shid = dbGuid(4) . (abs(hexdec(crc32($shid))));

        $shiddeath = trim($server_port . $death_player_guid);
        $shiddeath = dbGuid(4) . (abs(hexdec(crc32($shiddeath))));
        /////////////////////////////////////////////////

        if (empty($history_stats_array[$shid]['date'])) {
            $history_stats_array[$shid]['date'] = date('Y-m-d H:i:s');
        }
        if (empty($history_stats_array[$shiddeath]['date'])) {
            $history_stats_array[$shiddeath]['date'] = date('Y-m-d H:i:s');
        }

        $history_stats_array = data_values_input($shid, 'scores', 'kills', $history_stats_array);
        $history_stats_array = data_values_input($shiddeath, 'scores', 'deaths', $history_stats_array);
        if ($hitlock == 'head') {
            $history_stats_array = data_values_input($shid, 'scores', 'headshots', $history_stats_array);
        }
    }

    /*  ВЕТКА  ПОД ИСТОРИЮ */

}
?>