<?php  
if (strpos($parseline, " J;") !== false) {
 
list($noon, $guid, $idk, $nickname) = explode(';', $parseline);

$conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));


	           if (empty($stats_array[$conisq]['nickname'])) 
	                     $stats_array[$conisq]['nickname']   = $nickname; 
	           if (!empty($stats_array[$conisq]['nickname;'])) 
	                     $stats_array[$conisq]['nickname;'] = $nickname;
   	           if (empty($stats_array[$conisq]['guid'])) 
	                     $stats_array[$conisq]['guid']       = $guid; //fakeguid(uncolorize($sb[4]).$rangeip); 
			 
 
$kickedonone = 0;
$nicknameoneone = $nickname;
 

 if (!file_exists($cpath . 'ReCodMod/databases/player_insert_GEO/'))
	 mkdir($cpath . 'ReCodMod/databases/player_insert_GEO/', 0777, true);
 if (!file_exists($cpath . 'ReCodMod/databases/player_insert_GEO/' . $server_ip . '_' . $server_port . '/'))
	 mkdir($cpath . 'ReCodMod/databases/player_insert_GEO/' . $server_ip . '_' . $server_port . '/', 0777, true);
           
			 $reg = $cpath . 'ReCodMod/databases/player_insert_GEO/' . $server_ip . '_' . $server_port . '/JOIN__GUID_' . $guid . '_md5_'. md5($nickname) . '.log';



if (empty($stats_array[$conisq]['welcometimer']))
	      $stats_array[$conisq]['welcometimer'] = time();
  
$date = date('Y-m-d H:i:s');
       
if ((empty($stats_array[$conisq]['guid']))||(!file_exists($reg))||(time() - filemtime($reg) >= 900))
{ 
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$i_ip = '';
for ($i = 1;$i <= 3;$i++) {
usleep(50000); 
$rconExplode = rconExplodeIdnuminfo($idk);
list($c_id,$i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', $rconExplode);
if(!empty($i_ip))
	$i = 3;
}

if(!empty($i_ip))
{
$chistx = $nickname; //$i_name;


$rangeip = '';
 
 list($onem, $twom, $threem, $fourm) = explode(".", $i_ip);
  $rangeip = $onem.'.'.$twom.'.'.$threem;
 

				if (empty($stats_array[$conisq]['ip_adress']))
				          $stats_array[$conisq]['ip_adress'] = $i_ip; 


				if (empty($stats_array[$conisq]['ip_adress100']))
				          $stats_array[$conisq]['ip_adress100'] = $i_ip; 

					  
   	            if (empty($stats_array[$conisq]['admins'])) 
	                      $stats_array[$conisq]['admins'] = fakeguid(uncolorize($nickname).$rangeip); 



////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
 if (!empty($i_ip))
	 { 
		 
				if (strpos($game_patch, 'cod1') === false)
				{		 
					if (preg_match('/([^\p{L}\p{N}\s])|([a-zA-Z0-9])/u', $i_name, $sbn))
						{
                    $nickname = clearSymbols($i_name);
                    $nickname = htmlentities($nickname);
						}
                        else
                           	$nickname = md5($nickname);
				}
				else
				{				
/////////////////////////////////////////////////////////////////////					
/////////////////////////////////////////////////////////////////////					
/////////////////////////////////////////////////////////////////////					
                    $nickname = str_replace("'", "", $chistx);
                    $nickname = str_replace("`", "", $nickname);
                    $nickname = str_replace("'", "", $nickname);
                    $nickname = str_replace("`", "", $nickname);
                    $nickname = str_replace('"', '', $nickname);
                    $nickname = str_replace('{', '', $nickname);
                    $nickname = str_replace('}', '', $nickname);
					
      $gi = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
      $record = geoip_record_by_addr($gi, $i_ip);
      if (!empty($record)) $xxccode = ($record->country_code);
      else $xxccode = '';	
$w_geo = ''; $w_ip = '';  $okone = 0;	
	  
$rep = 'SELECT s_pg, w_geo, w_ip from db_stats_2 where s_pg = ' . $conisq . ' LIMIT 1'; 
					
$result = dbLazy('', $rep);
                  if (!empty($result)) {
                    foreach ($result as $key => $value) {
                      if (!empty($key)) {					
                        if ($key == 'w_geo') $w_geo = $value;
                        if ($key == 'w_ip')  $w_ip = $value;
                        $okone = 1;						
				  }}}
if($okone == 1)
{
if (($w_geo == '?')||(empty($w_geo))) { if (!empty($w_ip)) {
      $gi = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
      $record = geoip_record_by_addr($gi, $w_ip);
      if (!empty($record)) $w_geo = ($record->country_code);
      else $w_geo = '';	}}


		  
if (!empty($xxccode)) {	if (!empty($w_geo)) { if ($w_geo != '?') {	
	if($xxccode != $w_geo){								
//////////////////////////////////////////////////////////////////////////////////
usleep(20000);
rcon('say ^3CHANGE NICKNAME:  ^7'.$nicknameoneone.' ^1REGISTERED WITH ANOTHER PLAYER!', '');
//sleep(2);
//xcon('clientkick ' . $idk, '');	
 if(empty($connect_error[$idk]['nickname_change']))
	      $connect_error[$idk]['nickname_change'] = ''.$nicknameoneone.'';
 if(empty($connect_error[$idk]['nickname_timers']))
	      $connect_error[$idk]['nickname_timers'] = time();
debuglog("\n [ $datetime ] CHANGE NICKNAME:  [$nicknameoneone] NICKNAME REGISTERED WITH ANOTHER PLAYER!");
$kickedonone = 1;	
//////////////////////////////////////////////////////////////////////////////////					
}}}}
}						
				
/////////////////////////////////////////////////////////////////////					
/////////////////////////////////////////////////////////////////////					
/////////////////////////////////////////////////////////////////////					
				}
				
	$sql = "INSERT INTO x_db_players 
				  (s_port,x_db_name, x_up_name, x_db_ip, x_up_ip, x_db_ping, x_db_guid, x_db_conn, x_db_date, x_db_warn, x_date_reg, stat)
         VALUES ('$svipport','" . $nickname . "', '0', '$i_ip', '0', '$i_ping', '$guid', '1', '$date', '0', '$date', '1')
ON DUPLICATE KEY UPDATE x_db_date='" . $date . "', x_db_ip='" . $i_ip . "', x_db_name = '" . $nickname . "', x_db_conn=x_db_conn+1, x_db_guid='" . $guid . "'"; 
   $gt = dbInsert('',$sql);			
							if(!$gt) 
							{
                             errorspdo('[' . $date . '] 45  ' . __FILE__ . '  Exception : ' . $sql);							
							}	 
 
 	$sql = "INSERT INTO x_up_players (name, ip, guid) VALUES ('" . $nickname . "','$i_ip','$guid')
ON DUPLICATE KEY UPDATE name = '" . $nickname . "', ip='" . $i_ip . "', guid='" . $guid . "'"; 
   $gtx = dbInsert('',$sql);			
							if(!$gtx) 
							{
                             errorspdo('[' . $date . '] 53  ' . __FILE__ . '  Exception : ' . $sql);							
							}
							
      $gi = geoip_open($cpath . "ReCodMod/functions/geoip_bases/MaxMD/GeoLiteCity.dat", GEOIP_STANDARD);
      $record = geoip_record_by_addr($gi, $i_ip);
      if (!empty($record)) $xxccode = ($record->country_code);
      else $xxccode = '?';						
					 
					$querySQL = "INSERT INTO db_stats_2 
(s_pg, s_port, w_place,w_skill,w_ratio,w_geo,w_prestige,w_fps,w_ip,w_ping,n_kills,n_deaths,n_heads,n_kills_min,n_deaths_min) 
VALUES ('" . $conisq . "','$svipport','0','1000','0','$xxccode','0','0','$i_ip','0','0','0','0','0','0')
ON DUPLICATE KEY UPDATE s_pg='" . $conisq . "', w_ip='" . $i_ip . "'";
                    $gt = dbInsert('', $querySQL);							
								if(!$gt) 
							{
                             errorspdo('[' . $date . '] 68  ' . __FILE__ . '  Exception : ' . $sql);							
							}						
							
							
}
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////							
} else {
	
	
	$i_ping='';$i_ip='';$i_name='';$i_guid='';$xxccode='';$city='';$country='';
	errorspdo('[' . $date . '] 56 строка: нету rcon ответа! 
	' . __FILE__ . '  Exception : ' . $rconExplode . ' (Почему от rcon запроса не получили ответа, скорей должен знать администратор проекта, тут будет ip = 0 и ip = 1, 
	но мы не дали записать ИП 0 или 1, значит и игрока не будет в бд из-за этой проблемы!!)');
	
	}
       
  if ((empty($i_ip)) || (strpos($i_ip, '192.168') !== false) || (strpos($i_ip, '255.255') !== false) || (strpos($i_ip, 'localhost') !== false) || (strpos($i_ip, '127.0.0.1') !== false)) $i_ip = '37.120.56.200';
            
	   if (empty($stats_array[$conisq]['ip_adress'])) 
	 $stats_array = data_values_input($conisq, 'ip_adress', '' . $i_ip . '', $stats_array); 
   
                    $date = date('Y-m-d H:i:s');
                      
if (!empty(geo_welcome_message))
{ 
        try {
 
          $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
          $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
          if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
          $db4 = $msqlconnect;
		 
     if (empty(SqlDataBase)) 
		$sql = "SELECT * FROM x_db_players WHERE x_db_guid='" . $guid . "' and x_db_name='" . $nickname . "' LIMIT 1";
                 else 
		$sql = "SELECT id,x_db_ip,x_db_date,x_db_conn,x_db_guid,x_db_name FROM x_db_players WHERE x_db_guid='" . $guid . "' and x_db_name='" . $nickname . "' LIMIT 1";
              
                $stat = $db4->query($sql)->fetch(PDO::FETCH_LAZY);
                if ($stat > 0) {
                 $result = $db4->query($sql);
                 foreach ($result as $row) {
                  $ipcc = $row['x_db_ip'];
                  $datecc = $row['x_db_date'];
                  $x_db_conn = $row['x_db_conn'];  
if (translater == 1) 
{   
				if (($xxccode == 'RU') || ($xxccode == 'UA') || ($xxccode == 'BY') 
				|| ($xxccode == 'LV') || ($xxccode == 'UZ') || ($xxccode == 'AZ') 
				|| ($xxccode == 'AM') || ($xxccode == 'KZ') || ($xxccode == 'KG') 
				|| ($xxccode == 'MD') || ($xxccode == 'TJ') || ($xxccode == 'TM') 
				|| ($xxccode == 'AB')) 
				         require $cpath . 'cfg/languages/ru.lng.php';
                    else if ($xxccode == 'DE')
                         require $cpath .  'cfg/languages/de.lng.php';
                    else if ($xxccode == 'ES') {
						if(file_exists($cpath .  'cfg/languages/es.lng.php'))
                         require $cpath .  'cfg/languages/es.lng.php';
					}						 
                    else 
						require $cpath . 'cfg/languages/en.lng.php';

rcon('say ^3' . $welcome_x . ' ^7' . $nickname . ' ^3' . $infoofrom . ' ^6[^2' . $country . '^6]', '');
}	
else
rcon('say ^3' . $welcome_x2 . ' ^7' . $nickname . ' ^3' . $infoofrom . ' ^6[^2' . $country . '^6] ^1id#' . $idcc . ' ^1visit#' . $x_db_conn . ' ^7' . website . '', '');
 }										
      /////////////////////// nickname;nickname';
	 if (empty($stats_array[$conisq]['nickname'])) 
	    $stats_array[$conisq]['nickname'] = $nickname; 
	 if (empty($stats_array[$conisq]['nickname;'])) 
	    $stats_array[$conisq]['nickname;'] = $nickname; 	
	 
  	 if (empty($stats_array[$conisq]['date'])) 
	    $stats_array[$conisq]['date'] = $date;      
  	 if (empty($stats_array[$conisq]['guid'])) 
	    $stats_array[$conisq]['guid'] = $guid;  
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
   	 if (empty($stats_array[$conisq]['ip_adress'])) 
	    $stats_array[$conisq]['ip_adress'] = $i_ip;	
	 
AddToLogGUID("[" . $datetime . "] WELLCOME -" . $nickname . " : " . $guid . " : " . $i_ip . $i_ping); 
  } 
  else
  {
	  
	  
	  
  }
	  
if($kickedonone == 0)
{
   if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl, " $guid % $nickname \n");
                fclose($fpl);
              }
}
			  
    }
    catch(PDOException $e) {
     errorspdo('[' . $datetime . '] 2755  ' . __FILE__ . '  Exception : ' . $e->getMessage());
    }	 
		 }	  
}
///////////////////АДМИН РЕГ
 if ($x_stop_lpjk == 0) { 
 $adminguidctl = 0;
  if (empty($stats_array[$conisq]['user_status']))
  {
/////////////////////////////////////
   $IniFileName = '_administrator';
///////////////////////////////////// 
            if (!empty($guid)) {  
				if($guid==(groupsIni($IniFileName,'administrator',$guid))) {

if (empty($stats_array[$conisq]['user_status']))					
$stats_array[$conisq]['user_status'] = 'administrator';					
					
if (empty($stats_array[$conisq]['ip_adress'])){
    list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', (rconExplode($guid)));	
	    $stats_array[$conisq]['ip_adress'] = $i_ip;
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
} 
        ++$x_stop_lpjk; 
     $adminguidctl = 1;
     }}} 
 
 if ((empty($stats_array[$conisq]['user_status']))||($stats_array[$conisq]['user_status']=='guest'))
  {
/////////////////////////////////////
   $IniFileName = '_groups_database';
/////////////////////////////////////
$config_data = parse_ini_file($cpath . "cfg/" . $IniFileName . ".ini", true);
 foreach($config_data as $allgroups => $n)
 {	
 foreach($n as $guidyou => $n)
 { 
 
if(($guidyou == 'all_'.$guid)||($guidyou == $server_port.'_'.$guid))
{ 					
$stats_array[$conisq]['user_status'] = $allgroups;	

 echo "\n===> ",$allgroups;

if (empty($stats_array[$conisq]['ip_adress'])){
    list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', (rconExplode($guid)));	
	    $stats_array[$conisq]['ip_adress'] = $i_ip;
   	 if (empty($stats_array[$conisq]['city'])) 
	    $stats_array[$conisq]['city'] = $xxccode;  
   	 if (empty($stats_array[$conisq]['ping'])) 
	    $stats_array[$conisq]['ping'] = $i_ping; 
}}}
        ++$x_stop_lpjk; 
        }	
  }	
//////////
 

 if ((empty($stats_array[$conisq]['user_status']))||($adminguidctl == 1))
 {  
     try {
 
       $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
       if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass);
       $db = $msqlconnect;
   
     $statt = 0;
       $result = $db->query("SELECT * FROM x_db_admins WHERE s_guid='" . $guid . "' LIMIT 1");
       foreach ($result as $row) {
        $adm_ip = $row['s_adm'];
        $a_grp = $row['s_group']; 
		$statt = 1;
		if (empty($stats_array[$conisq]['user_status']))
		$stats_array[$conisq]['user_status'] = userStatus($a_grp);
       } 
       if ($statt > 0) {
		if(userStatus($stats_array[$conisq]['user_status']) != 3)  
        rcon('tell ' . $idk . ' ^ => ^1['.userStatus($a_grp).'] ^3' . html_entity_decode($nickname), '');
        ++$x_stop_lpjk; 
       }
       else { 
	if (!empty($stats_array[$conisq]['user_status']))
	{	
         if(userStatus($stats_array[$conisq]['user_status']) != 3)
         rcon('tell ' . $idk . ' ^6Rbot => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickname) , '');
        $date = date('Y-m-d H:i:s'); 
         if ($db->query("INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid) 
			 VALUES ('" . $stats_array[$conisq]['ip_adress'] . "', '" . $date . "', '".userStatus($stats_array[$conisq]['user_status'])."', '" . $guid . "')") > 0) {
          echo "Created IN DATABASE." . "\n";
          ++$x_stop_lpjk;
        }
        ++$x_stop_lpjk;
	 } } 
      ++$x_stop_lpjk;
      require $cpath . 'ReCodMod/functions/funcx/null_db_connection.php';
     }
     catch(PDOException $e) {
      errorspdo('[' . $datetime . '] 2752  ' . __FILE__ . '  Exception : ' . $e->getMessage());
 }}
 
 
 
 
 }
    if (empty($stats_array[$conisq]['user_status'])) 	
	          $stats_array[$conisq]['user_status'] = 'guest'; 
		  echo "\n [J;] guid:" , $guid , ' num:' , $idk , ' time: ' , $tfinishh = (microtime(true) - $start);
 }
?>