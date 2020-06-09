<?php
if (strpos($parseline, " J;") !== false) { 
list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
//////////////////////////////////////////////////////////////
     
/////////////////////////////////////
   $IniFileName = 'bans_list_simple';
///////////////////////////////////// 
   
             $fuckmatch = 0;
             if (!empty($stats_array[$conisq]['ip_adress'])) {
              $l_dotss = substr_count($stats_array[$conisq]['ip_adress'], '.'); // 3 //6
              if ($l_dotss == 3) {
               $x_addr2 = explode(".", $stats_array[$conisq]['ip_adress']);
               $dati = '.';
               foreach ((sectorIniarray($IniFileName, "bl_kick_ip_range")) as $rules_super_rang) {
                echo '1';
                $iippl = substr_count($stats_array[$conisq]['ip_adress'], '.'); // 3
                $l_dotss = substr_count($rules_super_rang, '.'); // 3 //6
                $l_stars = substr_count($rules_super_rang, '*'); // 2
                $l_slashh = substr_count($rules_super_rang, '/'); // 1
                if (($l_dotss == 6) || ($l_dotss == 3) && ($l_stars == 2) && ($iippl == 3) || ($l_dotss == 3) && ($l_slashh == 1) && ($iippl == 3)) {
                 if ($x_loopsv == 0) {
                  if (ech(netMatch($rules_super_rang, $stats_array[$conisq]['ip_adress'])) == !$fuckmatch) {
                   if ($x_loopsv == 0) {
                    if ($rules_kick_ip_super_range) {
                     echo '3kicked';
                     
                     xcon('clientkick ' . $idk . ' IP RANGE BAN!', '');
                     
                     xcon('clientkick ' . $idk, '');
                     AddToLog("[" . $datetime . "] SUPER I.R. KICK: (" . $idk . ") (" . $stats_array[$conisq]['ip_adress'] . ") (" . $nickname . ")");
                     ++$x_loopsv; //continue;
                      
                    }
                   }
                  }
                 }
                }
               }
              } 
             } 
//////////////////////////////////////////////////////////////////////////////////////////// 

            if (!empty($guid)) {  
              if(!empty(groupsIni($IniFileName,'kick_guids',$guid))){ 
               
               xcon('clientkick ' . $idk . ' BAN!', '');
               
               xcon('clientkick ' . $idk, '');
               AddToLog("[" . $datetime . "] MANUAL GUIDS KICK: (" . $idk . ") (" . $stats_array[$conisq]['ip_adress'] . ") (" . $nickname . ")");
			   }
              } 
 ///////////////////////////////////////////////////////////////////////////////////////////  
     
             if (!empty($guid)) { 
              if(!empty(groupsIni($IniFileName,'bl_kick_bad_named',trim(clearSymbols($nickname))))){  
               
               xcon('clientkick ' . $idk . ' PROHIBITED NICKNAME!', '');
               
               xcon('clientkick ' . $idk, '');
               AddToLog("[" . $datetime . "] MANUAL NICKNAMES KICK: (" . $idk . ") (" . $stats_array[$conisq]['ip_adress'] . ") (" . $nickname . ")");
              } 
        }    
      
}
?>