<?php
if ((preg_match('/say;/', $parseline, $u)) || (preg_match('/sayteam;/', $parseline, $xm)) || (preg_match('/tell;/', $parseline, $xm))) {
  $conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guidn))))));
  if (empty($stats_array[$conisq]['user_status'])) $stats_array[$conisq]['user_status'] = 'guest';
  /////////////////////////////////////
  $IniFileName0 = 'commands';
  $IniFileName1 = 'commands_costum';
  /////////////////////////////////////
  ///////////////////////all commands
  $ini_array = parse_ini_file($cpath . 'cfg/' . $IniFileName0 . '.ini', true);
  if ($stats_array[$conisq]['user_status'] != 'guest') {
    if ($stats_array[$conisq]['user_status'] == 'developer') $commands0 = $ini_array["commands_administrator"]['administrator'];
    else if ($stats_array[$conisq]['user_status'] == 'registered') $commands0 = '';
    else $commands0 = $ini_array["commands_" . $stats_array[$conisq]['user_status'] . ""][($stats_array[$conisq]['user_status']) ];
    $commands1 = $ini_array["commands_registered"]["registered"];
    $commands2 = $ini_array["commands_fun"]["cm_sp_gt"];
    //
    $arryy = costumgroupsInivalues($IniFileName1, $stats_array[$conisq]['user_status'], 1);
    $jj = implode(",", $arryy);
    $commands_costum = str_replace(",", ";", $jj);
    $commands_costum = str_replace("1;2;3;", "", $commands_costum);
    //
    $commands = $commands0 . ';' . $commands1 . ';' . $commands2 . ';' . $commands_costum;
  }
  else if ($stats_array[$conisq]['user_status'] == 'guest') {
    //
    $arryy = costumgroupsInivalues($IniFileName1, 'registered', 1);
    $jj = implode(",", $arryy);
    $commands_costum = str_replace(",", ";", $jj);
    $commands_costum = str_replace("1;2;3;", "", $commands_costum);
    //
    $commands1 = 'cmd;register;login';
    $commands = $commands1 . ';' . $commands_costum;
    $ini_array["commands_guest"]['guest'] = $commands;
  }
  $vcs = 0;
  $validCommand = 0;
  $array = explode(';', $commands);
  foreach ($array as $value) {
    if (!empty($value)) {
      $value = trim($value);
      if (strpos($msgr, ixz . $value) !== false) {
        $validCommand = 1;
        $vcs = 1;
      }
    }
  }
  $ini_array = parse_ini_file($cpath . 'cfg/' . $IniFileName0 . '.ini');
  $u = str_replace(ixz, "", $msgr);
  foreach ($ini_array as $section => $coms) {
    if ((!empty($coms))&&(!empty($u))) {
      if (strpos(trim($coms) , trim($u)) !== false) $vcs = 1;
    }
  }




}
?>
