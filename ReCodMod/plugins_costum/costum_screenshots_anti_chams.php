<?php
if(typeparser($parseline) == 'parser')
{
 if (preg_match('/Q;/', $parseline, $xnon))
          {
			  
          $nickname = '';
	 $counttdot = substr_count($parseline, ';');
            if ($counttdot == 2)
    list($noon, $idk, $nickname) = explode(';', $parseline);
  else
    list($noon, $guid, $idk, $nickname) = explode(';', $parseline);
  if (empty($guid))
    $guid = '0';
  //echo '-' . $guid . '-' . $idk . '-' . $nickname;
  
 $x_date  = date('Y-m-d H:i:s');

  
		  
 try {
 	
     
     if(SqlDataBase == 1)
        {
	$dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
   
	if(empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass); 
	$db4 = $msqlconnect;
		}
     else
   		$db4 = new PDO('sqlite:'. $cpath . 'ReCodMod/databases/db4.sqlite'); 
		  
$db4->query("UPDATE x_db_players SET x_db_date='".$x_date."',stat = '0' WHERE x_db_guid='".$guid."'");	  
require $cpath . 'ReCodMod/functions/null_db_connection.php';		  
}catch(PDOException $e){die($e->getMessage());}			  
		

		              $shid = $server_port.$guid;
					  $shid = dbGuid(4).(abs(hexdec(crc32($shid))));

					   if(file_exists($cpath.'ReCodMod/cache/x_logs/archive/demo_'.$shid))
					   {
                                file_put_contents($cpath.'ReCodMod/cache/x_logs/archive/demo_'.$shid, "");
								rcon('stoprecord '.$guid, '');  
					   }
					   
					   
					   if(file_exists($cpath.'ReCodMod/cache/x_logs/archive/demo_'.$guid))
					   {
                                file_put_contents($cpath.'ReCodMod/cache/x_logs/archive/demo_'.$guid, "");
								rcon('stoprecord '.$guid, '');  
					   }
					   
					                         
  if (!empty($player_auto_sc)) {
    $g_uid = 0;
    $plyrdate  = 0;
    $playerid    = 0;
    $czr   = 0;
    foreach ($player_auto_sc as $p => $f) {
      $czy = 0;
      foreach ($f as $plyrdate => $s) {
        $counter = 0;
        $czr     = count($f);
        foreach ($s as $playerid => $g_uid) {
          ++$czy;
          if ($czr == $czy) {
            if (!empty($g_uid)) {
			 if(trim($idk) == trim($playerid)){
     if(trim($x_date) == trim($plyrdate)){

     if(!empty($web_domain_name))
		 $web_domain_name = '^5http:^5/^5/'.$web_domain_name;
	 else
		 $web_domain_name = '';
		 
    if (!file_exists($cpath . 'ReCodMod/cache/x_logs/chams_detected_cheaters/'))
      mkdir($cpath . 'ReCodMod/cache/x_logs/chams_detected_cheaters/', 0777, true);	 
	 
		 $x_da  = date('Y_m_d_H'); 
		 $x_damx  = date('Y_m_d_H_i_s');   
		 $player_cron_getss = $cpath . 'ReCodMod/cache/x_logs/chams_detected_cheaters/SCREENSHOT_DATE_'.$x_da . '_GUID_'.$g_uid.'_' . $server_ip . '_' . $server_port;
           
		      if (!file_exists($player_cron_getss))
			  {
                touch($player_cron_getss);
				  
 			     $handlePos=fopen($player_cron_getss ,"a");
			     fwrite($handlePos, "SCREENSHOT_DATE_".$x_damx . "_GUID_".$g_uid."_" . $server_ip . "_" . $server_port."\n");
			     fclose($handlePos); 
				  
				 xcon('record ' . $g_uid, ''); 
			  }
		     else
			  {
			  xcon('stoprecord ' . $g_guid, '');
	          echo "\n auto sc: " , $g_uid , " - " , $plyrdate , " ~ ",$nickname," ID:" , $playerid;	 
			  xcon('banUser '.$guid.' ^3[^6Anti Chams System by ExRecod^3] '.$web_domain_name.'', '');
              rcon('say ^3Rbot ^6=> ^1' . $nickname . ' ^7observed! ^3[^6ExRecod Anti Chams System^3]!', '');
	             //     11/August/2019
			     $handlePos=fopen($player_cron_getss ,"a");
			     fwrite($handlePos, "SCREENSHOT_DATE_".$x_damx . "_GUID_".$g_uid."_" . $server_ip . "_" . $server_port."\n");
			     fclose($handlePos);				  
			  }
		 
			  }}}}}}}
			unset($player_auto_sc); } 
			if(!empty($player_joined)){
            unset($player_joined[$guid][$idk]);
				xcon('stoprecord ' . $guid, '');
			}
			
		  }
}
 