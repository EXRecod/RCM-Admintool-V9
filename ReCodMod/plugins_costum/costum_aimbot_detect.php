<?php
if ((strpos($parseline, ' K;') !== false) || (strpos($parseline, ' D;') !== false)) {
  $poss = 0;
  list($vv1, $death_player_guid, $idnumb, $vv4, $death_player_name, $player_killer_guid, $idkill, $vv8, $killer_player_name, $byweapon, $vv11, $modkll, $hitlock) = explode(';', $parselinetxt);
  ///////////////////////////SHID = PORT+GUID
  $shid = trim($server_port . $player_killer_guid);
  //$shid = CRC16::calculate($shid);
  $shid = dbGuid(4) . (abs(hexdec(crc32($shid))));
  ///////////////////////////EGO SHID = PORT+GUID
  $shiddeath = trim($server_port . $death_player_guid);
  //$shiddeath = CRC16::calculate($shiddeath);
  $shiddeath = dbGuid(4) . (abs(hexdec(crc32($shiddeath))));
  /////////////////////////////////////////////////
  if (empty($shid)) $shid = 'no_guid';
  if (strpos($hitlock, 'head') !== false) {
    $poss = 2;
    $outheadshots = 0;
  }
  //############################################################################
  //##########################      ANTI AIM     ##############################
  if (empty($antiaimarraydatatimer)) $antiaimarraydatatimer[][][][][][][] = array();
  if (!array_key_exists($shid, $antiaimarraydatatimer)) $antiaimarraydatatimer[$shid][$player_killer_guid]['sec'][]['time'][]['heads'][] = $shid;
  foreach ($antiaimarraydatatimer as $guidxid => $f) {
    $cn = 0;
    $kstatus = 0;
    $kx = 0;
    $dstatus = 0;
    $dx = 0;
    $hstatus = 0;
    $hx = 0;
    $time = 0;
    foreach ($f as $guid => $s) {
      foreach ($s as $kstatus => $v) {
        foreach ($v as $kx => $t) {
          foreach ($t as $dstatus => $j) {
            foreach ($j as $time => $r) {
              foreach ($r as $hstatus => $q) {
                foreach ($q as $hx => $x) {
                  if (array_key_exists($guidxid, $antiaimarraydatatimer)) {
                    if ($shid == $guidxid) {
                      if (!empty($time)) {
                        if ($poss == 2) {
                          unset($antiaimarraydatatimer[$guidxid][$guid]['sec'][(int)$kx]['time'][(int)$time]['heads'][(int)$hx]);
                          if ((((int)$kx + ((time()) - (int)$time)) <= 8) and ((int)$hx == 10)) {
                            //xcon('tempban ' . $guid . ' 59min AimbotDetected', '');
                            trigger_error("TEST *** CHEATER? $guid : [$datetime] [time:$time]/[heads:$hx] $server_ip:$server_port \n\n", E_USER_ERROR);
                          }
                          else if ((((int)$kx + ((time()) - (int)$time)) > 8) and ((int)$hx >= 0)) echo 'unset';
                          else $antiaimarraydatatimer[$guidxid][$guid]['sec'][(int)$kx + (time() - (int)$time) ]['time'][time() ]['heads'][(int)$hx + 1] = $guidxid;
                        }
                      }
                      else $antiaimarraydatatimer[$guidxid][$guid]['sec'][(int)$kx + ((time() - (int)$time)) ]['time'][time() ]['heads'][(int)$hx + 1] = $guidxid;
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
  if (empty($antiaimarraydata)) $antiaimarraydata[][][][][][][] = array();
  if (!array_key_exists($shid, $antiaimarraydata)) $antiaimarraydata[$shid][$player_killer_guid]['kills'][]['deaths'][]['' . $hitlock . ''][] = $shid;
  foreach ($antiaimarraydata as $guidxid => $f) {
    $cn = 0;
    $kstatus = 0;
    $kx = 0;
    $dstatus = 0;
    $dx = 0;
    $hstatus = 0;
    $hx = 0;
    foreach ($f as $guid => $s) {
      foreach ($s as $kstatus => $v) {
        foreach ($v as $kx => $t) {
          foreach ($t as $dstatus => $j) {
            foreach ($j as $dx => $r) {
              foreach ($r as $hstatus => $q) {
                foreach ($q as $hx => $x) {
                  if (array_key_exists($guidxid, $antiaimarraydata)) {
                    if ($shid == $guidxid) {
                      if ($poss == 2) {
                        unset($antiaimarraydata[$guidxid][$guid]['kills'][(int)$kx]['deaths'][(int)$dx]['heads'][(int)$hx]);
                        $antiaimarraydata[$guidxid][$guid]['kills'][(int)$kx + 1]['deaths'][(int)$dx]['heads'][(int)$hx + 1] = $guidxid;
                      }
                      else if ($poss == 1) {
                        unset($antiaimarraydata[$guidxid][$guid]['kills'][(int)$kx]['deaths'][(int)$dx]['' . $hitlock . ''][(int)$hx]);
                        $antiaimarraydata[$guidxid][$guid]['kills'][(int)$kx + 1]['deaths'][(int)$dx]['' . $hitlock . ''][(int)$hx + 1] = $guidxid;
                      }
                      if ($hstatus == 'heads') {
                        if ($kx > 55) {
                          if (((($dx / $kx) * 100) > 60) && (($kx / $dx) > 2.8)) {
                            //xcon('permban ' . $guid . ' ^1AIMBOT CHEATER DETECTED!', '');
                            trigger_error("TEST *** CHEATER? $guid : [$datetime] $cn/$kx/$dx $server_ip:$server_port \n\n", E_USER_ERROR);
                            unset($antiaimarraydata[$guidxid][$guid]);
                          }
                          //else
                          //	unset($antiaimarraydata[$guidxid][$guid]);
                          
                        }
                      }
                      else if ((!empty($hstatus)) and ($hstatus != 'heads')) {
                        if ($hx > 0) {
                          ++$cn;
                          //++$hx;
                          
                        }
                        if ($kx > 99) {
                          if (($cn < 6) && (($kx / $dx) > 3.5)) {
                            //xcon('permban ' . $guid . ' ^1AIMBOT CHEATER DETECTED!', '');
                            trigger_error("TEST *** CHEATER? $guid : [$datetime] $cn/$kx/$dx $server_ip:$server_port \n\n", E_USER_ERROR);
                            unset($antiaimarraydata[$guidxid][$guid]);
                          }
                          else unset($antiaimarraydata[$guidxid][$guid]);
                        }
                      }
                    }
                    else if ($shiddeath == $guidxid) {
                      unset($antiaimarraydata[$guidxid][$guid]['kills'][(int)$kx]['deaths'][(int)$dx]['' . $hitlock . ''][(int)$hx]);
                      $antiaimarraydata[$guidxid][$guid]['kills'][(int)$kx]['deaths'][(int)$dx + 1]['heads'][(int)$hx] = $guidxid;
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
  //############################################################################
  //##########################      ANTI AIM     ##############################
  
}
?>