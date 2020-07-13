<?php
////////rcon need too faked
//echo $game_patch;
if (strpos($parseline, ' K;') !== false) {
    list($num, $idnumb, $vv4, $death_player_name, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parseline);
    $go = 0;
    if (empty($player_geoip_ctrl)) $player_geoip_ctrl[][][][] = array();
    if (!empty($player_geoip_ctrl)) {
        foreach ($player_geoip_ctrl as $oid => $r) {
            foreach ($r as $oguid => $k) {
                foreach ($k as $onick => $o) {
                    foreach ($o as $oip => $z) {
                        if ($go < 1) {
                            if (!empty($oguid)) {
                                if (($oguid != fakeguid(trim($killer_player_name))) && ($oid == $idkill)) {
                                    $go = 1;
                                    if ((rand(5, 15) < 7)) xcon('say ' . $i_name . ' ^7(' . $killer_player_name . ') ^1Forbidden to change nicknames or so many symbols (^)!.', '');
                                    //usleep(980000);
                                    //xcon('clientkick ' . $idk, '');
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    if ($go == 1) $parseline = $num . ';' . fakeguid(trim($death_player_name)) . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';0;' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
    else $parseline = $num . ';' . fakeguid(trim($death_player_name)) . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';' . fakeguid(trim($killer_player_name)) . ';' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
}
else if (strpos($parseline, ' D;') !== false) {
    list($num, $idnumb, $vv4, $death_player_name, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parseline);
    $parseline = $num . ';' . fakeguid(trim($death_player_name)) . ';' . $idnumb . ';' . $vv4 . ';' . $death_player_name . ';' . fakeguid(trim($killer_player_name)) . ';' . $idkill . ';' . $vv8 . ';' . $killer_player_name . ';' . $byweapon . ';' . $vv11 . ';' . $modkll . ';' . $hitlock;
}
else if (strpos($parseline, ' J;') !== false) {
    list($num, $nm, $player_name) = explode(';', $parseline);
    $parseline = $num . ';' . fakeguid(trim($player_name)) . ';' . $nm . ';' . $player_name;
}
else if (strpos($parseline, ' Q;') !== false) {
    list($num, $nm, $player_name) = explode(';', $parseline);
    $parseline = $num . ';' . fakeguid(trim($player_name)) . ';' . $nm . ';' . $player_name;
    if (empty($player_geoip_ctrl)) $player_geoip_ctrl[][][][] = array();
    unset($player_geoip_ctrl['' . $nm . '']);
}
else if ((strpos($parseline, ' say;') !== false) || (strpos($parseline, ' sayteam;') !== false)) {
    if (substr_count($parseline, ';') == 2) {
        list($num, $player_name, $react) = explode(';', $parseline);
        list($i_id, $i_ping, $i_ip, $i_name, $i_guid, $xxccode) = explode(';', (rconExplodeNickname($player_name)));
        $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $i_guid))))));
        if (empty($stats_array[$conisq]['ip_adress'])) {
            $stats_array[$conisq]['ip_adress'] = ''.$i_ip.'';
            if (empty($stats_array[$conisq]['city'])) $stats_array[$conisq]['city'] = $xxccode;
            if (empty($stats_array[$conisq]['ping'])) $stats_array[$conisq]['ping'] = $i_ping;
        }
        $parseline = $num . ';' . $i_guid . ';' . $i_id . ';' . $i_name . ';' . $react;
    }
    /*
                    echo "\n -----------------------------\n ";
                    var_dump($player_geoip_ctrl);
                    echo "\n -----------------------------";
    */
}
?>