<?php  
if (strpos($parseline, " J;") !== false) {
 
list($noon, $guid, $idk, $nickname) = explode(';', $parseline);

 if (!file_exists($cpath . 'ReCodMod/databases/player_insert_GEO/'))
	 mkdir($cpath . 'ReCodMod/databases/player_insert_GEO/', 0777, true);
 if (!file_exists($cpath . 'ReCodMod/databases/player_insert_GEO/' . $server_ip . '_' . $server_port . '/'))
	 mkdir($cpath . 'ReCodMod/databases/player_insert_GEO/' . $server_ip . '_' . $server_port . '/', 0777, true);
           
			 $reg = $cpath . 'ReCodMod/databases/player_insert_GEO/' . $server_ip . '_' . $server_port . '/JOIN__GUID_' . $guid . '_md5_'. md5($nickname) . '.log';
$conisq = (dbGuid(4) . (abs(hexdec(crc32(trim($server_port . $guid))))));
       
if ((empty($stats_array[$conisq]['guid']))||(!file_exists($reg))||(time() - filemtime($reg) >= 900))
{ 
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rconExplode = rconExplode($guid);
if(!empty($rconExplode))
{
list($i_ping,$i_ip,$i_name,$i_guid,$xxccode,$city,$country) = explode(';', $rconExplode);
$chistx = $i_name;
} else {$i_ping='';$i_ip='';$i_name='';$i_guid='';$xxccode='';$city='';$country='';}
        
  if ((empty($i_ip)) || (strpos($i_ip, '192.168') !== false) || (strpos($i_ip, '255.255') !== false) || (strpos($i_ip, 'localhost') !== false) || (strpos($i_ip, '127.0.0.1') !== false)) $i_ip = '37.120.56.200';
            
	   if (empty($stats_array[$conisq]['ip_adress'])) 
	 $stats_array = data_values_input($conisq, 'ip_adress', '' . $i_ip . '', $stats_array); 
   
                    $date = date('Y-m-d H:i:s');
                      
if (!empty(geo_welcome_message))
{ 
        try {
         if (empty(SqlDataBase)) 
          $db4 = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db4.sqlite');
	     else
		 {
          $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
          $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false, ];
          if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass, $opt);
          $db4 = $msqlconnect;
		 }
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
				if (($xxccode == 'RU') || ($xxccode == 'UA') || ($xxccode == 'BY') || ($xxccode == 'LV') || ($xxccode == 'UZ') || ($xxccode == 'AZ') || ($xxccode == 'AM') || ($xxccode == 'KZ') || ($xxccode == 'KG') || ($xxccode == 'MD') || ($xxccode == 'TJ') || ($xxccode == 'TM') || ($xxccode == 'AB')) require $cpath . 'cfg/languages/ru.lng.php';
                    else if ($xxccode == 'DE')
                         require $cpath .  'cfg/languages/de.lng.php';
                    else require $cpath . 'cfg/languages/en.lng.php';

rcon('say ^3' . $welcome_x . ' ^7' . html_entity_decode($nickname) . ' ^3' . $infoofrom . ' ^6[^2' . $xxxnw . '^6]', '');
}	
else
rcon('say ^3' . $welcome_x2 . ' ^7' . html_entity_decode($nickname) . ' ^3' . $infoofrom . ' ^6[^2' . $xxxnw . '^6] ^1id#' . $idcc . ' ^1visit#' . $x_db_conn . ' ^7' . website . '', '');
 }										
      /////////////////////// nickname;nickname';
	 if (empty($stats_array[$conisq]['nickname'])) 
	    $stats_array[$conisq]['nickname'] = $nickname; 
	 if (!empty($stats_array[$conisq]['nickname;'])) 
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
	  

   if (!file_exists($reg))
                touch($reg);
              if (file_exists($reg)) {
                $fpl = fopen($reg, 'w');
                fwrite($fpl, " $guid % $nickname \n");
                fclose($fpl);
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
      if (empty(SqlDataBase)) 
       $db = new PDO('sqlite:' . $cpath . 'ReCodMod/databases/db1.sqlite');
      else {
       $dsn = "mysql:host=".host_adress.";dbname=".db_name.";charset=$charset_db";
       if (empty($msqlconnect)) $msqlconnect = new PDO($dsn, db_user, db_pass);
       $db = $msqlconnect;
	  }   
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
        rcon('tell ' . $idk . ' ^ => ^1['.userStatus($a_grp).'] ^3' . html_entity_decode($nickname) , '');
        ++$x_stop_lpjk; 
       }
       else { 
	if (!empty($stats_array[$conisq]['user_status']))
	{	
         if(userStatus($stats_array[$conisq]['user_status']) != 3)
         rcon('tell ' . $idk . ' ^6Rbot => ^1['.$stats_array[$conisq]['user_status'].'] ^3' . html_entity_decode($nickname) , '');
        $date = date('Y-m-d H:i:s'); 
         if ($db->query("INSERT INTO x_db_admins (s_adm, s_dat, s_group, s_guid) VALUES ('" . $stats_array[$conisq]['ip_adress'] . "', '" . $date . "', '".userStatus($stats_array[$conisq]['user_status'])."', '" . $guid . "')") > 0) {
          echo "Created IN DATABASE." . "\n";
          ++$x_stop_lpjk;
        }
        ++$x_stop_lpjk;
	 } } 
      ++$x_stop_lpjk;
      require $cpath . 'ReCodMod/functions/null_db_connection.php';
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