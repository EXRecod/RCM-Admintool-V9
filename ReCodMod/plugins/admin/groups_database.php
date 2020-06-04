<?php
if ((strpos($msgr, ixz . 'group+') !== false) || (strpos($msgr, ixz . 'group-') !== false)) {
  if (userStatus($stats_array[$conisq]['user_status']) == 101) {
    $cntddt = substr_count($msgr, ' ');
    if ($cntddt == 2) {
      list($x_cmd, $x_idn, $groupname) = explode(' ', $msgr);
      if (strpos('admin;moder;vip;donat;moderator;registered;guest;administrator', $groupname) !== false) {
        if (strlen($x_idn) < 3) list($num, $i_ping, $i_ip, $i_name, $i_guid, $xxccode) = explode(';', (rconExplodeIdnum($x_idn)));
        else $i_guid = $x_idn;
        //!group+all [id|guid] groupname
        //updater and insert
        if (strpos($msgr, ixz . 'group+all ') !== false) {
          config_ini_set("_groups_database", $groupname, 'all_' . $i_guid, $i_guid);
          xcon('tell ' . $idnum . ' ^6OK! ^7' . $msgr, '');
        }
        else if (strpos($msgr, ixz . 'group+ ') !== false) {
          config_ini_set("_groups_database", $groupname, $server_port . '_' . $i_guid, $i_guid);
          xcon('tell ' . $idnum . ' ^6OK! ^7' . $msgr, '');
        }
        else if (strpos($msgr, ixz . 'group-all ') !== false) {
          config_ini_del("_groups_database", $groupname, 'all_' . $i_guid, $i_guid);
          xcon('tell ' . $idnum . ' ^6OK! ^7' . $msgr, '');
        }
        else if (strpos($msgr, ixz . 'group- ') !== false) {
          config_ini_del("_groups_database", $groupname, $server_port . '_' . $i_guid, $i_guid);
          xcon('tell ' . $idnum . ' ^6OK! ^7' . $msgr, '');
        }
      }
    }
    else {
      if (strpos($msgr, ixz . 'group+all') !== false) xcon('tell ' . $idnum . ' ^6ERROR! ^7' . $msgr . ' ^1!group+all group guidORnum', '');
      else if (strpos($msgr, ixz . 'group+') !== false) xcon('tell ' . $idnum . ' ^6ERROR! ^7' . $msgr . ' ^1!group+ group guidORnum', '');
      else if (strpos($msgr, ixz . 'group-all') !== false) xcon('tell ' . $idnum . ' ^6ERROR! ^7' . $msgr . ' ^1!group-all group guidORnum', '');
      else if (strpos($msgr, ixz . 'group-') !== false) xcon('tell ' . $idnum . ' ^6ERROR! ^7' . $msgr . ' ^1!group- group guidORnum', '');
    }
  }
}
?>