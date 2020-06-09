 <?php
if ((strpos($msgr, ixz . 'elist') !== false))
  {
	$server_info_messages = trim($server_info_messages);
	   if (strpos($msgr, ixz . 'elist') !== false){
		   
		$timeoout = 59910;   
		   
  }else{
	  if(file_exists($cpath . 'ReCodMod/databases/db3.sqlite'))
            $timeoout = 97735;
		else
            $timeoout = 100;			
  }
  
  
  
     if (strpos($msgr, ixz . 'elist') !== false)
      {
  
 ///
  //if(is_resource($connect))
   //                 fclose($connect);
usleep($sleep_rcon*3);
       require $cpath . 'ReCodMod/functions/core/cod_rcon.php';
       foreach ($rconarray as $j => $e)
        {
         //require $cpath . 'ReCodMod/functions/inc_functions3.php'; 
 $i_id = $e["num"]; $i_ping = $e["ping"]; $i_ip = $e["ip"]; $i_name = $e["name"]; $i_guid = $e["guid"]; $chistx = $i_name; 
        //if ((!$valid_id) || (!$valid_ping))
        //  Continue; 
	  
	  
 try
  {
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

    $result = $db->query("SELECT * FROM x_db_admins WHERE s_adm='$i_ip' LIMIT 1");
 	 
$i_namex = chatrr($i_name);	 	
if(strpos(chatrr($nickr), $i_namex) !== false)
  $unkwnplyersx = $i_id;	
    foreach($result as $row)
    {		
   $adm_ip  = $row['s_adm'];
   $a_grp  = $row['s_group'];
   
  $adm_ip = trim($adm_ip);
  $i_ip = trim($i_ip);
  $i_namex = trim($i_namex);
  $nickr = trim($nickr);   
  

   
if ((strpos($game_patch, 'cod1_1.1') !== false) || ($game_mod == 'codam'))
$jjj = ((strpos(chatrr($nickr), $i_namex) !== false) && ($adm_ip == $i_ip) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555)) || (array_search(strtolower($i_ip), $adminIP, true) !== false)); 
else
 $jjj = (($adminguidctl == 1) && ((array_search($guidn,$adminguids)) > 0) || (array_search(strtolower($i_ip), $adminIP, true) !== false)||($adm_ip == $i_ip) && ($i_id == $idnum) && (($a_grp == 0) || ($a_grp == 111) || ($a_grp == 555))  );
     $jjjnw = admin_onlinetwo($guidn); 
 echo "######### IsAdmin?: ".$jjjnw; if($jjjnw == 'ADMINISTRATOR')$x_number = 1; 
  if(!empty($jjjnw)) $jjj = $jjjnw;
 if($jjj)
	      { 		  
					  
					  
                    ++$knownplayr;
                    if (empty($playersbeest))
                        $playersbeest = '';
                    if (empty($etop_player_name))
                        $etop_player_name = '';
                    if (empty($playersbased))
                        $playersbased = '';
                    if (empty($bannedtotally))
                        $bannedtotally = '';
                    if (empty($xtotal_bans))
                        $xtotal_bans = '';
                    if (empty($playersinfo))
                        $playersinfo = '';
                    if (empty($infotodaytop))
                        $infotodaytop = '';
                    if (empty($playername[0]))
                      {
                        $playername[0] = '';
                        $playername[1] = '';
                        $playername[2] = '';
                        $playername[3] = '';
                        $playername[4] = '';
                        $cmdx0         = '';
                        $mapvote       = '';
                        $db_players    = '';
                      }
                    require $cpath . 'cfg/messages.cfg.php';
                    if (strpos($servers_info_messages, '{') !== false)
                      {
                       

$server_info_messages = trim($server_info_messages);
 $cntnbm     = substr_count($server_info_messages, ';');
        $countnumbs = $cntnbm + 1;	
			
	$xmde = 0; 	
		
		
	  
        $x          = 0;
        while ($x++ < $countnumbs)
          {
			  
			  
			  
		usleep($timeoout);	  
			  
			  
			  
          $server_ipr   = explode(';', $server_ipp[$xmde]);
            $server_ipr   = $server_ipr[0];
            $server_port = $server_ipr[1];
            $status      = new COD4xServerStatus($server_ipr, $server_port);
            if ($status->getServerStatus())
              {
                $status->parseServerData();
                $serverStatus = $status->returnServerData();
                $players      = $status->returnPlayers();
                $pings        = $status->returnPings();
                $scores       = $status->returnScores();
                $playerzcc    = 0;
                foreach ($players as $i => $v)
                  {
                    //$i_name = $players[$i];
                    //$i_ip   = $scores[$i];
                    //$i_ping = $pings[$i];
                    $playerzcc++;
                  }
              }
            if (empty($serverStatus['sv_hostname']))
                $server_name[$xmde] = $serverStatus['sv_hostname'] = 'Offline';
            if (empty($serverStatus['mapname']))
                $server_mapname[$xmde] = $serverStatus['mapname'] = 'n/a';
            if (empty($serverStatus['g_gametype']))
                $server_gametype[$xmde] = $serverStatus['g_gametype'] = 'n/a';
            if (empty($serverStatus['_Maps']))
                $servermapsinf[$xmde] = $serverStatus['_Maps'] = 'n/a';
            if (empty($serverStatus['sv_maxclients']))
                $server_max_players[$xmde] = $serverStatus['sv_maxclients'] = 'n/a';
            if (empty($server_cur_players[$xmde]))
                $server_cur_players[$xmde] = '0';
            if (empty($playerzcc))
                $playerzcc = '0';
            if (!empty($serverStatus['sv_hostname']))
              {
				  
                 $server_name[$xmde] = $serverStatus['sv_hostname'];
                 $server_mapname[$xmde] = $serverStatus['mapname'];
                 $server_gametype[$xmde] = $serverStatus['g_gametype'];
                 $servermapsinf[$xmde] = $serverStatus['_Maps'];
                 $server_cur_players[$xmde] = $playerzcc;
                 $server_max_players[$xmde] = $serverStatus['sv_maxclients'];
                				  
				  
				  
	        if($timeoout == 97735)
            {		
		        echo ' * ' . $server_ipp[$xmde];
                echo ' * ' . $server_name[$xmde];
                echo ' * ' . $server_mapname[$xmde];
                echo ' * ' . $server_gametype[$xmde];
                echo ' * ' . $servermapsinf[$xmde];
                echo ' * ' . $server_cur_players[$xmde];
                echo ' * ' . $server_max_players[$xmde];
                echo "\n ";
				
            }  
			
			
			
			
			
			}
            //++$xmde;					  
			  
			    
			  
$patterns = array();
$patterns[0] = '/{SERVER_IP}/';
$patterns[1] = '/{SERVER_NAME}/';
$patterns[2] = '/{SERVER_CURRENT_PLAYERS}/';
$patterns[3] = '/{SERVER_MAX_PLAYERS}/';
$patterns[4] = '/{SERVER_MAPNAME}/';
$patterns[5] = '/{SERVER_GAMETYPE}/';

$replacements = array();
$replacements[5] = $server_ipp[$xmde];
$replacements[4] = $server_name[$xmde];
$replacements[3] = $server_cur_players[$xmde];
$replacements[2] = $server_max_players[$xmde];
$replacements[1] = $server_mapname[$xmde];
$replacements[0] = $server_gametype[$xmde];
$vvv = preg_replace($patterns, $replacements, $servers_info_messages);



                            ++$xmde;
                            
                            rcon('say ^6^7 ' . $vvv, '');
                            //AddToLog1("<br/>[" . $datetime . "]<font color='green'> Server :</font> <font color='red'>" . meessagee($vvv) . "</font>");
                            echo " \n\n [" . $datetime . "] servers_info_messages -> " . meessagee($vvv) . " \n Paused -> " . $tfinishh = (microtime(true) - $start) . " seconds \n";
                            ++$x_stop_lp;
                         
if ($countnumbs	== $xmde+1)					 
require $cpath . 'ReCodMod/functions/null.php'; echo 'AAA'; if(!empty($mysqlilink))mysqli_close($mysqlilink); exit;

}
                      }
                  }
              }
            $result = null;
            $db     = NULL;
          }
        catch (PDOException $e)
          {
          }
		  
		  
   }	  
		  
      } 
	  
	  
	  
	  
  
  
  
  
    if (strpos($server_info_messages, ';') !== false)
      {
 	  
		   $server_info_messages = trim($server_info_messages);
        $cntnbm     = substr_count($server_info_messages, ';');
        $countnumbs = $cntnbm + 1;
        $xmde       = 0;
        $x          = 0;
        while ($x++ < $countnumbs)
          {
            usleep($timeoout);
			
            $server_ipp = explode(';', $server_info_messages);
			if($timeoout == 97735)
            echo "\n " . $server_ipp[$xmde] . " ";
                        $server_ippv[$xmde] = $server_ipp[$xmde];
            $server_ip   = explode(';', $server_ipp[$xmde]);
            $server_ip   = $server_ip[0];
            $server_port = $server_ip[1];
            $status      = new COD4xServerStatus($server_ip, $server_port);
            if ($status->getServerStatus())
              {
                $status->parseServerData();
                $serverStatus = $status->returnServerData();
                $players      = $status->returnPlayers();
                $pings        = $status->returnPings();
                $scores       = $status->returnScores();
                $playerzcc    = 0;
                foreach ($players as $i => $v)
                  {
                    //$i_name = $players[$i];
                    //$i_ip   = $scores[$i];
                    //$i_ping = $pings[$i];
                    $playerzcc++;
                  }
              }
            if (empty($serverStatus['sv_hostname']))
                $server_name[$xmde] = $serverStatus['sv_hostname'] = 'Offline';
            if (empty($serverStatus['mapname']))
                $server_mapname[$xmde] = $serverStatus['mapname'] = 'n/a';
            if (empty($serverStatus['g_gametype']))
                $server_gametype[$xmde] = $serverStatus['g_gametype'] = 'n/a';
            if (empty($serverStatus['_Maps']))
                $servermapsinf[$xmde] = $serverStatus['_Maps'] = 'n/a';
            if (empty($serverStatus['sv_maxclients']))
                $server_max_players[$xmde] = $serverStatus['sv_maxclients'] = 'n/a';
            if (empty($server_cur_players[$xmde]))
                $server_cur_players[$xmde] = '0';
            if (empty($playerzcc))
                $playerzcc = '0';
            if (!empty($serverStatus['sv_hostname']))
              {
				  
                 $server_name[$xmde] = $serverStatus['sv_hostname'];
                 $server_mapname[$xmde] = $serverStatus['mapname'];
                 $server_gametype[$xmde] = $serverStatus['g_gametype'];
                 $servermapsinf[$xmde] = $serverStatus['_Maps'];
                 $server_cur_players[$xmde] = $playerzcc;
                 $server_max_players[$xmde] = $serverStatus['sv_maxclients'];
                				  
				  
				  
	        if($timeoout == 97735)
            {		
		        echo ' * ' . $server_ipp[$xmde];
                echo ' * ' . $server_name[$xmde];
                echo ' * ' . $server_mapname[$xmde];
                echo ' * ' . $server_gametype[$xmde];
                echo ' * ' . $servermapsinf[$xmde];
                echo ' * ' . $server_cur_players[$xmde];
                echo ' * ' . $server_max_players[$xmde];
                echo "\n ";
				
            }  }
            ++$xmde;
          }
	  
		//echo "\n ";
      }
    else
      {
        $cntnbm = substr_count($server_info_messages, ':');
        if ($cntnbm == 1)
          {
            $server_ip   = explode(':', $server_info_messages);
            $server_ip   = $server_ip[0];
            $server_port = $server_ip[1];
			$xmde       = 0;
            $status      = new COD4xServerStatus($server_ip, $server_port);
            if ($status->getServerStatus())
              {
                $status->parseServerData();
                $serverStatus = $status->returnServerData();
                $players      = $status->returnPlayers();
                $pings        = $status->returnPings();
                $scores       = $status->returnScores();
                $playerzcc    = 0;
                foreach ($players as $i => $v)
                  {
                    $i_name = $players[$i];
                    $i_ip   = $scores[$i];
                    $i_ping = $pings[$i];
                    $playerzcc++;
                  }
              }
            if (empty($serverStatus['sv_hostname']))
                $server_name[$xmde] = $serverStatus['sv_hostname'] = 'Offline';
            if (empty($serverStatus['mapname']))
                $server_mapname[$xmde] = $serverStatus['mapname'] = 'n/a';
            if (empty($serverStatus['g_gametype']))
                $server_gametype[$xmde] = $serverStatus['g_gametype'] = 'n/a';
            if (empty($serverStatus['_Maps']))
                $servermapsinf[$xmde] = $serverStatus['_Maps'] = 'n/a';
            if (empty($serverStatus['sv_maxclients']))
                $server_max_players[$xmde] = $serverStatus['sv_maxclients'] = 'n/a';
            if (empty($server_cur_players[$xmde]))
                $server_cur_players[$xmde] = '0';
            if (empty($playerzcc))
                $playerzcc = 'n/a';
            if (!empty($serverStatus['sv_hostname']))
              {
                echo ' * ' . $server_name[$xmde] = $serverStatus['sv_hostname'];
                echo ' * ' . $server_mapname[$xmde] = $serverStatus['mapname'];
                echo ' * ' . $server_gametype[$xmde] = $serverStatus['g_gametype'];
                echo ' * ' . $servermapsinf[$xmde] = $serverStatus['_Maps'];
                echo ' * ' . $server_cur_players[$xmde] = $playerzcc;
                echo ' * ' . $server_max_players[$xmde] = $serverStatus['sv_maxclients'];
                echo "\n ";
              }
          ++$xmde;}
      }
	  
	  
	  
}
  
?>	 
