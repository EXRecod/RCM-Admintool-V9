<?php
if ((strpos($parseline, "say;") !== false) || (strpos($parseline, "sayteam;") !== false)) {
  if (strpos(clearSymbols($msgr) , 'AIMBOT DETECTED') !== false) {

    if (empty($stats_array[$conisq]['ip_adress'])) {
      include $cpath . 'ReCodMod/functions/core/cod_rcon.php';
      foreach ($rconarray as $j => $e) {
        $i_ip = $e["ip"];
        $i_guid = $e["guid"];
        $i_ping = $e["ping"];

        if ((!empty($i_guid)) && (strpos($i_guid, "bot") === false)) {

          if ((trim($i_guid)) == (trim($guidn))) {

            if (empty($stats_array[$conisq]['ip_adress'])) $stats_array[$conisq]['ip_adress'] = '' . $i_ip . '';

          }
        }
      }
    }

    if (!empty($stats_array[$conisq]['ip_adress'])) {
      list($onem, $twom, $threem, $fourm) = explode(".", $ipadrx);
      $rangeip = $onem . '.' . $twom;
	  
				$tmk = date('Y-m-d H:i:s', strtotime((date('Y-m-d H:i:s')) . ' +1 hour'));
				$tmk = str_replace("-", ".", $tmk);		  
	  
      xcon('clientkick ' . $idnum . ' ^1BAN!', '');
      $re = "INSERT INTO banip (playername, ip, iprange, guid, reason, time, bantime, days, whooo, patch) 
VALUES ('" . $nicknamedata . "','" . $stats_array[$conisq]['ip_adress'] . "','" . $rangeip . "','" . $guidn . "','[IP RANGE BAN]','" . date("Y.m.d H:i:s") . "', '" . $tmk . "', '1','ЧерныйСписок','1')
ON DUPLICATE KEY UPDATE ip='" . $stats_array[$conisq]['ip_adress'] . "', time='" . date("Y.m.d H:i:s") . "', patch=patch+1";
      $r = dbInsert('', $re);
    }

  }
}
?>
