<?php
if ((strpos($parseline, ' K;') !== false) || (strpos($parseline, ' D;') !== false)) {
  $parselinetxt = delxkll($parseline);
  ///////////////error fix
  $counttdot = substr_count($parseline, ';');
  if ($counttdot < 12) $do_stop = 1;
  else $do_stop = 0;
  ///////////////error fix
  if (empty($do_stop)) {
    if (strpos($parseline, 'K;') !== false) {
      list($vv1, $death_player_guid, $idnumb, $vv4, $death_player_name, $player_killer_guid, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parselinetxt);
      if (!empty($player_killer_guid)) {
        $allplugs = getDirContents($cpath . 'cfg/');
        $bz = 0;
        foreach ($allplugs AS $va) {
          if (strpos($va, '.ini') !== false) {
            $ini_array = parse_ini_file($va, true);
            foreach ($ini_array as $construct => $gq) {
              $a = 0;
              foreach ($gq as $const => $stringq) {
                if (!is_array($stringq)) {
                  if (($const . $stringq) == ("enable1")) {
                    if (($construct) == ("weaponrestrictions")) {
                      $a = 1;
                    }
                  }
                  else if ($a == 1) {
                    if ($const == "rcon") $c = $stringq;
                    else if ($const == "warnstokick") $warnstokick = $stringq;
                    else if ($const == "mode") $modeban = $stringq;
                    else if ($const == "kickreason") {
                      $kickreason = $stringq;
                      $kickreason = str_replace("{WEAPON}", $byweapon, $kickreason);
                    }
                    if ($const == "weapons") {
                      $weapq = explode(",", $stringq);
                      foreach ($weapq as $bwep) {
                        if (((strpos($byweapon, $bwep . "_") !== false) && (preg_match("/^" . $bwep . "_/", $byweapon))) || ($bwep == $byweapon)) {
                          if ($bz == 0) {
                            $bz = 1;
                            //echo '==========',$bwep;
                            $stringip = str_replace(".", "_", $server_ip);
                            $cron_player_killer_guid = $cpath . 'ReCodMod/cache/weapon_restrictions/' . $stringip . '_' . $server_port . '_' . $player_killer_guid . '.log';
                            if (!file_exists($cpath . 'ReCodMod/cache/weapon_restrictions/')) mkdir($cpath . 'ReCodMod/cache/weapon_restrictions/', 0777, true);
                            if (!file_exists($cron_player_killer_guid)) touch($cron_player_killer_guid);
                            if (file_exists($cron_player_killer_guid)) {
                              $fplineq = fopen($cron_player_killer_guid, 'r');
                              $fpline = fgets($fplineq);
                              fclose($fplineq);
                            }
                            if ($warnstokick == 0) xcon('banUser ' . $player_killer_guid . ' ' . $kickreason . '', '');
                            else if (!file_exists($cron_player_killer_guid)) {
                              touch($cron_player_killer_guid);
                              xcon($c . ' ' . $idkill . ' ^7' . html_entity_decode($killer_player_name) . ' ' . $kickreason . '  warn: 1/' . ($warnstokick) . '', '');
                            }
                            else if ((file_exists($cron_player_killer_guid)) and (empty($fpline))) {
                              file_put_contents($cron_player_killer_guid, '1');
                              xcon($c . ' ' . $idkill . ' ' . html_entity_decode($killer_player_name) . ' ' . $kickreason . '', '');
                            }
                            else if ((file_exists($cron_player_killer_guid)) and (!empty($fpline))) {
                              echo $fpline . '========' . $warnstokick;
                              if ($fpline > $warnstokick) {
                                $fp = fopen($cron_player_killer_guid, 'w');
                                fputs($fp, "0");
                                fclose($fp);
                                xcon('say ^7' . html_entity_decode($killer_player_name) . ' ' . $kickreason . '', '');
                                if ($modeban != 'clientkick') {
                                  xcon('banUser ' . $player_killer_guid . ' ' . $kickreason . '', '');
                                }
                              }
                              else {
                                xcon('say ^7' . html_entity_decode($killer_player_name) . ' ' . $kickreason . '', '');
                                xcon('clientkick ' . $idkill . ' ' . $kickreason, '');
                                $fp = fopen($cron_player_killer_guid, 'w');
                                fputs($fp, ((int)$fpline + 1));
                                fclose($fp);
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
          }
        }
      }
    }
  }
}
?>