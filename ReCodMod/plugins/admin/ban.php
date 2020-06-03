<?php

/*

if ($x_stop_lp == 0) {
 
		
		if (preg_match("/^".ixz."ban /i", $msgr)) {
        //$knownplayr = 0;
        echo "\n[ADB] : [", $datetime, "] : " . $nickr . " : " . $msgr;
        $r_ch = trim($chistx);
        //$vipt = (array_search($r_ch, $r_adm, true) !== false);
        if ($web_con == '0') {
            list($i1p, $i2p, $i3p, $i4p) = explode('.', $i_ip);
            $ipt = (array_search($i1p . '.' . $i2p . '.' . $i3p, $r_admi, true) !== false);
        } else if (($jjj)||($web_con == '1') && ($x_stop_lp == 0)) {
            
			
			
			try {
				
				
	
				
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                ////////////////////////////
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect; 
	$db2 = $db;
   }				
				
				
				
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                ////////////////////////////////////////////////////////////////////NEW DOWN AT THE LIST   
                // list($nickr, $msgr) = explode(' % ', $parselinetxt);  
                list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
                $i_namex = chatrr($i_name);
                $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
                $kski    = explode(" / ", $tk);
                if (strpos(chatrr($nickr), $kski[1]) !== false)
                    $unkwnplyersx = $i_id;
                foreach ($result as $row) {
                    $adm_ip  = $row['s_adm'];
                    $a_grp   = $row['s_group'];
					$a_guidcc   = $row['s_guid'];
                    $adm_ip  = trim($adm_ip);
                    $i_ip    = trim($i_ip);
                    $kski[1] = trim($kski[1]);
                    $nickr   = trim($nickr);
                    if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
                        $jjj = ((strpos(chatrr($nickr), $kski[1]) !== false) && ($adm_ip == $i_ip) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)) || (array_search(strtolower($i_ip), $adminIP, true) !== false));
                          else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
					else
                        $jjj = (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false) || ($adm_ip == $i_ip) && ($kski[0] == $idnum) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)));
  $jjjnw = admin_onlinetwo($guidn); 
  echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw; 
					if ($jjj) {
                        ++$knownplayr;
                        list($x_cmd, $x_idn, $x_reason) = explode(' ', $msgr); // !ban 5 Wh ( 5 = id  wh = reason)
                        if (empty($x_reason)){
						
                                         xcon('tell ' .$idnum. ' ^1ENTER REASON PLEASE!', '');	
							
							require $cpath . 'ReCodMod/functions/null.php'; if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
						}
                            
						
                        foreach ($rconarray as $j => $e) {
                            //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                            //if ((!$valid_id) || (!$valid_ping))
                             //   Continue;
                            $i_namex = aaxa($i_name);
                            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
                            $x_bann  = explode(" / ", $tk);
                            if ((empty($i_guid)) || $i_guid == '0')
                                $i_guid = md5($chistx);
                            if ($x_bann[0] == $x_idn) {
								
								if(empty($a_guidcc))
									$a_guidcc = $x_nickx;
				                                      else
				                             $a_guidcx = $nickr.' - '.$a_guidcc;
								
                                $db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','$i_guid','$x_reason','$datetime','$a_guidcx','0')");
                                if ($x_stop_lp == 0) {
                                    
                                    xcon('say  ' . $chistx . ' ' . $ban_ip_all . ' ^7' . $infooreas . ': ^1' . $x_reason . '', '');
                                    if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5')) {
                                         
                                         xcon('getss ' . $x_idn, '');
										 if(preg_match("/[\d]+[\d]{14,22}/",$guidn)) 
										   xcon('banUser '.$x_idn.' ^1BAN', '');
									     else
										   xcon('banUser '.$x_idn.' ^1BAN', '');
                                        // 
                                        // xcon('permban ' . $i_id . ' Reason: [' . $x_reason . ']!', '');
                                         
                                         xcon('clientkick ' . $x_idn, '');
                                    } else {
                                         usleep($sleep_rcon * 2);
                                         xcon('clientkick ' . $x_idn, '');
                                    }
                                    AddToLog("[" . $datetime . "] BANNED: " . $i_ip . " (" . $i_namex . ") (" . $i_guid . ") BY: (" . $a_guidcc . ")  R ");
                                    ++$x_number;
                                    ++$x_stop_lp;
                                    echo '  ban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                                    
                                } 
                                AddToLog("[" . $datetime . "] BANNED: " . $i_ip . " (" . $i_namex . ") (" . $i_id . ") BY: (" . $x_nickx . ")  R ");
                                ++$x_number;
                                echo '  ban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                                ++$x_stop_lp;
                                //return;	
                            }
                        }
                    }
                }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    if (strpos($msgr, ixz . 'dumpbanlist') !== false) {
        //$knownplayr = 0;
        echo "\n[ADB] : [", $datetime, "] : " . $nickr . " : " . $msgr;
        $r_ch = trim($chistx);
        //$vipt = (array_search($r_ch, $r_adm, true) !== false);
        if ($web_con == '0') {
            list($i1p, $i2p, $i3p, $i4p) = explode('.', $i_ip);
            $ipt = (array_search($i1p . '.' . $i2p . '.' . $i3p, $r_admi, true) !== false);
        } else if (($web_con == '1') && ($x_stop_lp == 0)) {
            try {
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect;
	//$db = $db2; 
   }
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                ////////////////////////////////////////////////////////////////////NEW DOWN AT THE LIST   
                // list($nickr, $msgr) = explode(' % ', $parselinetxt);  
                list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
                $i_namex = chatrr($i_name);
                $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
                $kski    = explode(" / ", $tk);
                if (strpos(chatrr($nickr), $kski[1]) !== false)
                    $unkwnplyersx = $i_id;
                foreach ($result as $row) {
                    $adm_ip  = $row['s_adm'];
                    $a_grp   = $row['s_group'];
                    $adm_ip  = trim($adm_ip);
                    $i_ip    = trim($i_ip);
                    $kski[1] = trim($kski[1]);
                    $nickr   = trim($nickr);
                    if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
                        $jjj = ((strpos(chatrr($nickr), $kski[1]) !== false) && ($adm_ip == $i_ip) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)) || (array_search(strtolower($i_ip), $adminIP, true) !== false));
                          else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
					else
                        $jjj = (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false) || ($adm_ip == $i_ip) && ($kski[0] == $idnum) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)));
                      $jjjnw = admin_onlinetwo($guidn); 
  echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw; 
					if ($jjj) {
                        ++$knownplayr;
                        usleep($sleep_rcon * 2);
                        require $cpath . 'ReCodMod/functions/getinfo/dumpbanlist.php';
                        fclose($connx);
                        foreach ($rconarray as $oneline => $e) {
                            //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                            if ((!$valid_id) || (!$valid_ping))
                                Continue;
                            $i_namex = aaxa($i_name);
                            
                            xcon('tell ' . $idnum . ' ' . $dumpbanlist . '', '');
                            AddToLog("[" . $datetime . "] dumpbanlist: " . $i_ip . " (" . $i_namex . ") (" . $i_id . ")");
                            ++$x_number;
                            echo '  ban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                            ++$x_stop_lp;
                            //return;	
                        }
                    }
                }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
    }
}























if ($x_stop_lp == 0) {
    ///ban ip range naprimer 111.222    iz    111.222.333.444   +++++  !range 111.222 WH
    if (strpos($msgr, ixz . 'range ') !== false) {
        //$knownplayr = 0;
        echo "\n[ADB] : [", $datetime, "] : " . $nickr . " : " . $msgr;
        $r_ch = trim($chistx);
        //$vipt = (array_search($r_ch, $r_adm, true) !== false);
        if ($web_con == '0') {
            list($i1p, $i2p, $i3p, $i4p) = explode('.', $i_ip);
            $ipt = (array_search($i1p . '.' . $i2p . '.' . $i3p, $r_admi, true) !== false);
        } else if ($web_con == '1') {
            ////////////////////////////////////////////////////////////////////NEW DOWN AT THE LIST   
            // list($nickr, $msgr) = explode(' % ', $parselinetxt);  
            list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
            $i_namex = chatrr($i_name);
            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
            $kski    = explode(" / ", $tk);
            try {
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;
	$db = $db2; 
   }
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                foreach ($result as $row) {
                    $adm_ip  = $row['s_adm'];
                    $a_grp   = $row['s_group'];
					$a_guidcc   = $row['s_guid'];
                    $adm_ip  = trim($adm_ip);
                    $i_ip    = trim($i_ip);
                    $kski[1] = trim($kski[1]);
                    $nickr   = trim($nickr);
                    if (strpos(chatrr($nickr), $kski[1]) !== false)
                        $unkwnplyersx = $i_id;
                    if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
                        $jjj = ((strpos(chatrr($nickr), $kski[1]) !== false) && ($adm_ip == $i_ip) && (($a_grp == 0) || ($a_grp == 111)) || (array_search(strtolower($i_ip), $adminIP, true) !== false));
                          else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
					else
                        $jjj = (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false) || ($adm_ip == $i_ip) && ($kski[0] == $idnum) && (($a_grp == 0) || ($a_grp == 111)));
                      $jjjnw = admin_onlinetwo($guidn); 
  echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw; 
					if ($jjj) {
                        ++$knownplayr;
                        list($x_cmd, $x_idn, $x_reason) = explode(' ', $msgr); // !ban 5 Wh ( 5 = id  wh = reason)
						
						
						if (empty($x_reason)){
						
							if (($game_patch != 'cod1_1.1xxx') || ($game_mod != 'codam'))
                                        xcon('tell  '. $idnum .'  ^1ENTER REASON PLEASE!', '');
							else
							xcon('say  ^1ENTER REASON PLEASE!', '');	
							$ha0 = fopen($mplogfile, "w");
                              fclose($ha0);							
							if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
						}
                        // foreach ($rconarray as $j => $e)
                        //	{
                        ////require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                        //if ((! $valid_id) || (! $valid_ping)) Continue; 
                        //$i_namex = aaxa($i_name);	
                        //$tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
                        //$x_bann = explode(" / ", $tk); 
                        //$dat = '.';
                        //		$x_addr = explode(".", $i_ip); 	
                        $ldotss   = substr_count($x_idn, '.'); // 3 //6	
                        $ldotssx  = substr_count($x_idn, '*'); // 2
                        $ldotssxl = substr_count($x_idn, '/'); // 1
                        if (($ldotss == 6) || ($ldotss == 3) && ($ldotssx == 2) || ($ldotss == 3) && ($ldotssxl == 1)) {
							
							if(empty($a_guidcc))
									$a_guidcc = $x_nickx;
								
                            $db2->exec("INSERT INTO x_ranges (ip_ranges,ip_info) VALUES ('$x_idn','$x_reason')");
                            
                            xcon('say  ^1IP Range ' . $ban_ip_all . ' ^7' . $infooreas . ':^1 ' . $x_reason . '', '');
                            
                            //
                            //xcon('clientkick ' . $i_id, '');
                            AddToLog("[" . $datetime . "] BANNED: " . $i_ip . " (" . $x_reason . ") (" . $i_id . ") BY: (" . $x_nickx . ")  R ");
                            ++$x_number;
                            ++$x_stop_lp;
                            echo '  ban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                            //return;
                            AddToLog("[" . $datetime . "] BANNED: " . $i_ip . " (" . $x_reason . ") (" . $i_id . ") BY: (" . $x_nickx . ")  R ");
                            ++$x_number;
                            echo '  ban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                            ++$x_stop_lp;
                            //return;	
                        } else {
                            
                            
                            xcon('say ^1' . $infoorngg . '', '');
                            ++$x_number;
                            ++$x_stop_lp;
                        }
                        //}
                    }
                }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
    }
}

































///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
if (!empty($guids))
{
	$ie = 0;
if (trim($msgr) == ixz . 'banlist') {


        $newid   = $idnum;
        $newip2  = '';

try {
	
if(empty(SqlDataBase))
{
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
  
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) 
	$msqlconnect = new PDO($dsn, db_user, db_pass, $opt); 
	$db = $msqlconnect;
	$db2 = $db; 
   }
            
		if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
$jjj = (strpos($mmm, $nnn) !== false); 
      else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
else if ($adminguidctl == 1)
$jjj = (((array_search($guidn,$adminguids)) > 0) && ($idnum == $i_id));
else
$jjj = ((array_search(strtolower($i_ip), $adminIP, true) !== false) || (trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false));
 

    $jjjnw = admin_onlinetwo($guidn); 
 echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw;
 if($jjj){
		
		if(empty(SqlDataBase))
              $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
  
                 $gi      = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
				
				$result = $db2->query("SELECT * FROM bans WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
                $number = 0;
                foreach ($result as $row) {
                    $playername = $row['playername'];
                    $ipm        = $row['id'];
                    $ipadrr     = $row['ip'];
                    $rshs       = $row['reason'];
                    $timfk      = $row['time'];
                    $ywhoo      = $row['whooo'];
				
                  	 if ($game_patch == 'cod1_1.1xxx')			
                    
				     else
					usleep(round($sleep_rcon/4));	 
					
                    $record = geoip_record_by_addr($gi, $ipadrr);
                    if (geox == 1)
                        $xxcity = ($record->country_name . ", " . $record->city . "");
                    else
                        $xxcity = ($record->country_name);
					
				
                $colorb = $ie % 2 > 0 ? '^6' : '^3';
                $colora = $ie % 2 > 0 ? '^7' : '^7';	
				$ie++;	
                    if (strpos($game_patch, 'cod1_1.1') !== false)
                        xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3' . $infooby . ': ' . $colorb . $colora . $ywhoo . '"', '');
                    else if (($game_patch == 'cod2') || (strpos($game_patch,  'cod1') !== false)|| ($game_patch == 'cod4') || ($game_patch == 'cod5'))
                        xcon('tell ' . $newid . ' ' . $colorb . '#' . $colorb . '' . $colora . $ipm . ' ' . $colorb . ' ' . $colorb . $colora . substr($playername, 0, 12) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooby . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 10) . '', '');
                    else if ($game_patch == 'cod5')
                        xcon('tell ' . $newid . ' ' . $colorb . '#' . $colorb . '' . $colora . $ipm . ' ' . $colorb . ' ' . $colorb . $colora . substr($playername, 0, 12) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooby . ': ' . $colorb . $colora . $rshs . ' ^3' . $infoodate . ': ' . $colorb . $colora . substr($timfk, 0, 10) . '', '');
                    else
                        xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3' . $infooby . ': ' . $colorb . $colora . $ywhoo . '"', '');
                
				}
              
    }
	
	
 $result = null;
            $db     = NULL;
   ++$x_number;
                AddToLogInfo("[" . $datetime . "] BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
                ++$x_stop_lp;
                echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
                if (is_resource($connect))
                    fclose($connect);
                // require $cpath . 'ReCodMod/functions/null.php'; return;
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }	
 
 
}	
}
else
{
 
//if (trim($msgr) == ixz . 'banlist') {
if (preg_match("/^".ixz."banlist/i", $msgr)) {
	
    $nickr = clearnamex($i_name);
    $x_nickx = clearnamex($nickr);
    $mmm     = trim($x_nickx);
    $nnn     = trim($nickr);
    
	$loadm = 1;
	
	 if ((trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false))
		$loadm = 0;
		
		if (empty($loadm)) {
		$loadm = 1;
        
        $i_namex = clearSymbols($i_name);
        $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
        $kski    = explode(" / ", $tk);
        $newid   = $i_id;
        $newip2  = $i_ip;
        if (strpos(chatrr($nickr), $kski[1]) !== false)
            $unkwnplyersx = $i_id;
        try {
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) 
	$msqlconnect = new PDO($dsn, db_user, db_pass, $opt); 
	$db = $msqlconnect;
	//$db = $db2; 
   }
            
			       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
			
			
			
            foreach ($result as $row) {
                $adm_ip = $row['s_adm'];
                $a_grph = $row['s_group'];
                $adm_ip = trim($adm_ip);
                $i_ipn  = trim($newip2);
                //////////////////GROUPS  
                if (($adm_ip == $i_ipn) && ($a_grph == 0) || ($adm_ip == $i_ipn) && ($a_grph == 111) || ($adm_ip == $i_ipn) && ($a_grph == 555) || ($adm_ip == $i_ipn) && ($a_grph == 1) || ($adm_ip == $i_ipn) && ($a_grph == 2) || ($adm_ip == $i_ipn) && ($a_grph == 3) || ($adm_ip == $i_ipn) && ($a_grph == 4) || ($adm_ip == $i_ipn) && ($a_grph == 5) || ($adm_ip == $i_ipn) && ($a_grph == 6) || ($adm_ip == $i_ipn) && ($a_grph == 7) || ($adm_ip == $i_ipn) && ($a_grph == 8) || ($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false)) {
                    echo '---' . $i_namex . '---';
                    ++$x_number;
                    ++$knownplayr;
                }
            }
            $result = null;
            $db     = NULL;
        }
        catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
            errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
    }
    if ($x_number > 0) {
        
        require $cpath . 'ReCodMod/functions/inc_functions2.php';
        foreach ($rconarray as $j => $e) {
            $colorb = $i % 2 > 0 ? '^6' : '^3';
            $colora = $i % 2 > 0 ? '^7' : '^7';
            //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
            if ((!$valid_id) || (!$valid_ping))
                Continue;
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            try {
if(empty(SqlDataBase))
{
 
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;
	//$db = $db2; 
   }
                 $gi      = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
				
				$result = $db2->query("SELECT * FROM bans WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
                $number = 0;
                foreach ($result as $row) {
                    $playername = $row['playername'];
                    $ipm        = $row['id'];
                    $ipadrr     = $row['ip'];
                    $rshs       = $row['reason'];
                    $timfk      = $row['time'];
                    $ywhoo      = $row['whooo'];
				
                  	 if ($game_patch == 'cod1_1.1xxx')			
                    
					
                    $record = geoip_record_by_addr($gi, $ipadrr);
                    if (geox == 1)
                        $xxcity = ($record->country_name . ", " . $record->city . "");
                    else
                        $xxcity = ($record->country_name);
                    if (strpos($game_patch, 'cod1_1.1') !== false)
                        xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3' . $infooby . ': ' . $colorb . $colora . $ywhoo . '"', '');
                    else if (($game_patch == 'cod2') || (strpos($game_patch,  'cod1') !== false)|| ($game_patch == 'cod4') || ($game_patch == 'cod5'))
                        xcon('tell ' . $newid . ' ' . $colorb . '#' . $colorb . '' . $colora . $ipm . ' ' . $colorb . ' ' . $colorb . $colora . substr($playername, 0, 12) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooby . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 10) . '', '');
                    else if ($game_patch == 'cod5')
                        xcon('tell ' . $newid . ' ' . $colorb . '#' . $colorb . '' . $colora . $ipm . ' ' . $colorb . ' ' . $colorb . $colora . substr($playername, 0, 12) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooby . ': ' . $colorb . $colora . $rshs . ' ^3' . $infoodate . ': ' . $colorb . $colora . substr($timfk, 0, 10) . '', '');
                    else
                        xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 16) . ' ' . $colorb . $infoocountry . ': ' . $colorb . $colora . $xxcity . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . ' ^3' . $infootime . ': ' . $colorb . $colora . substr($timfk, 0, 22) . ' ^3' . $infooby . ': ' . $colorb . $colora . $ywhoo . '"', '');
                }
                ++$x_number;
                AddToLogInfo("[" . $datetime . "] BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
                ++$x_stop_lp;
                echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
                if (is_resource($connect))
                    fclose($connect);
               // require $cpath . 'ReCodMod/functions/null.php'; return;
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
    }
}





}
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////
if (strpos($msgr, ixz . 'rlist ') !== false) {
    if ($x_number != 1) {
        // list($nickr, $msgr) = explode(' % ', $parselinetxt);  
        $nickr = clearnamex($i_name);
        $x_nickx = clearnamex($nickr);
        echo $mmm = substr(trim($x_nickx), 0, 2);
        echo $nnn = substr(trim($nickr), 0, 2);
        if (strpos($nnn, $mmm) !== false) {
            //if (preg_match("/$nnn/i", $mmm)) 
            //  {
            list($x_cmd, $x_nickid) = explode(' ', $msgr); // !unban nick
            echo $x_cmd . '  ' . $x_nickid;
            $i_namex = chatrr($i_name);
            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
            $kski    = explode(" / ", $tk);
            try {
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;
	$db = $db2; 
   }             if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
				
                foreach ($result as $row) {
                    echo ' ' . $adm_ip = $row['s_adm'];
                    echo ' ' . $a_grp = $row['s_group'];
                    $adm_ip  = trim($adm_ip);
                    $i_ipo   = trim($i_ip);
                    $kski[1] = trim($kski[1]);
                    $nickr   = trim($nickr);
                    		if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
$jjj = (strpos($mmm, $nnn) !== false); 
      else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
else if ($adminguidctl == 1)
$jjj = (((array_search($guidn,$adminguids)) > 0) && ($idnum == $i_id));
else
$jjj = ((array_search(strtolower($i_ip), $adminIP, true) !== false) || (trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false));
 

    $jjjnw = admin_onlinetwo($guidn); 
 echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw;
 if($jjj){  echo 'e';
                        ++$knownplayr;
                        if (is_numeric($x_nickid))
                            $result = $db2->query("SELECT * FROM x_ranges WHERE id = '$x_nickid' limit 1");
                        else
                            $result = $db2->query("SELECT * FROM x_ranges WHERE ip_info='$x_nickid'  limit 1");
                        $stat = $result->fetchColumn();
                        if ($stat > 0) {
                            $result = $db2->query("SELECT * FROM x_ranges WHERE id = '$x_nickid'  limit 1");
                            foreach ($result as $row) {
                                $id         = $row['id'];
                                $playername = $row['playername'];
                                $ip         = $row['ip'];
                                $reason     = $row['reason'];
                                $time       = $row['time'];
                                if ($guidn != '0')
                                    $tguidd = $row['guid'];
                                $whooo = $row['whooo'];
                                if (is_numeric($x_nickid))
                                    $db2->query("DELETE FROM x_ranges WHERE id='$x_nickid'");
                                else
                                    $db2->query("DELETE FROM x_ranges WHERE ip_info='$x_nickid'");
                                $db2->exec("INSERT INTO amnistia (playername1,ip1,guid1,reason1,time1,whooo1,patch1,whounban1) VALUES ('','$ip','','$reason','','','$game_patch','$nickr')");
                                if ($guidn != '0') {
                                    
                                    xcon('unban ' . $tguidd . '', '');
                                }
                                
                                xcon('say  ^7' . $playername . ' ' . $c_unban . ' ^7' . $infooreas . ': ^1' . $reason . '', '');
                                AddToLog("[" . $datetime . "] UNBAN: " . $i_ip . " (" . $i_name . ")  reason: UnBan");
                                //AddToLog1("[" . $datetime . "]<font color='green'> Server :</font> " . $playername . "  " . $c_unban . "  Reason: " . $reason . " ");
                                ++$x_number;
                                echo ' unban   ' . $tfinishh = (microtime(true) - $start);
                            }
                        }
                        ++$x_number;
                        ++$x_return;
                    }
                }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
    }
}
if (strpos($msgr, ixz . 'rlist') !== false) {
    $nickr = clearnamex($i_name);
    $x_nickx = clearnamex($nickr);
    $mmm     = trim($x_nickx);
    $nnn     = trim($nickr);
    if ((trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false)) {
        $gi      = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
        $i_namex = clearSymbols($i_name);
        $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
        $kski    = explode(" / ", $tk);
        $newid   = $i_id;
        $newip2  = $i_ip;
        if (strpos(chatrr($nickr), $kski[1]) !== false)
            $unkwnplyersx = $i_id;
        try {
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
 
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect;
   }
                   if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
            foreach ($result as $row) {
                $adm_ip = $row['s_adm'];
                $a_grph = $row['s_group'];
                $adm_ip = trim($adm_ip);
                $i_ipn  = trim($newip2);
                //////////////////GROUPS  
                if (($adm_ip == $i_ipn) && ($a_grph == 0) || ($adm_ip == $i_ipn) && ($a_grph == 111) || ($adm_ip == $i_ipn) && ($a_grph == 555) || ($adm_ip == $i_ipn) && ($a_grph == 1) || ($adm_ip == $i_ipn) && ($a_grph == 2) || ($adm_ip == $i_ipn) && ($a_grph == 3) || ($adm_ip == $i_ipn) && ($a_grph == 4) || ($adm_ip == $i_ipn) && ($a_grph == 5) || ($adm_ip == $i_ipn) && ($a_grph == 6) || ($adm_ip == $i_ipn) && ($a_grph == 7) || ($adm_ip == $i_ipn) && ($a_grph == 8) || ($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false)) {
                    echo '---' . $i_namex . '---';
                    ++$x_number;
                    ++$knownplayr;
                }
            }
            $result = null;
            $db     = NULL;
        }
        catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
            errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
        }
    }
    if ($x_number > 0) {
        
        require $cpath . 'ReCodMod/functions/inc_functions2.php';
        foreach ($rconarray as $j => $e) {
            $colorb = $i % 2 > 0 ? '^6' : '^3';
            $colora = $i % 2 > 0 ? '^7' : '^7';
            //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
            if ((!$valid_id) || (!$valid_ping))
                Continue;
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            try {
if(empty(SqlDataBase))
{
 
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;
   }	
   
                $result = $db2->query("SELECT * FROM x_ranges WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
                $number = 0;
                foreach ($result as $row) {
                    $ipm    = $row['id'];
                    $ipadrr = $row['ip_ranges'];
                    $rshs   = $row['ip_info'];
                    
                    if (strpos($game_patch, 'cod1_1.1') !== false)
                        xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
                    else if (($game_patch == 'cod2') || (strpos($game_patch,  'cod1') !== false)|| ($game_patch == 'cod4') || ($game_patch == 'cod5'))
                        xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
                    else if ($game_patch == 'cod5')
                        xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
                    else
                        xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $ipadrr . ': ' . $colorb . $colora . substr($rshs, 0, 40) . '', '');
                }
                ++$x_number;
                AddToLogInfo("[" . $datetime . "] RANGE IP-10: (" . $x_nickx . ") (" . $msgr . ")");
                ++$x_stop_lp;
                echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
                if (is_resource($connect))
                    fclose($connect);
                require $cpath . 'ReCodMod/functions/null.php'; return;
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
    }
}


///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
if ($x_stop_lp == 0) {
    if (strpos($msgr, ixz . 'find ') !== false) {
		
		
        $nickr = clearnamex($i_name);
        $x_nickx = clearnamex($nickr);
        $mmm     = trim($x_nickx);
        $nnn     = trim($nickr);
 
 
	if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
$jjj = (strpos($mmm, $nnn) !== false); 
      else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
else if ($adminguidctl == 1)
$jjj = (((array_search($guidn,$adminguids)) > 0) && ($idnum == $i_id));
else
$jjj = ((array_search(strtolower($i_ip), $adminIP, true) !== false) || (trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false));
 

    $jjjnw = admin_onlinetwo($guidn); 
 echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw;
 if($jjj){	
    
   
        //if ($x_number > 0) {
			if ($x_stop_lp == 0) {
            
            require $cpath . 'ReCodMod/functions/inc_functions2.php';
            foreach ($rconarray as $j => $e) {
				
				if ($x_stop_lp == 0) {
                $colorb = $i % 2 > 0 ? '^6' : '^2';
                $colora = $i % 2 > 0 ? '^7' : '^7';
                //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                if ((!$valid_id) || (!$valid_ping))
                    Continue;
                ////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
 
 list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)               
 
 
 try {
if(empty(SqlDataBase))
{
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;
   }
   
$sql = 'SELECT * FROM bans WHERE playername LIKE :keyword ORDER BY (id+0) DESC LIMIT 10'; 
 
 
$reponse=$db2->prepare($sql);
$reponse->bindValue(':keyword','%'.$x_idn.'%');
$reponse->execute();			
					
				$newid = $idnum;	
					
                    $number = 0;
                    while ($row = $reponse->fetch())	
                     {	
                        $playername = $row['playername'];
                        $ipm        = $row['id'];
                        $rshs       = $row['reason'];
						$rguid       = $row['guid'];
                        
                        if ($game_patch == 'cod1_1.1xxx')
                            xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
                        else
                            xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . '#Guid:' . $colorb . ' ' . $colora . $rguid . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
                    }
                    ++$x_number;
                    AddToLogInfo("[" . $datetime . "] SEARCH BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
                    ++$x_stop_lp;
                    echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
                }
                catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
                }
                //require $cpath . 'ReCodMod/functions/null.php'; return;
            }}
        }
    }}
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
if ($x_stop_lp == 0) {
    if (strpos($msgr, '' . ixz . 'ulist') !== false) {
        $nickr = clearnamex($i_name);
        $x_nickx = clearnamex($nickr);
        $mmm     = trim($x_nickx);
        $nnn     = trim($nickr);
	 
        if ((trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false)) {
            $i_namex = clearSymbols($i_name);
            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
            $kski    = explode(" / ", $tk);
            $newid   = $i_id;
            $newip2  = $i_ip;
            try {
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect;
   }	
   
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                foreach ($result as $row) {
                    $adm_ip = $row['s_adm'];
                    $a_grph = $row['s_group'];
                    $adm_ip = trim($adm_ip);
                    $i_ipn  = trim($newip2);
                    //////////////////GROUPS  
                    if (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || ($adm_ip == $i_ipn) && ($a_grph == 0) || ($adm_ip == $i_ipn) && ($a_grph == 111) || ($adm_ip == $i_ipn) && ($a_grph == 555) || ($adm_ip == $i_ipn) && ($a_grph == 1) || ($adm_ip == $i_ipn) && ($a_grph == 2) || ($adm_ip == $i_ipn) && ($a_grph == 3) || ($adm_ip == $i_ipn) && ($a_grph == 4) || ($adm_ip == $i_ipn) && ($a_grph == 5) || ($adm_ip == $i_ipn) && ($a_grph == 6) || ($adm_ip == $i_ipn) && ($a_grph == 7) || ($adm_ip == $i_ipn) && ($a_grph == 8) || (array_search(strtolower($i_ip), $adminIP, true) !== false)) {
                        echo '---' . $i_namex . '---';
                        ++$x_number;
                        ++$knownplayr;
                    }
                }
                $result = null;
                $db     = NULL;
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
		 
		
	if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
$jjj = (strpos($mmm, $nnn) !== false); 
      else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
else if ($adminguidctl == 1)
$jjj = (((array_search($guidn,$adminguids)) > 0) && ($idnum == $i_id));
else
$jjj = ((array_search(strtolower($i_ip), $adminIP, true) !== false) || (trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false));
 

    $jjjnw = admin_onlinetwo($guidn); 
 echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw;
 if($jjj){	
        //if ($x_number > 0) {
            
            require $cpath . 'ReCodMod/functions/inc_functions2.php';
            foreach ($rconarray as $j => $e) {
                $colorb = $i % 2 > 0 ? '^6' : '^2';
                $colora = $i % 2 > 0 ? '^7' : '^7';
                //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                if ((!$valid_id) || (!$valid_ping))
                    Continue;
                ////////////////////////////////////////////////////////////////////////////////////////////////////
                try {
if(empty(SqlDataBase))
{
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;
   }
   
  $newid = $idnum;
   
                    $result = $db2->query("SELECT * FROM amnistia WHERE id>=1 ORDER BY (id+0) DESC LIMIT 10");
                    $number = 0;
                    foreach ($result as $row) {
                        $playername = $row['playername1'];
                        $ipm        = $row['id'];
                        $rshs       = $row['reason1'];
						$guidn1     = $row['guid1'];
                        
                        if ($game_patch == 'cod1_1.1xxx')
                            xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
                        else
                            xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . '#Guid:' . $colorb . ' ' . $colora . $guidn1 . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . ' ^3' . $infooreas . ': ' . $colorb . $colora . $rshs . '"', '');
                    }
                    ++$x_number;
                    AddToLogInfo("[" . $datetime . "] UN-BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
                    ++$x_stop_lp;
                    echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
                }
                catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
                }
                require $cpath . 'ReCodMod/functions/null.php'; return;
            }
        }
    }
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
if ($x_stop_lp == 0) {
    if (strpos($msgr, ixz . 'tban ') !== false) {
        echo "\n[ADB] : [", $datetime, "] : " . $nickr . " : " . $msgr;
        $r_ch = trim($chistx);
        //$vipt = (array_search($r_ch, $r_adm, true) !== false);
        if ($web_con == '0') {
            list($i1p, $i2p, $i3p, $i4p) = explode('.', $i_ip);
            $ipt = (array_search($i1p . '.' . $i2p . '.' . $i3p, $r_admi, true) !== false);
        } else if (($web_con == '1') && ($x_stop_lp == 0)) {
            list($x_cmd, $x_idn) = explode(' ', $msgr); // !s 5 ( 5 = id)
            $i_namex = chatrr($i_name);
            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
            $kski    = explode(" / ", $tk);
            try {
				
				
				
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect;
    $db2 = $db;	
   }				
				
				
				
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                foreach ($result as $row) {
                    $adm_ip  = $row['s_adm'];
                    $a_grp   = $row['s_group'];
                    $adm_ip  = trim($adm_ip);
                    $i_ip    = trim($i_ip);
                    $kski[1] = trim($kski[1]);
                    $nickr   = trim($nickr);
                    if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
                        $jjj = ((strpos(chatrr($nickr), $kski[1]) !== false) && ($adm_ip == $i_ip) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)) || (array_search(strtolower($i_ip), $adminIP, true) !== false));
                          else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
					else
                        $jjj = (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false) || ($adm_ip == $i_ip) && ($kski[1] == chatrr($nickr)) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)));
                    
					  $jjjnw = admin_onlinetwo($guidn); 
  echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw; 
					if ($jjj) {
                        ++$knownplayr;
                        list($x_cmd, $x_idn, $x_r_minutes) = explode(' ', $msgr); // !tban 5 30  ( 5 = id  30 = times in minutes)
                        if ($x_r_minutes == '')
                            $x_r_minutes = '5';
                        //$x_x_minutes = ''.$x_r_minutes.'.minute(-s)';
                        $datetimex   = date('YmdHis');
                        $x_n_minutes = $x_r_minutes * 60;
                        $x_x_m       = $datetimex + $x_n_minutes;
                        foreach ($rconarray as $j => $e) {
                            //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                            if ((!$valid_id) || (!$valid_ping))
                                Continue;
                            $i_namex = aaxa($i_name);
                            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
                            $x_bann  = explode(" / ", $tk);
                            if ($x_bann[0] == $x_idn) {
                                $db2->exec("INSERT INTO bans (playername,ip,guid,reason,time,whooo,patch) VALUES ('$x_bann[1]','$x_bann[2]','','$x_x_m','$datetime','$x_nickx','$game_patch')");
                                
                                if (($game_ac == '0') && ($x_stop_lp == 0)) {
                                    xcon('clientkick ' . $i_id, '');
									xcon('banUser '.$guid.' ^1BAN', '');
                                    ++$x_stop_lp;
                                } else {
                                    xcon('say  ' . $chistx . ' ' . $ban_ip_all . ' "^7Reason: ^1tempban" "' . $x_r_minutes . '" minute(-s)', '');
                                    
                                    xcon('akick ' . $i_id . ' " ^6[^7TempBan^6]"', '');
                                    ++$x_stop_lp;
                                }
                                AddToLog("[" . $datetime . "] Tempban: " . $i_ip . " (" . $i_namex . ") (" . $i_id . ") BY: (" . $x_nickx . ")  R ");
                                ////AddToLog1("<br/>[" . $datetime . "]<font color='green'> Server :</font> " . $i_namex . " " . $infooreas . ":^1 Tempban " . $x_r_minutes . " ");
                                AddToLog1clear("[" . $datetime . "] Server : " . $i_namex . "  " . $infooreas . ":^1 Tempban " . $x_r_minutes . " ");
                                ++$x_number;
                                echo '  tempban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                                //return;	
                            }
                        }
                    }
                }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
            }
            catch (PDOException $e) { echo "\n\n\n ERROR --------------". $e->getMessage();
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
            }
        }
        ///$vipt = (array_search($chistx, $r_adm, true) !== false);
        //return;	
    }
}


if ($x_stop_lp == 0)
  {
    if (strpos($msgr, ixz . 'bw ') !== false)
      {
        echo "\n[ADB] : [", $datetime, "] : " . $nickr . " : " . $msgr;
        $r_ch = trim($chistx);
        if ($web_con == '0')
          {
            list($i1p, $i2p, $i3p, $i4p) = explode('.', $i_ip);
            $ipt = (array_search($i1p . '.' . $i2p . '.' . $i3p, $r_admi, true) !== false);
          }
        else if (($web_con == '1') && ($x_stop_lp == 0))
          {
            try
              {
 
			 	
if(empty(SqlDataBase))
{
                if (empty($adminlists))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect;
    $db2 = $db;	
   }				
				
				
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                list($x_cmd, $x_idn) = explode(' ', $msgr);
                $i_namex = chatrr($i_name);
                $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
                $kski    = explode(" / ", $tk);
                if (strpos(chatrr($nickr), $kski[1]) !== false)
                    $unkwnplyersx = $i_id;
                foreach ($result as $row)
                  {
                    $adm_ip  = $row['s_adm'];
                    $a_grp   = $row['s_group'];
                    $adm_ip  = trim($adm_ip);
                    $i_ip    = trim($i_ip);
                    $kski[1] = trim($kski[1]);
                    $nickr   = trim($nickr);
                    if (($game_patch == 'cod1_1.1xxx') || ($game_mod == 'codam'))
                        $jjj = ((strpos(chatrr($nickr), $kski[1]) !== false) && ($adm_ip == $i_ip) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)) || (array_search(strtolower($i_ip), $adminIP, true) !== false));
                          else if (strpos($game_patch, 'cod4') !== false)
       $jjj = ((array_search($guidn,$adminguids)) > 0);
					else
                        $jjj = (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false) || ($adm_ip == $i_ip) && ($kski[0] == $idnum) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)));
                    if ($jjj)
                      {
                        ++$knownplayr;
			      
			      $x_reason = '';
                        list($x_cmd, $x_wooord) = explode(' ', $msgr);
			      
			      
			$liststop = array("!","@","#","$","%","^","&","*","(",")","_","-","+","=","[","]","{","}", ";",":","~","`","?",".","/","|");
						foreach($liststop as $symbx)
                              {
						if ($x_stop_lp == 0){	  
							if(strpos($x_wooord,$symbx) !== false)	
								{
									usleep($sleep_rcon * 2);
								xcon('say  ^7' . $x_wooord . ' ^1Error! Without symbols please!', '');
								$x_stop_lp = 55;
								}
							}  
							  }      
			       
                       if (empty($x_reason)){
						
                                         if (($game_patch != 'cod1_1.1xxx') || ($game_mod != 'codam'))
                                        xcon('tell  '. $idnum .'  ^1ENTER REASON PLEASE!', '');
							else
							xcon('say  ^1ENTER REASON PLEASE!', '');	
							if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;
						}
				 		
                        if ($x_stop_lp == 0)
                          {
                            $sql  = "SELECT * FROM x_words WHERE z_words='$x_wooord' LIMIT 1";
                            $stat = $db2->query($sql)->fetchColumn();
                            if ($stat > 0)
                              {
                                usleep($sleep_rcon * 2);
                                if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
                                    xcon('tell  ' . $idnum . ' ' . $x_wooord . '  ^1Error! Located in the database already!', '');
                                else
                                    xcon('say  ' . $x_wooord . ' ^1Error! Located in the database already!', '');
                              }
                            else
                              {
                                $db2->exec("INSERT INTO x_words (z_names,z_words, z_cmdlist) VALUES ('$x_wooord','$x_wooord','$x_reason')");
                                usleep($sleep_rcon * 2);
                                if (($game_patch == 'cod2') || ($game_patch == 'cod4') || ($game_patch == 'cod5'))
                                    xcon('tell  ' . $idnum . ' ' . $x_wooord . ' ' . $ban_ip_all . ' ^7' . $infooreas . ': ^1' . $x_reason . '', '');
                                else
                                    xcon('say  ' . $x_wooord . ' ' . $ban_ip_all . ' ^7' . $infooreas . ': ^1' . $x_reason . '', '');
                                AddToLog("[" . $datetime . "] BAD WORD: " . $x_wooord . " BY: (" . $x_nickx . ")");
                                ++$x_number;
                                ++$x_stop_lp;
                                echo '  ban  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
                              }
                          }
                      }
                  }
require $cpath . 'ReCodMod/functions/null_db_connection.php';
              }
            catch (PDOException $e)
              {
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
              }
          }
      }
    else if (strpos($msgr, ixz . 'bw') !== false)
      {
        $nickr = clearnamex($i_name);
        $x_nickx = clearnamex($nickr);
        $mmm     = trim($x_nickx);
        $nnn     = trim($nickr);
        if ((trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false))
          {
            $i_namex = clearSymbols($i_name);
            $tk      = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
            $kski    = explode(" / ", $tk);
            $newid   = $i_id;
            $newip2  = $i_ip;
            if (strpos(chatrr($nickr), $kski[1]) !== false)
                $unkwnplyersx = $i_id;
            try
              {
                
if(empty(SqlDataBase))
{
                if (empty($bannlist))
                    $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
                else
                    $db = new PDO('sqlite:' . $adminlists);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db = $msqlconnect; 
   }					
				
				
				
                       if(empty($guids))
                $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
				 else
				$result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='$guidn' LIMIT 1");
                foreach ($result as $row)
                  {
                    $adm_ip = $row['s_adm'];
                    $a_grph = $row['s_group'];
                    $adm_ip = trim($adm_ip);
                    $i_ipn  = trim($newip2);
                    if (($adm_ip == $i_ipn) && ($a_grph == 0) || ($adm_ip == $i_ipn) && ($a_grph == 111) || ($adm_ip == $i_ipn) && ($a_grph == 555) || ($adm_ip == $i_ipn) && ($a_grph == 1) || ($adm_ip == $i_ipn) && ($a_grph == 2) || ($adm_ip == $i_ipn) && ($a_grph == 3) || ($adm_ip == $i_ipn) && ($a_grph == 4) || ($adm_ip == $i_ipn) && ($a_grph == 5) || ($adm_ip == $i_ipn) && ($a_grph == 6) || ($adm_ip == $i_ipn) && ($a_grph == 7) || ($adm_ip == $i_ipn) && ($a_grph == 8) || ($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false))
                      {
                        echo '---' . $i_namex . '---';
                        ++$x_number;
                        ++$knownplayr;
                      }
                  }
                $result = null;
                $db     = NULL;
              }
            catch (PDOException $e)
              {
                errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
              }
          }
        if ($x_number > 0)
          {
            
            require $cpath . 'ReCodMod/functions/inc_functions2.php';
            foreach ($rconarray as $j => $e)
              {
                $colorb = $i % 2 > 0 ? '^6' : '^3';
                $colora = $i % 2 > 0 ? '^7' : '^7';
                //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
                if ((!$valid_id) || (!$valid_ping))
                    Continue;
                try
                  {

if(empty(SqlDataBase))
{
                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);
                ////////////////////////////
} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect; 
   }					
					
					
					
                    $result = $db2->query("SELECT * FROM x_words WHERE id>=0 ORDER BY (id+0) DESC LIMIT 10");
                    $number = 0;
                    foreach ($result as $row)
                      {
                        $playername = $row['z_words'];
                        $ipm        = $row['id'];
                        
                        if (strpos($game_patch, 'cod1_1.1') !== false)
                            xcon('say ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . substr($playername, 0, 38) . '', '');
                        else if (($game_patch == 'cod2') || (strpos($game_patch,  'cod1') !== false)|| ($game_patch == 'cod4') || ($game_patch == 'cod5'))
                            xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . '', '');
                        else if ($game_patch == 'cod5')
                            xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . '', '');
                        else
                            xcon('tell ' . $newid . ' ' . $colorb . '#Id:' . $colorb . ' ' . $colora . $ipm . ' ' . $colorb . ' ' . $infoonick . ': ' . $colorb . $colora . $playername . '', '');
                      }
                    ++$x_number;
                    AddToLogInfo("[" . $datetime . "] BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST");
                    ++$x_stop_lp;
                    echo '  ' . substr($tfinishh = (microtime(true) - $start), 0, 7);
require $cpath . 'ReCodMod/functions/null_db_connection.php';
                    require $cpath . 'ReCodMod/functions/null.php'; return;
                  }
                catch (PDOException $e)
                  {
                    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
                  }
              }
          }
      }
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

 
	
	
if (strpos($msgr, ixz.'lastban') !== false)
    { 

 $nickr = clearnamex($i_name);
$x_nickx = clearnamex($nickr);

  $mmm = trim($x_nickx);
  $nnn = trim($nickr);
	
 if((trim($i_id) == trim($idnum)) || (strpos($mmm, $nnn) !== false))
	     {
$gi     = geoip_open($cpath . "ReCodMod/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);			 
			 ++$x_number;
			 
$i_namex = clearSymbols($i_name);	
  $tk = $i_id . ' / ' . $i_namex . ' / ' . $i_ip . ' / ' . $i_ping;
	$kski = explode(" / ", $tk);
			  $newid = $i_id;
			  $newip2 = $i_ip;	
			  

	if(strpos(chatrr($nickr), $kski[1]) !== false)
  $unkwnplyersx = $i_id;
		  
	
	
}
	
if ($x_number > 0){
		 	
require $cpath.'ReCodMod/functions/inc_functions2.php';
foreach ($rconarray as $j => $e)
	{	
$colorb=$i%2>0? '^6':'^3';
$colora=$i%2>0? '^7':'^7';

//require $cpath  .  'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
//if ((! $valid_id) || (! $valid_ping)) Continue; 

////////////////////////////////////////////////////////////////////////////////////////////////////


try
  {
if(empty(SqlDataBase))
{

                if (empty($bannlist))
                    $db2 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db2.sqlite');
                else
                    $db2 = new PDO('sqlite:' . $bannlist);

} 
else
   {      
    
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
	 
    if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt); $db2 = $msqlconnect;	
   }
    $result = $db2->query("SELECT * FROM bans WHERE id>=1 and patch = '$game_patch' ORDER BY (id+0) DESC LIMIT 1");

	$number = 0;	
   foreach($result as $row)
    { 
	    $playername = 	$row['playername'];
		$ipm = 			$row['id'];
             $ipadrr = 			$row['ip'];
		$rshs = 		$row['reason'];
	    $timfk =         $row['time'];
		$ywhoo =        $row['whooo'];
		
		$record = geoip_record_by_addr($gi, $ipadrr);
		
	
                                            
                                    

                                if (geox == 1)
                                                $xxcity = ($record->country_name . ", " . $record->city . "");
                                            else
                                                $xxcity = ($record->country_name);

   rcon('say '.$colorb.'#Id:'.$colorb.' '.$colora.$ipm.' '.$colorb.' Nick: '.$colorb. $colora .substr($playername, 0, 16).' '.$colorb.'City: '.$colorb. $colora .$xxcity.' ^3Reason: '.$colorb. $colora .$rshs. ' ^3Time: '.$colorb. $colora .substr($timfk, 0, 22). ' ^3By: '.$colorb. $colora .$ywhoo. '"', '');	

}	
	++$x_number;	
	AddToLogInfo("[".$datetime."] BANLIST-10: (" . $x_nickx . ") (" . $msgr . ") reason: LIST"); 

++$x_stop_lp;
echo '  '.substr($tfinishh = (microtime(true) - $start),0,7);
 
require $cpath . 'ReCodMod/functions/null_db_connection.php';	
   
  }
  catch(PDOException $e)
  {
    errorspdo('['.$datetime.']  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  }	  
   
   

                    					
	}}

	
	}	
	  
  
*/  
  
?>
