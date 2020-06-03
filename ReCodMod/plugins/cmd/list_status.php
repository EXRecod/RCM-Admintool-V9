<?php
if ($x_stop_lp == 0) {
    if (strpos($msgr, ixz . 'num') !== false) {
        
        require $cpath . 'ReCodMod/functions/inc_functions2.php';
        $i = 0;
        foreach ($rconarray as $j => $e) {
            $colorb = $i % 2 > 0 ? '^6' : '^3';
            $colora = $i % 2 > 0 ? '^7' : '^7';
            ++$i;
            //require $cpath  .  'ReCodMod/functions/inc_functions3.php';
            $i_id = $e["num"];
            $i_ping = $e["ping"];
            $i_ip = $e["ip"];
            $i_name = $e["name"];
            $i_guid = $e["guid"];
            $chistx = $i_name;
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            $i_namex = clearSymbols($i_name);
            if (!empty($chistx)) {
                if (!preg_match("/^bot\d+$/", $chistx, $tmp2n)) {
                    
                    if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $i_id . ' ' . $colorb . ' Nick: ' . $colorb . $colora . $i_namex . '"', '');
                    else rcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $i_id . ' ' . $colorb . ' Nick: ' . $colorb . $colora . $i_namex . '"', '');
                    //echo $i_namex. ' "^2from:^3 '.ciity($country_name['country']['iso']." , ".$country_name['city']['name_en']);
                    
                }
            }
        }
        AddToLogInfo("[" . $datetime . "] ID: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
        echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
        ++$x_stop_lp; //return;
        //}
        // if (trim($adm_ip) == $i_ipb){
        //
        //	rcon('tell '. $newid .'  "'.$colorac.' Status:^7 ' .$i_namex. ' - '.$statuszl.'"', '');
        //	                }
        
    }
    if (strpos($msgr, ixz . 'pl') !== false) {
        
        require $cpath . 'ReCodMod/functions/inc_functions2.php';
        $i = 0;
        unset($lrkon);
        foreach ($rconarray as $j => $e) {
            ++$i;
            $lrkon[] = '# ' . $e["num"] . ' ' . $e["name"] . ' ';
        }
        $spprdef = implode(",", $lrkon);
        $spprdef = str_replace(",", "", $spprdef);
        ////////////////////////////////////////////////////////////////////////////////////////////////////
        $i_namex = clearSymbols($i_name);
        
        if (strpos($game_patch, 'cod1_1.1') !== false) rcon('say ' . $spprdef . '"', '');
        else rcon('say ' . $spprdef . '"', '');
        //echo $i_namex. ' "^2from:^3 '.ciity($country_name['country']['iso']." , ".$country_name['city']['name_en']);
        AddToLogInfo("[" . $datetime . "] ID: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
        echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
        ++$x_stop_lp;
    }
    if (strpos($msgr, ixz . 'all') !== false) {
        
        require $cpath . 'ReCodMod/functions/inc_functions2.php';
        $i = 0;
        foreach ($rconarray as $j => $e) {
            //require $cpath  .  'ReCodMod/functions/inc_functions3.php';
            $i_id = $e["num"];
            $i_ping = $e["ping"];
            $i_ip = $e["ip"];
            $i_name = $e["name"];
            $i_guid = $e["guid"];
            $chistx = $i_name;
            $colorb = $i % 2 > 0 ? '^6' : '^3';
            $colora = $i % 2 > 0 ? '^7' : '^7';
            ++$i;
            /////////////////////////////////////////////////
            if (empty($stats_array[$conisq]['user_status'])) $statuszl = '^9Player';
            else $statuszl = $stats_array[$conisq]['user_status'];
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            $i_namex = clearSymbols($i_name);
            
            if (strpos($game_patch, 'cod1_1.1') !== false) rcon('' . $colorb . '#Id:' . $colorb . ' ' . $colora . $i_id . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $i_namex . '' . $colorb . ' ' . $infoostat . ': ^6(' . $statuszl . '^6)"', '');
            else rcon('tell ' . $idnum . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $i_id . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $i_namex . '' . $colorb . ' ' . $infoostat . ': ^9(' . $statuszl . '^9)"', '');
        }
        AddToLogInfo("[" . $datetime . "] GEO: " . $i_ip . " (" . $nickr . ") (" . $msgr . ")");
        echo '  ' . substr($tfinishh = (microtime(true) - $start) , 0, 7);
        ++$x_stop_lp; //return;
        
    }
}
?>
