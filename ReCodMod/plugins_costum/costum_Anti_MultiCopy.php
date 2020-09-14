<?php
if (strpos($parseline, ";") !== false) {
  $idnumB = '';
  $k = 0;
  $inf = '';  
  $fip = '';
  foreach ($stats_array as $c => $f) {
    $y = 0;
    $g = 0;
	foreach ($stats_array as $key => $val) {
      if ((!empty($val['ip_adress'])) && (!empty($f['ip_adress']))) {
        if ($val['ip_adress'] === $f['ip_adress']) {
          ++$y;
		  $fip = $f['ip_adress'];
          $gg  = $key;
        }
      }
    }
    if (!empty($y)) {
      if ($y > 1) $inf = $y . ';' . $gg;
      else $inf = null;
    }
    else $inf = null;
}	
if (!empty($inf)) {
    if (strpos($inf, ";") !== false) {
      list($ip, $uidd) = explode(';', $inf);
      if (!empty($stats_array[$uidd]['guid'])) {
        if (strpos($stats_array[$uidd]['guid'], "bot") === false) {
          require $cpath . 'ReCodMod/functions/core/cod_rcon.php';
          foreach ($rconarray as $j => $e) {
            $i_id = $e["num"];
            $i_ping = $e["ping"];
            $i_ip = $e["ip"];
            $i_name = $e["name"];
            $i_guid = $e["guid"];
            if (trim($i_guid) == trim($stats_array[$uidd]['guid'])) {
				if(trim($fip) == trim($i_ip)) {
              $guidB = $i_guid;
              $idnumB = $i_id;
              $loadopt = $cpath . 'ReCodMod/cache/loader_opt/' . $string . '_' . $server_port . '/' . $uidd . '.log';
              if (file_exists(dirname($mplogfile) . '/playerInfo/')) {
                if (strlen($guidB) == 17) $rest = substr($guidB, 9);
                else $rest = substr($guidB, 11);
                if ((int)$rest) {
                  $file = dirname($mplogfile) . '/playerInfo/' . $rest . '.db';
                  if (file_exists($file)) {
                    $lines = file($file);
                    foreach ($lines as $line_num => $line) {
                      $line = preg_replace("/[^a-z0-9'-_. ]/i", '~', $line);
                      //status~default~style~default~kills_id~1110~screenshots_id~296~deaths_id~803~prestige_all~33~lang~IT~skill_id~156.115~m_skill_id~-98.8775~ranked_id~37~~
                      if (strpos($line, "kills_id~") !== false) {
                        list($emp, $stat0) = explode("kills_id~", $line);
                        list($k) = explode("~", $stat0);
                      }
                      else $k = 0;
                    }
                  }
                  if ($k < 10) {
                    xcon('clientkick ' . $idnumB . '', '');
                    unset($stats_array[$uidd]);
                    debuglog((__FILE__) . "\n playerInfo Kicked = Guid: $guidB Nickname: $i_name NUM: $idnumB Ping: $i_ping Ip: $i_ip");
                  }
                }
              }
              else if (!file_exists($loadopt)) //проверка статистики
              {
                xcon('clientkick ' . $idnumB . '', '');
                unset($stats_array[$uidd]);
                debuglog((__FILE__) . "\n loader_opt Kicked = Guid: $guidB Nickname: $i_name NUM: $idnumB Ping: $i_ping Ip: $i_ip");
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