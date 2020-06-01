<?php
if (strpos($msgr, $ixz . 'exbans') !== false) {
  if (empty($stqztx)) {
    if (strpos($commands, 'exbans') !== false) {
      $srhbandat = $mplogfile;
      if ((mb_substr_count($srhbandat, "/")) > 1) {
        for ($i = 1;$i <= mb_substr_count($srhbandat, "/");$i++) {
          $srhbandat = dirname($srhbandat) . '/';
          if (file_exists($srhbandat . '/banlist_v2.dat')) $bandat = $srhbandat . '/banlist_v2.dat';
        }
      }
      else {
        for ($i = 1;$i <= mb_substr_count($srhbandat, "\\");$i++) {
          $srhbandat = dirname($srhbandat) . '\\';
          if (file_exists($srhbandat . '\banlist_v2.dat')) $bandat = $srhbandat . '\banlist_v2.dat';
        }
      }
      if (file_exists($bandat)) {
        $ttt = 0;
        if ($file = fopen($bandat, "r")) {
          while (!feof($file)) {
            $banline = fgets($file);
            ++$ttt;
            $exbanline = explode("\\", $banline);
            for ($i = 1;$i <= (count($exbanline) - 1);$i++) {
              if (($i == 1) || ($i == 3) || ($i == 5) || ($i == 7) || ($i == 9) || ($i == 11) || ($i == 13)) $headerxx = $exbanline[$i];
              if (($i == 2) || ($i == 4) || ($i == 6) || ($i == 8) || ($i == 10) || ($i == 12) || ($i == 14)) $arrbanline[$ttt]['' . $exbanline[$i] . '']['' . $headerxx . ''] = '' . $exbanline[$i] . '';
            }
          }
          fclose($file);
        }
        foreach ($arrbanline as $fo => $do) {
          $xfg = 0;
          foreach ($do as $vo => $bo) {
            foreach ($bo as $so => $mo) {
              switch ($so) {
                case "netadr":
                  $netadrx = $mo;
                  $xfg = 1;
                break;
                case "create":
                  $createx = $mo;
                break;
                case "exp":
                  $expx = $mo;
                break;
                case "rsn":
                  $rsnx = $mo;
                break;
                case "nick":
                  $nickxc = $mo;
                break;
                case "asteamid":
                  $asteamidx = $mo;
                break;
                case "playerid":
                  $playeridx = $mo;
                  $xfg = 0;
                break;
              }
              if ($xfg == 0) echo '-' . $netadrx . '-' . $createx . '-' . $expx . '-' . $rsnx . '-' . $nickxc . '-' . $asteamidx . '-' . $playeridx;
            }
          }
        }
        $stqztx = 2;
      }
    }
    $stqztx = 1;
  }
}
?>