<?php
if(!empty($msgr)){
if(!empty(ixz)){
	if(!empty($stats_array[$conisq]['user_status'])){
if (strpos(
(implode(",", (costumgroupsInivalues('commands_costum', ($stats_array[$conisq]['user_status']), 1))))
, str_replace(ixz, "", $msgr)) !== false)
 
  
 
 {
    if (empty($stats_array[$conisq]['user_status'])) $stats_array[$conisq]['user_status'] = 'guest';
    foreach (costumgroupsInivalues('commands_costum', $stats_array[$conisq]['user_status'], 0) as $d) {
        list($cvarcom, $cvarz) = explode('=', $d);
        if (empty(SqlDataBase)) {
            $msgr = @iconv("windows-1251", "utf-8", $msgr);
            $cvrcmd = @iconv("windows-1251", "utf-8", $cvarcom);
        }
        else {
            $msgr = $msgr;
            $cvrcmd = $cvarcom;
        }
        if (strpos($msgr, ixz . $cvrcmd) !== false) {
            $cvarzk = $cvarz;
            $cvarz = str_replace("ID", '', $cvarz);
            if ($x_stop_lp == 0) {
                $x_stop_lp = 555;
                
                if (strpos("seta menu", $cvrcmd) !== false) xcon('seta menu ' . $idnum, '');
                else if (strpos("ID", $cvrcmd) !== false) xcon($cvarz . ' ' . $idnum, '');
                else xcon($cvarz, '');
            }
        }
    }
}
}}}
?>