<?php
if ((strpos($parseline, "say;") !== false) || (strpos($parseline, "teamsay;") !== false) | (strpos($parseline, "tell;") !== false)) {
  if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}:\d{1,5}/', $msgr, $ip_match)) {
    if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $msgr, $ip_matchtwo)) $ipmmatch = $ip_matchtwo[0];
    $nickr = htmlentities($nickr);
    $freason = '';
    $fffff = '';
    $freason = '';
    $allplugs = getDirContents($cpath . 'cfg/');
    foreach ($allplugs AS $va) {
      if (strpos($va, '.ini') !== false) {
        $ini_array = parse_ini_file($va, true);
        foreach ($ini_array as $construct => $gq) {
          $a = 0;
          foreach ($gq as $const => $stringq) {
            if (!is_array($stringq)) {
              if (($const . $stringq) == ("enable1")) {
                if (($construct) == ("anti_ip_chat")) $a = 1;
              }
              else if ($a == 1) {
                echo "\n[anti_ip_chat]_" . $construct;
                if (strpos($const, 'white_list') !== false) $whitelist = $stringq;
                else if (strpos($const, 'function') !== false) $fffff = $stringq;
                else if (strpos($const, 'reason') !== false) $freason = $stringq;
                if ((!empty($whitelist)) && (!empty($freason))) {
                  $whitelistline = explode(';', $whitelist);
                  if (!in_array($ipmmatch, $whitelistline)) {
                    if ($fffff == 'kick') xcon($fffff . ' ' . $idnum . ' ' . $freason . ' ' . $ipmmatch, '');
                    else xcon($fffff . ' ' . $guidn . ' ' . $freason . ' ' . $ipmmatch, '');
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